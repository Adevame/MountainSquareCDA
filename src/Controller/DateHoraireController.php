<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DateHoraireController extends AbstractController
{
    #[Route('/date/horaire', name: 'app_date_horaire')]
    public function index(): Response
    {
        return $this->render('date_horaire/index.html.twig', [
            'controller_name' => 'DateHoraireController',
        ]);
    }
}
