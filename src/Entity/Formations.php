<?php

namespace App\Entity;

use App\Repository\FormationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FormationsRepository::class)
 */
class Formations
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
    private $titre;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $duree;

    /**
     * @ORM\Column(type="text")
     */
    private $programme;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\Column(type="text")
     */
    private $prerequis;

    /**
     * @ORM\Column(type="text")
     */
    private $cible;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $langue;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity=Formateur::class, inversedBy="formations")
     */
    private $formateur;

    /**
     * @ORM\ManyToOne(targetEntity=CategorieFormation::class, inversedBy="formations")
     */
    private $categorieFormation;

    /**
     * @ORM\Column(type="text", nullable=false)
     */
    private $objectif;

    /**
     * @ORM\OneToMany(targetEntity=SessionFormation::class, mappedBy="formation")
     */
    private $sessionFormations;

    public function __construct()
    {
        $this->sessionFormations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

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

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    public function getDuree(): ?string
    {
        return $this->duree;
    }

    public function setDuree(string $duree): self
    {
        $this->duree = $duree;

        return $this;
    }

    public function getProgramme(): ?string
    {
        return $this->programme;
    }

    public function setProgramme(string $programme): self
    {
        $this->programme = $programme;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPrerequis(): ?string
    {
        return $this->prerequis;
    }

    public function setPrerequis(string $prerequis): self
    {
        $this->prerequis = $prerequis;

        return $this;
    }

    public function getCible(): ?string
    {
        return $this->cible;
    }

    public function setCible(string $cible): self
    {
        $this->cible = $cible;

        return $this;
    }

    public function getLangue(): ?string
    {
        return $this->langue;
    }

    public function setLangue(string $langue): self
    {
        $this->langue = $langue;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getFormateur(): ?Formateur
    {
        return $this->formateur;
    }

    public function setFormateur(?Formateur $formateur): self
    {
        $this->formateur = $formateur;

        return $this;
    }

    public function getCategorieFormation(): ?CategorieFormation
    {
        return $this->categorieFormation;
    }

    public function setCategorieFormation(?CategorieFormation $categorieFormation): self
    {
        $this->categorieFormation = $categorieFormation;

        return $this;
    }

    public function getObjectif(): ?string
    {
        return $this->objectif;
    }

    public function setObjectif(?string $objectif): self
    {
        $this->objectif = $objectif;

        return $this;
    }

    /**
     * @return Collection<int, SessionFormation>
     */
    public function getSessionFormations(): Collection
    {
        return $this->sessionFormations;
    }

    public function addSessionFormation(SessionFormation $sessionFormation): self
    {
        if (!$this->sessionFormations->contains($sessionFormation)) {
            $this->sessionFormations[] = $sessionFormation;
            $sessionFormation->setFormation($this);
        }

        return $this;
    }

    public function removeSessionFormation(SessionFormation $sessionFormation): self
    {
        if ($this->sessionFormations->removeElement($sessionFormation)) {
            // set the owning side to null (unless already changed)
            if ($sessionFormation->getFormation() === $this) {
                $sessionFormation->setFormation(null);
            }
        }

        return $this;
    }


    public function __toString(): string
    {
        return $this->titre;
    }

}
