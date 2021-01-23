<?php

namespace App\Controller\Admin;
use App\Entity\Utilisateur;
use App\Entity\Emploidutemps;
use App\Entity\Enseignant;
use App\Entity\Etudiant;
use App\Entity\Note;
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
            ->setTitle('E Formation');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Utilisateur', 'fas fa-Utilisateur', Utilisateur::class);
        yield MenuItem::linkToCrud('Emploidutemps', 'fas fa-Emploidutemps', Emploidutemps::class);
        yield MenuItem::linkToCrud('Enseignant', 'fas fa-Enseignant', Enseignant::class);
        yield MenuItem::linkToCrud('Etudiant', 'fas fa-Etudiant', Etudiant::class);
        yield MenuItem::linkToCrud('Note', 'fas fa-Note', Note::class);
    }
}
