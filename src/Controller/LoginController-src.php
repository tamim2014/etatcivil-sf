<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;//pour le formulaire
use App\Repository\ListeofficiersRepository;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'login', methods: ['GET', 'POST'])]
	public function index(Request $request, ListeofficiersRepository $officierRepository): Response
	{
        $messageTextarea = "Veuillez saisir vos identifiants";
 
        
        
		if ($request->isMethod('POST')) {
            //🎁 $login = $_POST["pseudo"];
			$login = $request->request->get('pseudo_');
			//🎁 selct * from listeofficiers where pseudo =  $_POST["pseudo"];
			$officier = $officierRepository->findOneBy([
				'pseudo' => $login
			]);
			$roles = $officier->getRoles();

		
			if ($officier && $roles === 'usermanagement'){
				return $this->redirectToRoute('usermanagement');
			}
			$this->addFlash('error', 'Identifiants incorrects');
            return $this->redirectToRoute('login');	
           	   
		}

				
		return $this->render('login.html.twig', [
		   // K.O laisse tomber. addFlash est fait pour ça
		   // utilise symfony aulieu de se battre bêtement contre le framework
		   'messageTextarea' => $messageTextarea 
		]);
	}
}

