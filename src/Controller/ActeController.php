<?php

namespace App\Controller;

use App\Entity\Acte;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ActeRepository;
use Doctrine\DBAL\Connection;
use App\Repository\ListeRepository;




class ActeController extends AbstractController
{  
   //I. Le controleur qui affiche la table table_afficher_naissance

    #[Route('/table/naissance', name: 'table_naissance')]
    public function tableAfficherNaissance(Request $request, Connection $conn): Response
    {
        // 1. On récupère la préfecture envoyée en GET ?p=...
        $pref = $request->query->get('p');

        // 2. On stocke cette préfecture dans la session
        $session = $request->getSession();
        $session->set('v', $pref);

        // 3. On récupère les lignes filtrées
        $rows = $conn->fetchAllAssociative(
            'SELECT * FROM liste WHERE prefecture = :p',
            ['p' => $pref]
        );

        return $this->render('accueil/acte/table_afficher_naissance.html.twig', [
            'rows' => $rows,
            'prefecture' => $pref,
        ]);
    }

   // Ibis. Le controleur qui affiche le document (dans un popup)
    #[Route('/lienafficher/{id}', name: 'lien-afficher')]
    public function lienAfficherNaissance(int $id, Connection $conn): Response
    {
        // Vérification ID
        if ($id <= 0) {
            throw $this->createNotFoundException("ID invalide");
        }

        // Récupération des données
        $donnees = $conn->fetchAssociative("SELECT * FROM liste WHERE ID = ?", [$id]);

        if (!$donnees) {
            throw $this->createNotFoundException("Aucun enregistrement trouvé");
        }

        return $this->render('output/afficher.html.twig', [
            'donnees' => $donnees
        ]);
    }



    
   // II. Le controleur qui affiche la table supprimer

    #[Route('/tablesupprimer', name: 'table-supprimer')]
    public function tableSupprimer(ActeRepository $repo, Request $request): Response
    {
        // 1. On récupère la préfecture stockée dans la session
        $session = $request->getSession();
        $prefecture = $session->get('v');

        // 2. Si la préfecture existe, on filtre
        if ($prefecture) {
            $actes = $repo->findBy(['prefecture' => $prefecture]);
        } else {
            // Si aucune préfecture n'est définie, on renvoie une liste vide
            $actes = [];
        }

        return $this->render('accueil/acte/table_supprimer_acte.html.twig', [
            'actes' => $actes 
        ]);
    }

    // IIbis. Le controleur qui supprime un document

    #[Route('/supprimer/{id}', name: 'supprimer_acte', methods: ['POST'])]
    public function supprimer(int $id, ListeRepository $repo, EntityManagerInterface $em)
    {
        $ligne = $repo->find($id);

        if (!$ligne) {
            return $this->json(['success' => false, 'message' => 'Introuvable'], 404);
        }

        $em->remove($ligne);
        $em->flush();

        return $this->json(['success' => true], 200);
    }








}
