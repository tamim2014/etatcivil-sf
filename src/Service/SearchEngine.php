<?php

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\Liste;
/**
 * Un select en filtrant sur la saisie utilisateur
 * ✔️ 1. S'il trouve rien => Message:"Aucun resultat trouvé !"
 * ✔️ 2. S'il trouve qlq chose => Redirection vers lectureBD2( en lui transmettant le filtre)
 */

class SearchEngine // searchMessageServics
{
    private $em;
    private $session;

    public function __construct(EntityManagerInterface $em, RequestStack $requestStack)
    {
        $this->em = $em;                                // ✔️ ON GARDE L’ENTITY MANAGER
        $this->session = $requestStack->getSession();   // ✔️ ON REMPLACE SessionInterface
    }

    public function handleSearch(?string $numero, ?string $nom)
    {
        $message = "Pour trouver un document, entrer ci-haut, son numéro ou son nom";

        // Recherche par numéro
        if (!empty($numero)) {

            if (!ctype_digit($numero)) {
                return ['message' => "Le numéro est mal saisi"];
            }

            $result = $this->em->getRepository(Liste::class)->findOneBy(['acte' => $numero]);

            if (!$result) {
                return ['message' => "Aucun résultat trouvé"];
            }

            $this->session->set('acte', $numero);

            //return new RedirectResponse("/lectureBD2?num=".$numero);
            return new RedirectResponse("/resultengine?num=".$numero);
        }

        // Recherche par nom
        if (!empty($nom)) {

            $result = $this->em->getRepository(Liste::class)->findOneBy(['nom' => $nom]);

            if (!$result) {
                return ['message' => "Aucun résultat trouvé"];
            }

            $this->session->set('nom', $nom);

            return new RedirectResponse("/resultengine?nom=".$nom);
        }

        return ['message' => $message];
    }
}
