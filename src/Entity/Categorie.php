<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
    public function getCatName()
    {
        return $this->catName;
    }

    /**
     * @param mixed $catName
     */
    public function setCatName($catName): void
    {
        $this->catName = $catName;
    }

    /**
     * @ORM\Column (type = "string", length = 150, nullable = false)
     */
    private $catName;

    public function getId(): ?int
    {
        return $this->id;
    }
}
