<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Table(name: "liste")]
#[ORM\Entity(repositoryClass: App\Repository\ListeRepository::class)]

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

    public function getID(): ?int
    {
        return $this->ID;
    }

    public function getPrefecture(): ?string
    {
        return $this->prefecture;
    }

    public function setPrefecture(string $prefecture): static
    {
        $this->prefecture = $prefecture;

        return $this;
    }

    public function getCentretatcivil(): ?string
    {
        return $this->centretatcivil;
    }

    public function setCentretatcivil(string $centretatcivil): static
    {
        $this->centretatcivil = $centretatcivil;

        return $this;
    }

    public function getRegistre(): ?int
    {
        return $this->registre;
    }

    public function setRegistre(?int $registre): static
    {
        $this->registre = $registre;

        return $this;
    }

    public function getActe(): ?int
    {
        return $this->acte;
    }

    public function setActe(int $acte): static
    {
        $this->acte = $acte;

        return $this;
    }

    public function getDateActe(): ?\DateTime
    {
        return $this->date_acte;
    }

    public function setDateActe(\DateTime $date_acte): static
    {
        $this->date_acte = $date_acte;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDelivreA(): ?string
    {
        return $this->delivre_a;
    }

    public function setDelivreA(string $delivre_a): static
    {
        $this->delivre_a = $delivre_a;

        return $this;
    }

    public function getDelivreLe(): ?string
    {
        return $this->delivre_le;
    }

    public function setDelivreLe(string $delivre_le): static
    {
        $this->delivre_le = $delivre_le;

        return $this;
    }

    public function getDelivreAn(): ?string
    {
        return $this->delivre_an;
    }

    public function setDelivreAn(string $delivre_an): static
    {
        $this->delivre_an = $delivre_an;

        return $this;
    }

    public function getNumSerie(): ?int
    {
        return $this->num_serie;
    }

    public function setNumSerie(int $num_serie): static
    {
        $this->num_serie = $num_serie;

        return $this;
    }

    public function getNaissanceJourMoi(): ?string
    {
        return $this->naissance_jour_moi;
    }

    public function setNaissanceJourMoi(string $naissance_jour_moi): static
    {
        $this->naissance_jour_moi = $naissance_jour_moi;

        return $this;
    }

    public function getNaissanceAn(): ?string
    {
        return $this->naissance_an;
    }

    public function setNaissanceAn(string $naissance_an): static
    {
        $this->naissance_an = $naissance_an;

        return $this;
    }

    public function getNaissanceHeure(): ?string
    {
        return $this->naissance_heure;
    }

    public function setNaissanceHeure(?string $naissance_heure): static
    {
        $this->naissance_heure = $naissance_heure;

        return $this;
    }

    public function getNaissanceMinuite(): ?string
    {
        return $this->naissance_minuite;
    }

    public function setNaissanceMinuite(?string $naissance_minuite): static
    {
        $this->naissance_minuite = $naissance_minuite;

        return $this;
    }

    public function getNaissanceNomPrenom(): ?string
    {
        return $this->naissance_nom_prenom;
    }

    public function setNaissanceNomPrenom(string $naissance_nom_prenom): static
    {
        $this->naissance_nom_prenom = $naissance_nom_prenom;

        return $this;
    }

    public function getNaissanceLieu(): ?string
    {
        return $this->naissance_lieu;
    }

    public function setNaissanceLieu(string $naissance_lieu): static
    {
        $this->naissance_lieu = $naissance_lieu;

        return $this;
    }

    public function getNaissanceSexe(): ?string
    {
        return $this->naissance_sexe;
    }

    public function setNaissanceSexe(string $naissance_sexe): static
    {
        $this->naissance_sexe = $naissance_sexe;

        return $this;
    }

    public function getPereNomPrenom(): ?string
    {
        return $this->pere_nom_prenom;
    }

    public function setPereNomPrenom(string $pere_nom_prenom): static
    {
        $this->pere_nom_prenom = $pere_nom_prenom;

        return $this;
    }

    public function getPereDatenaisance(): ?string
    {
        return $this->pere_datenaisance;
    }

    public function setPereDatenaisance(?string $pere_datenaisance): static
    {
        $this->pere_datenaisance = $pere_datenaisance;

        return $this;
    }

    public function getPereLieunaissance(): ?string
    {
        return $this->pere_lieunaissance;
    }

    public function setPereLieunaissance(?string $pere_lieunaissance): static
    {
        $this->pere_lieunaissance = $pere_lieunaissance;

        return $this;
    }

    public function getPereProfession(): ?string
    {
        return $this->pere_profession;
    }

    public function setPereProfession(?string $pere_profession): static
    {
        $this->pere_profession = $pere_profession;

        return $this;
    }

    public function getPereVillederesidence(): ?string
    {
        return $this->pere_villederesidence;
    }

    public function setPereVillederesidence(?string $pere_villederesidence): static
    {
        $this->pere_villederesidence = $pere_villederesidence;

        return $this;
    }

    public function getMereNomPrenom(): ?string
    {
        return $this->mere_nom_prenom;
    }

    public function setMereNomPrenom(string $mere_nom_prenom): static
    {
        $this->mere_nom_prenom = $mere_nom_prenom;

        return $this;
    }

    public function getMereDatenaisance(): ?string
    {
        return $this->mere_datenaisance;
    }

    public function setMereDatenaisance(?string $mere_datenaisance): static
    {
        $this->mere_datenaisance = $mere_datenaisance;

        return $this;
    }

    public function getMereLieunaissance(): ?string
    {
        return $this->mere_lieunaissance;
    }

    public function setMereLieunaissance(?string $mere_lieunaissance): static
    {
        $this->mere_lieunaissance = $mere_lieunaissance;

        return $this;
    }

    public function getMereProfession(): ?string
    {
        return $this->mere_profession;
    }

    public function setMereProfession(?string $mere_profession): static
    {
        $this->mere_profession = $mere_profession;

        return $this;
    }

    public function getMereVillederesidenc(): ?string
    {
        return $this->mere_villederesidenc;
    }

    public function setMereVillederesidenc(?string $mere_villederesidenc): static
    {
        $this->mere_villederesidenc = $mere_villederesidenc;

        return $this;
    }

    public function getDeclarationFaitePar(): ?string
    {
        return $this->declaration_faite_par;
    }

    public function setDeclarationFaitePar(string $declaration_faite_par): static
    {
        $this->declaration_faite_par = $declaration_faite_par;

        return $this;
    }

    public function getDatejugement(): ?string
    {
        return $this->datejugement;
    }

    public function setDatejugement(string $datejugement): static
    {
        $this->datejugement = $datejugement;

        return $this;
    }

    public function getDeclarationRecuePa(): ?string
    {
        return $this->declaration_recue_pa;
    }

    public function setDeclarationRecuePa(string $declaration_recue_pa): static
    {
        $this->declaration_recue_pa = $declaration_recue_pa;

        return $this;
    }

    public function getEdit(): ?string
    {
        return $this->Edit;
    }

    public function setEdit(?string $Edit): static
    {
        $this->Edit = $Edit;

        return $this;
    }

    public function getImprimer(): ?string
    {
        return $this->Imprimer;
    }

    public function setImprimer(?string $Imprimer): static
    {
        $this->Imprimer = $Imprimer;

        return $this;
    }

    public function getDelete(): ?string
    {
        return $this->Delete_;
    }

    public function setDelete(?string $Delete_): static
    {
        $this->Delete_ = $Delete_;

        return $this;
    }
}
