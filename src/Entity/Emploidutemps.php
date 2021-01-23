<?php

namespace App\Entity;

use App\Repository\EmploidutempsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmploidutempsRepository::class)
 */
class Emploidutemps
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Enseignant::class, inversedBy="emploidutemps")
     */
    private $enseignant;

    /**
     * @ORM\ManyToOne(targetEntity=Etudiant::class, inversedBy="emploidutemps")
     */
    private $etudiant;

    /**
     * @ORM\ManyToOne(targetEntity=Administrateur::class, inversedBy="emploidutemps")
     */
    private $administrateur;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $salle_de_cours;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code_matiere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_matiere;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre_heure_cours;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnseignant(): ?Enseignant
    {
        return $this->enseignant;
    }

    public function setEnseignant(?Enseignant $enseignant): self
    {
        $this->enseignant = $enseignant;

        return $this;
    }

    public function getEtudiant(): ?Etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?Etudiant $etudiant): self
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    public function getAdministrateur(): ?Administrateur
    {
        return $this->administrateur;
    }

    public function setAdministrateur(?Administrateur $administrateur): self
    {
        $this->administrateur = $administrateur;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getSalleDeCours(): ?string
    {
        return $this->salle_de_cours;
    }

    public function setSalleDeCours(string $salle_de_cours): self
    {
        $this->salle_de_cours = $salle_de_cours;

        return $this;
    }

    public function getCodeMatiere(): ?string
    {
        return $this->code_matiere;
    }

    public function setCodeMatiere(string $code_matiere): self
    {
        $this->code_matiere = $code_matiere;

        return $this;
    }

    public function getNomMatiere(): ?string
    {
        return $this->nom_matiere;
    }

    public function setNomMatiere(string $nom_matiere): self
    {
        $this->nom_matiere = $nom_matiere;

        return $this;
    }

    public function getNombreHeureCours(): ?string
    {
        return $this->nombre_heure_cours;
    }

    public function setNombreHeureCours(string $nombre_heure_cours): self
    {
        $this->nombre_heure_cours = $nombre_heure_cours;

        return $this;
    }
}
