<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack; // recupere la session
use App\Repository\ListeRepository;// pour injecter le repo
use Doctrine\DBAL\Connection;
use App\Service\SearchEngine;




final class LireController extends AbstractController
{
    #[Route('/lire', name: 'app_lire')]
    public function lectureBD(RequestStack $requestStack): Response
    {
        $message = "Pour trouver un document, entrer ci-haut, son numéro, ou son nom";

        // Affichage "Prefecture"
        $session = $requestStack->getSession(); // Récupération de la session
        $s = $session->get('pref', ''); // Lecture de la valeur 'pref'| '' = valeur par défaut si rien en session


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


    // Resultats du moteurs de recherche
    // On va appeler le service SearchEngine.php
    #[Route('/resultengine', name: 'app_resultengine')]
    public function moteurDeRecherche(
        Request $request,
        RequestStack $requestStack,
        SearchEngine $searchEngine
    ): Response
    {
        // 1. On récupère les saisies du formulaire
        $numero = $request->request->get('acte_');
        $nom    = $request->request->get('nom_');

        // 2. On appelle le service
        $result = $searchEngine->handleSearch($numero, $nom);

        // 3. Si le service renvoie une redirection
        if ($result instanceof \Symfony\Component\HttpFoundation\RedirectResponse) {
            return $result;
        }

        // 4. Sinon, on récupère le message
        $message = $result['message'];

        // 5. On détermine quel sous-template afficher
        $template = null;

        if (!empty($numero)) {
            $template = 'lire/resultByNumber.html.twig';
        } elseif (!empty($nom)) {
            $template = 'lire/resultsByName.html.twig';
        }

        // 6. Affichage "Prefecture"
        $session = $requestStack->getSession();
        $s = $session->get('pref', '');

        return $this->render('lectureBD2.html.twig', [
            's' => $s,
            'message' => $message,
            'template' => $template,
            'numero' => $numero,
            'nom' => $nom
        ]);
    }


    // Les 2 includes de lectureBD2.html.twig
	
    #[Route('/resultbynumber', name: 'app_resultbynumber')]
    public function resultatByNumber(RequestStack $requestStack, Connection $connection): Response
    {
        // 1. Récupération GET
        $request = $requestStack->getCurrentRequest();
        $num = $request->query->get('num', '');
        $nom = $request->query->get('nom', ''); // Pas la peine ici

        // 2. Requête SQL (DBAL)
        $sql = "SELECT * FROM liste WHERE acte = :num";

        $resultats = $connection->executeQuery($sql, [
            'num' => $num
        ])->fetchAllAssociative();

        // 3. Envoi à Twig
        return $this->render('lire/resultByNumber.html.twig', [
            'resultats' => $resultats,
            'num' => $num,
            'nom' => $nom
        ]);
    }


    
    
    #[Route('/resultbyname', name: 'app_resultbyname')]
    public function resultsByName(RequestStack $requestStack, Connection $connection): Response
    {
        // 1. Récupération GET
        $request = $requestStack->getCurrentRequest();
        $nom = $request->query->get('nom', '');

        // 2. Requête SQL (DBAL)
        $sql = "SELECT * FROM liste WHERE nom = :nom";

        $resultats = $connection->executeQuery($sql, [
            'nom' => ltrim($nom)
        ])->fetchAllAssociative();

        // 3. Envoi à Twig
        return $this->render('lire/resultsByName.html.twig', [
            'resultats' => $resultats,
            'nom' => $nom
        ]);
    }


}
