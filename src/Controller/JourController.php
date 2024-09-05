<?php

namespace App\Controller;

use App\Entity\Jour;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class JourController extends AbstractController
{
    #[Route('/jour', name: 'app_jour')]
    public function index(Jour $jour): Response
    {
        $performers = $jour->getPerformers();

        return $this->render('jour/index.html.twig', [
            'jour' => $jour,
            'performers' => $performers,
        ]);
    }
}
