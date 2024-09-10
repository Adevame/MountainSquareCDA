<?php

namespace App\Controller;

use App\Repository\JourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', 'accueil', methods: ['GET'])]
    public function index(JourRepository $jourRepository): Response
    {
        $jours = $jourRepository->findAll();

        if (!$jours) {
            throw $this->createNotFoundException('No Jours found');
        }

        return $this->render('accueil.html.twig', [
            'jours' => $jours,
        ]);
    }

    #
}
