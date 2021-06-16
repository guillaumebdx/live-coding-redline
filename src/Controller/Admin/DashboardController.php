<?php

namespace App\Controller\Admin;

use App\Entity\Appelation;
use App\Entity\Castle;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('easy-admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Redline admin');
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            MenuItem::section('Vin', 'fas fa-wine-glass'),
            MenuItem::linkToCrud('Appelation', 'fas fa-tag', Appelation::class),
            MenuItem::linkToCrud('Castle', 'fab fa-fort-awesome', Castle::class),
        ];
    }
}
