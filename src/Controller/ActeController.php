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



class ActeController extends AbstractController
{  
   //1. Le controleur qui affiche la table table_afficher_naissance
   /*
   #[Route('/table/naissance', name: 'table_naissance')]
    public function colonneNaissance(Request $request, Connection $conn): Response
    {
        $pref = $request->query->get('p');

        $rows = $conn->fetchAllAssociative(
            'SELECT * FROM liste WHERE prefecture = :p',
            ['p' => $pref]
        );

        return $this->render('acte/table_afficher_naissance.html.twig', [
            'rows' => $rows,
            'prefecture' => $pref,
        ]);
    }
    */

    #[Route('/table/naissance', name: 'table_naissance')]
    public function colonneNaissance(Request $request, Connection $conn): Response
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

        return $this->render('acte/table_afficher_naissance.html.twig', [
            'rows' => $rows,
            'prefecture' => $pref,
        ]);
    }

    


   // 2. Le controleur qui affiche la table supprimer
    /*
    #[Route('/actes', name: 'acte_liste')]
    public function liste(ActeRepository $repo): Response
    {
        $actes = $repo->findAll();

        return $this->render('acte/table_supprimer_acte.html.twig', [
            'actes' => $actes 
        ]);
    }
	*/

    #[Route('/actes', name: 'acte_liste')]
    public function liste(ActeRepository $repo, Request $request): Response
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

        return $this->render('acte/table_supprimer_acte.html.twig', [
            'actes' => $actes 
        ]);
    }





	

    // 3. Le controleur qui supprime un document

    #[Route('/acte/supprimer', name: 'acte_supprimer', methods: ['POST'])]
    public function supprimer(
        Acte $acte,
        EntityManagerInterface $em,
        Request $request
    ): JsonResponse {

        $role = $request->getSession()->get('user_role');

        if ($role !== 'admin') {
            return new JsonResponse([
                'error' => 'Vous n’avez pas les droits'
            ], 403);
        }

        $em->remove($acte);
        $em->flush();

       // return new JsonResponse(['success' => true]);
       return $this->render('acte/table_supprimer_acte.html.twig', [
       ]);
    }

}
