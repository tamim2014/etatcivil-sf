<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EcrireController extends AbstractController
{
    #[Route('/ecrire', name: 'app_ecrire')]
    public function index(): Response
    {
        return $this->render('ecrire/index.html.twig', [
            'controller_name' => 'EcrireController',
        ]);
    }
}
