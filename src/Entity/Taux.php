<?php

namespace App\Entity;

use App\Repository\TauxRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=TauxRepository::class)
 */
class Taux
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     * 
     */
    private $taux;
        /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *  @Assert\NotBlank(allowNull = true)
     */
    private $nom;

        /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank(allowNull = true)
     */
    private $nom_projet;

    /**
         * @ORM\ManyToOne(targetEntity=Credit::class, inversedBy="credits")
         */
        private $credit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }
    public function getTaux(): ?float
    {
        return $this->taux;
    }

    public function setTaux(float $taux): self
    {
        $this->taux = $taux;

        return $this;
    }
    public function getNomProjet(): ?string
    {
        return $this->nom_projet;
    }

    public function setNomProjet(string $nom_projet): self
    {
        $this->nom_projet = $nom_projet;

        return $this;
    }
    public function getCredit(): ?object
    {
        return $this->credit;
    }

    public function setCredit(Credit $credit): self
    {
        $this->credit = $credit;

        return $this;
    }
    public function vars() :array
    {
        $tbl = [];
        $tbl[0]="nom";
        $tbl[1]="nomProjet";
        $tbl[2]="taux";
        $tbl[3]="credit";
        return $tbl;


    }
    public function typeVars() :array
    {
        $tbl = [];
        $tbl[0]="String";
        $tbl[1]="String";
        $tbl[2]="float";
        $tbl[3]="credit";
        return $tbl;


    }
    public function val() :array
    {
        $tbl = [];
        $tbl[0]=$this->getNom();
        $tbl[1]=$this->getNomProjet();
        $tbl[2]=$this->getTaux();
        $tbl[3]=$this->getCredit();
        return $tbl;


    }

    public function __toString()
    {
        // TODO: Implement __toString() method.

        $tbl=$this->getNom()."-".$this->getNomProjet().'-'.$this->getTaux();
        return $tbl;
    }
}
