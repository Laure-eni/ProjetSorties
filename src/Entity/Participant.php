<?php

namespace App\Entity;

use App\Repository\ParticipantRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Table(name="Participant")
 * @ORM\Entity(repositoryClass=ParticipantRepository::class)
 */
class Participant implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=30, nullable=false)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=30, nullable=false)
     */
    private $prenom;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    private $mail;

    /**
     * @ORM\Column (type="string", length=255)
     */
    private $motDePasse;

    /**
     * @return mixed
     */
    public function getSortieCreee()
    {
        return $this->sortieCreee;
    }

    /**
     * @param mixed $sortieCreee
     */
    public function setSortieCreee($sortieCreee): void
    {
        $this->sortieCreee = $sortieCreee;
    }

    /**
     * @return mixed
     */
    public function getInscription()
    {
        return $this->inscription;
    }

    /**
     * @param mixed $inscription
     */
    public function setInscription($inscription): void
    {
        $this->inscription = $inscription;
    }

    /**
     * @ORM\Column (type="string")
     */
    private $administrateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Campus", inversedBy="etudiant")
     */
    private $noCampus;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Sortie", mappedBy="organisateur")
     */
    private $sortieCreee;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Sortie", mappedBy="inscrits")
     */
    private $inscription;



    /**
     * @return mixed
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     */
    public function setPseudo($pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone): void
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    /**
     * @param mixed $motDePasse
     */
    public function setMotDePasse($motDePasse): void
    {
        $this->motDePasse = $motDePasse;
    }

    /**
     * @return mixed
     */
    public function getAdministrateur()
    {
        return $this->administrateur;
    }

    /**
     * @param mixed $administrateur
     */
    public function setAdministrateur($administrateur): void
    {
        $this->administrateur = $administrateur;
    }

    /**
     * @return mixed
     */
    public function getNoCampus()
    {
        return $this->noCampus;
    }

    /**
     * @param mixed $noCampus
     */
    public function setNoCampus($noCampus): void
    {
        $this->noCampus = $noCampus;
    }



    public function getId(): ?int
    {
        return $this->id;
    }

    //inutile pour nous
    public function getSalt() {return null;}
    public function eraseCredentials(){}

    public function getRoles()
    {
        // TODO: Implement getRoles() method.
    }

    public function getPassword()
    {
        // TODO: Implement getPassword() method.
    }

    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }
}
