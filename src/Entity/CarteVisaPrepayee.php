<?php

namespace App\Entity;

use App\Repository\CarteVisaPrepayeeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CarteVisaPrepayeeRepository::class)
 */
class CarteVisaPrepayee
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDeNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $villeDeNaissance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $profession;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomDuPere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomDuPere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomDeLaMere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomDeLaMere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sexe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroDeCNIOuPassport;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emailClient;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroDeTelephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroDeLaCarteVisaPrepayee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroIdentifiantUnique;

    /**
     * @ORM\ManyToOne(targetEntity=TypeDeCarte::class, inversedBy="carteVisaPrepayees")
     */
    private $typeDeCarte;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pieceIdentiterecto;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, nullable=true)
     */
    private $pieceIdentiteverso;

    /**
     * @ORM\Column(type="string", length=255, nullable=true, nullable=true)
     */
    private $PlanDeLocalisation;


    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="carteVisaPrepayees")
     * @ORM\JoinColumn(nullable=false)
     */
    private $agent;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $valide;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\ManyToOne(targetEntity=TypeDePieceIdentite::class, inversedBy="carteVisaPrepayees")
     */
    private $typepieceidentite;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->dateDeNaissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $dateDeNaissance): self
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }

    public function getVilleDeNaissance(): ?string
    {
        return $this->villeDeNaissance;
    }

    public function setVilleDeNaissance(string $villeDeNaissance): self
    {
        $this->villeDeNaissance = $villeDeNaissance;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

  

    public function getSexe(): ?string
    {
        return $this->sexe;
    }

    public function setSexe(string $sexe): self
    {
        $this->sexe = $sexe;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getNumeroDeCNIOuPassport(): ?string
    {
        return $this->numeroDeCNIOuPassport;
    }

    public function setNumeroDeCNIOuPassport(string $numeroDeCNIOuPassport): self
    {
        $this->numeroDeCNIOuPassport = $numeroDeCNIOuPassport;

        return $this;
    }

    public function getEmailClient(): ?string
    {
        return $this->emailClient;
    }

    public function setEmailClient(string $emailClient): self
    {
        $this->emailClient = $emailClient;

        return $this;
    }

    public function getNumeroDeTelephone(): ?string
    {
        return $this->numeroDeTelephone;
    }

    public function setNumeroDeTelephone(string $numeroDeTelephone): self
    {
        $this->numeroDeTelephone = $numeroDeTelephone;

        return $this;
    }

    public function getNumeroDeLaCarteVisaPrepayee(): ?string
    {
        return $this->numeroDeLaCarteVisaPrepayee;
    }

    public function setNumeroDeLaCarteVisaPrepayee(string $numeroDeLaCarteVisaPrepayee): self
    {
        $this->numeroDeLaCarteVisaPrepayee = $numeroDeLaCarteVisaPrepayee;

        return $this;
    }

    public function getNumeroIdentifiantUnique(): ?string
    {
        return $this->numeroIdentifiantUnique;
    }

    public function setNumeroIdentifiantUnique(string $numeroIdentifiantUnique): self
    {
        $this->numeroIdentifiantUnique = $numeroIdentifiantUnique;

        return $this;
    }

    public function getTypeDeCarte(): ?TypeDeCarte
    {
        return $this->typeDeCarte;
    }

    public function setTypeDeCarte(?TypeDeCarte $typeDeCarte): self
    {
        $this->typeDeCarte = $typeDeCarte;

        return $this;
    }

    public function getNomDuPere(): ?string
    {
        return $this->nomDuPere;
    }

    public function setNomDuPere(string $nomDuPere): self
    {
        $this->nomDuPere = $nomDuPere;

        return $this;
    }

    public function getPrenomDuPere(): ?string
    {
        return $this->prenomDuPere;
    }

    public function setPrenomDuPere(string $prenomDuPere): self
    {
        $this->prenomDuPere = $prenomDuPere;

        return $this;
    }

    public function getNomDeLaMere(): ?string
    {
        return $this->nomDeLaMere;
    }

    public function setNomDeLaMere(string $nomDeLaMere): self
    {
        $this->nomDeLaMere = $nomDeLaMere;

        return $this;
    }

    public function getPrenomDeLaMere(): ?string
    {
        return $this->prenomDeLaMere;
    }

    public function setPrenomDeLaMere(string $prenomDeLaMere): self
    {
        $this->prenomDeLaMere = $prenomDeLaMere;

        return $this;
    }

    public function getPieceIdentiterecto(): ?string
    {
        return $this->pieceIdentiterecto;
    }

    public function setPieceIdentiterecto(string $pieceIdentiterecto): self
    {
        $this->pieceIdentiterecto = $pieceIdentiterecto;

        return $this;
    }

    public function getPieceIdentiteverso(): ?string
    {
        return $this->pieceIdentiteverso;
    }

    public function setPieceIdentiteverso(?string $pieceIdentiteverso): self
    {
        $this->pieceIdentiteverso = $pieceIdentiteverso;

        return $this;
    }

    public function getPlanDeLocalisation(): ?string
    {
        return $this->PlanDeLocalisation;
    }

    public function setPlanDeLocalisation(?string $PlanDeLocalisation): self
    {
        $this->PlanDeLocalisation = $PlanDeLocalisation;

        return $this;
    }

   

    public function getAgent(): ?User
    {
        return $this->agent;
    }

    public function setAgent(?User $agent): self
    {
        $this->agent = $agent;

        return $this;
    }

    public function isValide(): ?bool
    {
        return $this->valide;
    }

    public function setValide(?bool $valide): self
    {
        $this->valide = $valide;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getTypepieceidentite(): ?TypeDePieceIdentite
    {
        return $this->typepieceidentite;
    }

    public function setTypepieceidentite(?TypeDePieceIdentite $typepieceidentite): self
    {
        $this->typepieceidentite = $typepieceidentite;

        return $this;
    }
}
