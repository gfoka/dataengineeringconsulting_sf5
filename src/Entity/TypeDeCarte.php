<?php

namespace App\Entity;

use App\Repository\TypeDeCarteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeDeCarteRepository::class)
 */
class TypeDeCarte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="boolean")
     */
    private $active;

    /**
     * @ORM\OneToMany(targetEntity=CarteVisaPrepayee::class, mappedBy="typeDeCarte")
     */
    private $carteVisaPrepayees;

    /**
     * @ORM\Column(type="integer")
     */
    private $ordre;

    public function __construct()
    {
        $this->carteVisaPrepayees = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return Collection<int, CarteVisaPrepayee>
     */
    public function getCarteVisaPrepayees(): Collection
    {
        return $this->carteVisaPrepayees;
    }

    public function addCarteVisaPrepayee(CarteVisaPrepayee $carteVisaPrepayee): self
    {
        if (!$this->carteVisaPrepayees->contains($carteVisaPrepayee)) {
            $this->carteVisaPrepayees[] = $carteVisaPrepayee;
            $carteVisaPrepayee->setTypeDeCarte($this);
        }

        return $this;
    }

    public function removeCarteVisaPrepayee(CarteVisaPrepayee $carteVisaPrepayee): self
    {
        if ($this->carteVisaPrepayees->removeElement($carteVisaPrepayee)) {
            // set the owning side to null (unless already changed)
            if ($carteVisaPrepayee->getTypeDeCarte() === $this) {
                $carteVisaPrepayee->setTypeDeCarte(null);
            }
        }

        return $this;
    }

    public function __toString(): string
        {
            return $this->libelle;
        }

    public function getOrdre(): ?int
    {
        return $this->ordre;
    }

    public function setOrdre(int $ordre): self
    {
        $this->ordre = $ordre;

        return $this;
    }
}
