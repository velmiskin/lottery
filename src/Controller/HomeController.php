<?php


namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    #[Route('/thank-you', name: 'thank-you')]
    public function thankYou(): Response
    {
        return $this->render('public/thank-you.html.twig');
    }
}