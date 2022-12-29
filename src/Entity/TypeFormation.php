<?php

namespace App\Entity;

use App\Repository\TypeFormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeFormationRepository::class)
 */
class TypeFormation
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
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=CategorieFormation::class, mappedBy="typeFormation")
     */
    private $categorieFormations;

    public function __construct()
    {
        $this->categorieFormations = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, CategorieFormation>
     */
    public function getCategorieFormations(): Collection
    {
        return $this->categorieFormations;
    }

    public function addCategorieFormation(CategorieFormation $categorieFormation): self
    {
        if (!$this->categorieFormations->contains($categorieFormation)) {
            $this->categorieFormations[] = $categorieFormation;
            $categorieFormation->setTypeFormation($this);
        }

        return $this;
    }

    public function removeCategorieFormation(CategorieFormation $categorieFormation): self
    {
        if ($this->categorieFormations->removeElement($categorieFormation)) {
            // set the owning side to null (unless already changed)
            if ($categorieFormation->getTypeFormation() === $this) {
                $categorieFormation->setTypeFormation(null);
            }
        }

        return $this;
    }
}
