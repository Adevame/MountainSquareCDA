<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SceneController extends AbstractController
{
    #[Route('/scene', name: 'app_scene')]
    public function index(): Response
    {
        return $this->render('scene/index.html.twig', [
            'controller_name' => 'SceneController',
        ]);
    }
}
