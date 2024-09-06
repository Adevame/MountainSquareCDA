<?php

namespace App\Controller;

use App\Repository\JourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JourController extends AbstractController
{
    #[Route('/jour/{numero}', name: 'app_jour')]
    public function index(JourRepository $jourRepository, $numero): Response
    {
        $jour = $jourRepository->findByNumero($numero);

        if (!$jour) {
            throw $this->createNotFoundException('Jour not found');
        }

        $performers = $jour->getPerformers();

        return $this->render('jour/index.html.twig', [
            'jour' => $jour,
            'performers' => $performers,
        ]);
    }
}