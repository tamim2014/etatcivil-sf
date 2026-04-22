<?php

namespace App\Entity;

use App\Repository\ListeofficiersRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListeofficiersRepository::class)]
class Listeofficiers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $pseudo = null;

    #[ORM\Column(length: 30)]
    private ?string $motdepasse = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $roles = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getMotdepasse(): ?string
    {
        return $this->motdepasse;
    }

    public function setMotdepasse(string $motdepasse): static
    {
        $this->motdepasse = $motdepasse;

        return $this;
    }

    public function getroles(): ?string
    {
        return $this->roles;
    }

    public function setroles(?string $roles): static
    {
        $this->roles = $roles;

        return $this;
    }
}
