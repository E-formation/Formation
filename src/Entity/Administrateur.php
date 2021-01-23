<?php

namespace App\Entity;

use App\Repository\AdministrateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdministrateurRepository::class)
 */
class Administrateur
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
     * @ORM\ManyToOne(targetEntity=Etudiant::class, inversedBy="administrateurs")
     */
    private $etudiant;

    /**
     * @ORM\ManyToOne(targetEntity=Enseignant::class, inversedBy="administrateurs")
     */
    private $enseignant;

    /**
     * @ORM\OneToMany(targetEntity=Emploidutemps::class, mappedBy="administrateur")
     */
    private $emploidutemps;

    public function __construct()
    {
        $this->emploidutemps = new ArrayCollection();
    }

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

    public function getEtudiant(): ?Etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?Etudiant $etudiant): self
    {
        $this->etudiant = $etudiant;

        return $this;
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

    /**
     * @return Collection|Emploidutemps[]
     */
    public function getEmploidutemps(): Collection
    {
        return $this->emploidutemps;
    }

    public function addEmploidutemp(Emploidutemps $emploidutemp): self
    {
        if (!$this->emploidutemps->contains($emploidutemp)) {
            $this->emploidutemps[] = $emploidutemp;
            $emploidutemp->setAdministrateur($this);
        }

        return $this;
    }

    public function removeEmploidutemp(Emploidutemps $emploidutemp): self
    {
        if ($this->emploidutemps->removeElement($emploidutemp)) {
            // set the owning side to null (unless already changed)
            if ($emploidutemp->getAdministrateur() === $this) {
                $emploidutemp->setAdministrateur(null);
            }
        }

        return $this;
    }
}
