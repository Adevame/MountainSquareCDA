<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PerformerController extends AbstractController
{
    #[Route('/performer', name: 'app_performer')]
    public function index(): Response
    {
        return $this->render('performer/index.html.twig', [
            'controller_name' => 'PerformerController',
        ]);
    }
}
