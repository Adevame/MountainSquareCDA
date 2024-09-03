<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class FormuleController extends AbstractController
{
    #[Route('/formule', name: 'app_formule')]
    public function index(): Response
    {
        return $this->render('formule/tarifs.html.twig', [
            'controller_name' => 'FormuleController',
        ]);
    }
}
