<?php

namespace App\Controller;

use App\Entity\Jour;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class JourController extends AbstractController
{
    #[Route('/jour/{id}', name: 'app_jour')]
    public function show(Jour $jour, int $id): Response
    {
        $jour = $this->getDoctrine()->getRepository(Jour);

        $performers = $jour->getPerformers();

        return $this->render('jour/index.html.twig', [
            'jour' => $jour,
            'performers' => $performers,
        ]);
    }
}
