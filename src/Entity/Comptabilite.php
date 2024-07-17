<?php

namespace App\Entity;

use App\Repository\ComptabiliteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ComptabiliteRepository::class)]
class Comptabilite extends User
{
}
