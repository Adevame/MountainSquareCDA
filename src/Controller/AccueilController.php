<?php

namespace App\Controller;

use App\Entity\Jour;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', 'accueil', methods: ['GET'])]
    public function index(EntityManagerInterface $em): Response
    {
        $jour = $em->getRepository(Jour::class)->findAll();

        return $this->render('accueil.html.twig', [
            'jour' => $jour,
        ]);
    }
}
