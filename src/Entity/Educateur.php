<?php

namespace App\Entity;

use App\Repository\EducateurRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducateurRepository::class)]
class Educateur extends User
{


    #[ORM\Column(length: 255)]
    private ?string $classe = null;

    #[ORM\Column(length: 255)]
    private ?string $langue = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $niveau = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $datePayement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $status = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateRenouvellement = null;

    #[ORM\Column]
    private ?bool $estdinsponible = null;





    public function getClasse(): ?string
    {
        return $this->classe;
    }

    public function setClasse(string $classe): static
    {
        $this->classe = $classe;

        return $this;
    }

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(string $langue): static
    {
        $this->langue = $langue;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(?string $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getDatePayement(): ?\DateTimeInterface
    {
        return $this->datePayement;
    }

    public function setDatePayement(?\DateTimeInterface $datePayement): static
    {
        $this->datePayement = $datePayement;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getDateRenouvellement(): ?\DateTimeInterface
    {
        return $this->dateRenouvellement;
    }

    public function setDateRenouvellement(?\DateTimeInterface $dateRenouvellement): static
    {
        $this->dateRenouvellement = $dateRenouvellement;

        return $this;
    }

    public function isEstdinsponible(): ?bool
    {
        return $this->estdinsponible;
    }

    public function setEstdinsponible(bool $estdinsponible): static
    {
        $this->estdinsponible = $estdinsponible;

        return $this;
    }


}
