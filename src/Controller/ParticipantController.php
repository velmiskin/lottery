<?php

namespace App\Controller;

use App\Form\ParticipantFormType;
use App\Repository\StatusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ParticipantController extends AbstractController
{
    #[Route('/', name: 'participant')]
    public function index(Request $request, StatusRepository $statusRepository): Response
    {
        $form = $this->createForm(ParticipantFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $participant = $form->getData();
            $status = $statusRepository->findOneBy(['isDefault' => 1]);
            $participant->setStatus($status);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($participant);
            $entityManager->flush();

            return $this->redirectToRoute('index');
        }
        return $this->render('participant/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
