<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;//pour le formulaire

class LoginController extends AbstractController
{
    #[Route('/login', name: 'login', methods: ['GET', 'POST'])]
	public function index(Request $request): Response
	{
		if ($request->isMethod('POST')) {

			$login = $request->request->get('pseudo_');
			$mdp   = $request->request->get('motdepasse_');

			if ($login === "usermanagement" && $mdp === "8888") {
				return $this->redirectToRoute('usermanagement');
			}

			// Sinon, message d’erreur					 
			  $this->addFlash('error', 'Identifiants incorrects');
              return $this->redirectToRoute('login');			  		
		}		
		return $this->render('login.html.twig');
	}
}

