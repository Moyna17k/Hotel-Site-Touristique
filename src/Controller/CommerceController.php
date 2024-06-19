<?php

namespace App\Controller;

use App\Repository\CommerceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommerceController extends AbstractController
{
    #[Route('/commerce', name: 'app_commerce')]
    public function index(CommerceRepository $commerceRepository): Response
    {
        $commerce = $commerceRepository->findAll();

        return $this->render('commerce/index.html.twig', [
            'commerces' => $commerce,
        ]);
    }
}
