<?php

namespace App\Controller;

use App\Entity\Participant;
use App\Event\ParticipantStatusChangeEvent;
use App\Form\AdminParticipantFormType;
use App\Repository\ParticipantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin.index')]
    public function index(ParticipantRepository $participantRepository): Response
    {
        $participants = $participantRepository->findAll();
        return $this->render('admin/index.html.twig', [
            'participants' => $participants,
        ]);
    }
    #[Route('/admin/edit/{id}', name: 'admin.edit')]
    public function edit(Participant $participant, EventDispatcherInterface $eventDispatcher,
                         Request $request): Response
    {
        $form = $this->createForm(AdminParticipantFormType::class, $participant);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $participant = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($participant);
            $entityManager->flush();
            $eventDispatcher->dispatch(new ParticipantStatusChangeEvent($participant->getId()), 'status.change');
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('admin/edit.html.twig', [
            'form' => $form->createView(),
            'participant' => $participant,
        ]);
    }
}
