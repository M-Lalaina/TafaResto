<?php

namespace App\Controller;

use App\Repository\DishesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    // #[IsGranted('ROLE_USER')]
    // #[Security("is_granted('ROLE_ADMIN') and is_granted('ROLE_FRIENDLY_USER')")]
    public function index(DishesRepository $repo): Response
    {
        return $this->render('home/home.html.twig', [
            'Dishes' => $repo->findAll(),
        ]);
    }
}
