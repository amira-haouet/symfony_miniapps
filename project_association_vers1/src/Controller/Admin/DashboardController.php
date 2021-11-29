<?php

namespace App\Controller\Admin;

use App\Entity\Evenement;
use App\Entity\Membre;
use App\Entity\Sponsor;

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
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<b style="color:yellow">Project Association</b>');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Gérer Client', 'fas fa-user-tag', Membre::class);
         yield MenuItem::linkToCrud('Gérer Evenement', 'fas fa-splotch', Evenement::class);
         yield MenuItem::linkToCrud('Gérer Sponsor', 'fas fa-hand-holding-usd', Sponsor::class);

         
         
    }
}
