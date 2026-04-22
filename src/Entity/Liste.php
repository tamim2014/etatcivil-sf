<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "liste")]
class Liste
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $ID = null;

    #[ORM\Column(type: "string", length: 30)]
    private string $prefecture;

    #[ORM\Column(type: "string", length: 30)]
    private string $centretatcivil;

    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $registre = null;

    #[ORM\Column(type: "integer")]
    private int $acte;

    #[ORM\Column(type: "date")]
    private \DateTimeInterface $date_acte;

    #[ORM\Column(type: "string", length: 30)]
    private string $nom;

    #[ORM\Column(type: "string", length: 30)]
    private string $prenom;

    #[ORM\Column(type: "string", length: 30)]
    private string $delivre_a;

    #[ORM\Column(type: "string", length: 30)]
    private string $delivre_le;

    #[ORM\Column(type: "string", length: 30)]
    private string $delivre_an;

    #[ORM\Column(type: "integer")]
    private int $num_serie;

    #[ORM\Column(type: "string", length: 30)]
    private string $naissance_jour_moi;

    #[ORM\Column(type: "string", length: 30)]
    private string $naissance_an;

    #[ORM\Column(type: "string", length: 30, nullable: true)]
    private ?string $naissance_heure = null;

    #[ORM\Column(type: "string", length: 30, nullable: true)]
    private ?string $naissance_minuite = null;

    #[ORM\Column(type: "string", length: 30)]
    private string $naissance_nom_prenom;

    #[ORM\Column(type: "string", length: 30)]
    private string $naissance_lieu;

    #[ORM\Column(type: "string", length: 30)]
    private string $naissance_sexe;

    #[ORM\Column(type: "string", length: 30)]
    private string $pere_nom_prenom;

    #[ORM\Column(type: "string", length: 30, nullable: true)]
    private ?string $pere_datenaisance = null;

    #[ORM\Column(type: "string", length: 30, nullable: true)]
    private ?string $pere_lieunaissance = null;

    #[ORM\Column(type: "string", length: 30, nullable: true)]
    private ?string $pere_profession = null;

    #[ORM\Column(type: "string", length: 30, nullable: true)]
    private ?string $pere_villederesidence = null;

    #[ORM\Column(type: "string", length: 30)]
    private string $mere_nom_prenom;

    #[ORM\Column(type: "string", length: 30, nullable: true)]
    private ?string $mere_datenaisance = null;

    #[ORM\Column(type: "string", length: 30, nullable: true)]
    private ?string $mere_lieunaissance = null;

    #[ORM\Column(type: "string", length: 30, nullable: true)]
    private ?string $mere_profession = null;

    #[ORM\Column(type: "string", length: 30, nullable: true)]
    private ?string $mere_villederesidenc = null;

    #[ORM\Column(type: "string", length: 60)]
    private string $declaration_faite_par;

    #[ORM\Column(type: "string", length: 30)]
    private string $datejugement;

    #[ORM\Column(type: "string", length: 60)]
    private string $declaration_recue_pa;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $Edit = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $Imprimer = null;

    #[ORM\Column(type: "string", length: 255, nullable: true)]
    private ?string $Delete_ = null;

    // 👉 Tu pourras ajouter les getters/setters plus tard si tu veux manipuler les données
}
