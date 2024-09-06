<?php

namespace App\Controller;

use App\Repository\JourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class JourController extends AbstractController
{
    #[Route('/jour', name: 'app_jour')]
    public function index(JourRepository $jour, $id): Response
    {

        $jour = $jour->find('id', $id);

        $performers = $jour->getPerformers();

        return $this->render('jour/index.html.twig', [
            'jour' => $jour,
            'performers' => $performers,
        ]);
    }
}
