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
         * @ORM\Column(type="string", length=255, nullable=false)
         */

        private $libelle;

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
