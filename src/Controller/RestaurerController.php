<?php

namespace App\Controller;

use App\Repository\RestaurantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RestaurerController extends AbstractController
{
    #[Route('/restaurer', name: 'app_restaurer')]
    public function index(RestaurantRepository $restaurantRepository): Response
    {
        return $this->render('restaurer/index.html.twig', [
            'restaurants' => $restaurantRepository->findBy(['is_active' => true])
        ]);
    }
}