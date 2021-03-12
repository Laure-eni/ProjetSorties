<?php

namespace App\Entity;

use App\Repository\CampusRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CampusRepository::class)
 */
class Campus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column (type="string")
     */
    private $nomCampus;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Participant", mappedBy="noCampus")
     */
    private $etudiant;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sortie", mappedBy="campusSortie")
     */
    private $cpSortie;

    /**
     * @return mixed
     */
    public function getCpSortie()
    {
        return $this->cpSortie;
    }

    /**
     * @param mixed $cpSortie
     */
    public function setCpSortie($cpSortie): void
    {
        $this->cpSortie = $cpSortie;
    }

    /**
     * @return mixed
     */
    public function getNomCampus()
    {
        return $this->nomCampus;
    }

    /**
     * @param mixed $nomCampus
     */
    public function setNomCampus($nomCampus): void
    {
        $this->nomCampus = $nomCampus;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function __toString() {
        return $this->nomCampus;
    }
}
