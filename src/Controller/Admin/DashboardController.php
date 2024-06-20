<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Activite;
use App\Entity\Commerce;
use App\Entity\Restaurant;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(RestaurantCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Hotel IBIS Budget Remiremont');
    }

    public function configureMenuItems(): iterable
    {
        if ($this->isGranted('ROLE_SUPER_ADMIN')) {
            yield MenuItem::section('Gestion des utilisateurs');
            yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', User::class);

            yield MenuItem::section('Gestion des données');
            yield MenuItem::linkToCrud('Restaurants', 'fas fa-list', Restaurant::class);
            yield MenuItem::linkToCrud('Activités', 'fas fa-list', Activite::class);
            yield MenuItem::linkToCrud('Commerce', 'fas fa-list', Commerce::class);
        }

        else {
            yield MenuItem::section('Gestion des données');
            yield MenuItem::linkToCrud('Restaurants', 'fas fa-list', Restaurant::class);
            yield MenuItem::linkToCrud('Activités', 'fas fa-list', Activite::class);
            yield MenuItem::linkToCrud('Commerce', 'fas fa-list', Commerce::class);
        }
    }
}
