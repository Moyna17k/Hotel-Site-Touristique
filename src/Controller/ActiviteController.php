<?php

namespace App\Controller;

use App\Repository\ActiviteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ActiviteController extends AbstractController
{
    #[Route('/activite', name: 'app_activite')]
    public function index(ActiviteRepository $activiteRepository): Response
    {
        $activites = $activiteRepository->findAll();

        return $this->render('activite/index.html.twig', [
            'activites' => $activites,
        ]);
    }
}