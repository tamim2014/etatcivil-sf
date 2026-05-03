<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack; // recupere la session

use App\Repository\ListeRepository;// pour injecter le repo

use Doctrine\DBAL\Connection;




final class LireController extends AbstractController
{
    #[Route('/lire', name: 'app_lire')]
    public function lectureBD(RequestStack $requestStack): Response
    {
        $message = "Pour trouver un document, entrer ci-haut, son numéro, ou son nom";

        // Récupération de la session
        $session = $requestStack->getSession();

        // Lecture de la valeur 'pref'
        $s = $session->get('pref', ''); // '' = valeur par défaut si rien en session


        return $this->render('lectureBD.html.twig', [
            's' => $s,
            'message' => $message,
        ]);
    }


    #[Route('/tablenaissance/{pr}', name: 'tablenaissance')]
    public function tableNaissance(
        string $pr,
        ListeRepository $repo,
        RequestStack $requestStack
        
    ): Response {

        $pref = ltrim($pr);

        $session = $requestStack->getSession();
        $session->set('pref', $pref);

        $lignes = $repo->findByPrefecture($pref);
  

        return $this->render('lire/tableNaissance.html.twig', [
            'lignes' => $lignes
        ]);
    }


}
