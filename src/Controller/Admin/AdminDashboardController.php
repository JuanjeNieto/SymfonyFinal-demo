<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Song;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminDashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // if ($this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY')) {
        //     return $this->render('security/login.html.twig', ['last_username' => 'admin'])
        // }
        $routerBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routerBuilder->setController(UserCrudController::class)->generateUrl();

        return $this->redirect($url);
    }

    public function configureMenuItems(): iterable
    {
       
        yield MenuItem::linkToCrud('Users', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Songs', 'fas fa-music', Song::class);
    }
}
