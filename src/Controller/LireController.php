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
    /*
     * Ce controleur a 3 missions:
     * 
     * 1. Récuperer le filtre "prefecture"
     *    (transmis en GET par capture_items.js)
     * 2. Stocker ce filtre dans une session
     *    (pour que lectureBD.html.twig affiche la prefecture) 
     * 3. Faire un select(construire un findBy) par ce filtre 
     *    (pour que son template puisse remplir la table)
     * 
     */
    #[Route('/tablenaissance/{pr}', name: 'tablenaissance')]
    public function tableNaissance(
        string $pr,
        ListeRepository $repo,
        RequestStack $requestStack
        
    ): Response {
        //1. Recupere le filtre(tramis par capture_items.js)
        $pref = ltrim($pr);
        //2. Stocke le filtre dans une session
        $session = $requestStack->getSession();
        $session->set('pref', $pref);
        //3. Construit un findBy(pour faire un select par ce filtre)
        $lignes = $repo->findByPrefecture($pref);
  

        return $this->render('lire/tableNaissance.html.twig', [
            'lignes' => $lignes
        ]);
    }


}
