<?php

namespace App\Controller\Admin;

use App\Entity\DateHoraire;
use App\Entity\Formule;
use App\Entity\Jour;
use App\Entity\Passage;
use App\Entity\Performer;
use App\Entity\Scene;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator) {}

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(JourCrudController::class)
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('MountainSquareCDA');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Jours', 'fas fa-calendar-plus', Jour::class);
        yield MenuItem::linkToCrud('Formules', 'fas fa-money-bill', Formule::class);
        yield MenuItem::linkToCrud('Performer', 'fas fa-microphone', Performer::class);
        yield MenuItem::linkToCrud('Date & Horaires', 'fas fa-clock', DateHoraire::class);
        yield MenuItem::linkToCrud('Scenes', 'fas fa-eye', Scene::class);
        yield MenuItem::linkToCrud('Passages', 'fas fa-music', Passage::class);
    }
}
