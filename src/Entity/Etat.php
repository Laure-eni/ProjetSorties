<?php

namespace App\Entity;

use App\Repository\EtatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtatRepository::class)
 */
    class Etat
    {
        /**
         * @ORM\Id
         * @ORM\GeneratedValue
         * @ORM\Column(type="integer")
         */
        private $id;

        /**
         * @return mixed
         */
        public function getSortie()
        {
            return $this->sortie;
        }

        /**
         * @param mixed $sortie
         */
        public function setSortie($sortie): void
        {
            $this->sortie = $sortie;
        }

        /**
         * @ORM\Column(type="string", length=255, nullable=false)
         */

        private $libelle;

        /**
         * @ORM\OneToMany(targetEntity="App\Entity\Sortie", mappedBy="etat")
         */
        private $sortie;

        public function getId(): ?int
        {
            return $this->id;
        }

        /**
         * @return mixed
         */
        public function getLibelle()
        {
            return $this->libelle;
        }

        /**
         * @param mixed $libelle
         */
        public function setLibelle($libelle): void
        {
            $this->libelle = $libelle;
        }


    }
