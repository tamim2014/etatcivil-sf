<?php

namespace App\Controller;

use App\Repository\ListeofficiersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request; // pour le formulaire
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Listeofficiers;
use Doctrine\Persistence\ManagerRegistry;




class UsermanagementController extends AbstractController
{
    #[Route('/usermanagement', name: 'usermanagement')]
    public function usermanagement(Request $request, ListeofficiersRepository $repo, ManagerRegistry $doctrine): Response
    {
        $officiers = $repo->findAll();

        if ($request->isMethod('POST')) {

            // ✅ 1. Ajouter un officier(utilisateur)
			
            if ($request->request->has('pseudo') && $request->request->has('motdepasse')) {

                $login = $request->request->get('pseudo');
                $mdp   = $request->request->get('motdepasse');
                $roles  = $request->request->get('roles');

                // Vérifier si le pseudo existe déjà
                $existe = $repo->createQueryBuilder('l')
                    ->where('l.pseudo = :pseudo')
                    ->setParameter('pseudo', $login)
                    ->getQuery()
                    ->getOneOrNullResult();

                if ($existe) {
                    $this->addFlash('error', '⚠️ Ce login existe déjà !');
                    return $this->redirectToRoute('usermanagement');
                }

                // Ajouter l'utilisateur
                $officier = new Listeofficiers();
                $officier->setPseudo($login);
                $officier->setMotdepasse($mdp);
                $officier->setroles($roles);

                $em = $doctrine->getManager();
                $em->persist($officier);
                $em->flush();

                $this->addFlash('success', 'Utilisateur ajouté avec succès.');
                return $this->redirectToRoute('usermanagement');
            }

            // ⛔ 2. Suprimer un officier(utilisateur)
			
            if ($request->request->has('pseudo_del')) {

                $pseudoDel = $request->request->get('pseudo_del');

                // Vérifier si l'utilisateur existe
                $officier = $repo->findOneBy(['pseudo' => $pseudoDel]);

                if (!$officier) {
                    $this->addFlash('error', '⚠️ Ce login n\'existe pas !');
                    return $this->redirectToRoute('usermanagement');
                }

                // Supprimer l'utilisateur
                $em = $doctrine->getManager();
                $em->remove($officier);
                $em->flush();

                $this->addFlash('success', 'Utilisateur supprimé avec succès.');
                return $this->redirectToRoute('usermanagement');
            }
        }

        // 👁️ 3. Afficher tous les utilisateurs( officiers d'état civil)
		
        return $this->render('usermanagement.html.twig', [
            'officiers' => $officiers,
        ]);
    }



}

