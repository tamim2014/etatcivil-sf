<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AccueilController extends AbstractController
{
    #[Route('/accueil', name: 'app_accueil')]
    public function index(): Response
    {
        $message = "Pour trouver un document, entrer ci-haut, son numéro, ou son nom";

        //return $this->render('accueil/index.html.twig', [
        return $this->render('accueil.html.twig', [
            'controller_name' => 'AccueilController',
            "message" => $message,
            'ngazidja' => [
                'Prefecture de' => 'Préfecture de:',
                'Moroni-Bambao' => 'Moroni-Bambao',
                'Hambou' => 'Hambou',
                'Mbadjini-Ouest' => 'Mbadjini-Ouest',
                'Mbadjini-Est' => 'Mbadjini-Est',
                'Oichili-Dimani' => 'Oichili-Dimani',
                'Hamahamet-Mboinkou ' => 'Hamahamet-Mboinkou ',
                'Mitsamiouli-Mboude' => 'Mitsamiouli-Mboudé',
                'Itsandra-Hamanvou' => 'Itsandra-Hamanvou'
            ],
            'moheli' => [
                'Fomboni' => 'Fomboni',
                'Nioumachoi' => 'Nioumachoi',
                'Djando' => 'Djando'
            ],
            'anjouan' => [
                'Mutsamudu' => 'Mutsamudu',
                'Ouani' => 'Ouani',
                'Domoni' => 'Domoni',
                'Mremani' => 'Mrémani',
                'Sima' => 'Sima'
            ],
            'mayotte' => [
                'Dzaoudzi' => 'Dzaoudzi',
                'Mtsapere' => 'Mtsapere',
                'Mtsamboro' => 'Mtsamboro',
                'Mamoudzou' => 'Mamoudzou',
                'Pamandzi' => 'Pamandzi'
            ],

            
        ]);

    }
}
