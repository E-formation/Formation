<?php

namespace App\Entity;

use App\Repository\EnseignantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnseignantRepository::class)
 */
class Enseignant
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
     * @ORM\Column(type="integer")
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $matiere_enseigner;

    /**
     * @ORM\OneToMany(targetEntity=Administrateur::class, mappedBy="enseignant")
     */
    private $administrateurs;

    /**
     * @ORM\OneToMany(targetEntity=Matiere::class, mappedBy="enseignant")
     */
    private $matieres;

    /**
     * @ORM\OneToMany(targetEntity=Emploidutemps::class, mappedBy="enseignant")
     */
    private $emploidutemps;

    public function __construct()
    {
        $this->administrateurs = new ArrayCollection();
        $this->matieres = new ArrayCollection();
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

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMatiereEnseigner(): ?string
    {
        return $this->matiere_enseigner;
    }

    public function setMatiereEnseigner(string $matiere_enseigner): self
    {
        $this->matiere_enseigner = $matiere_enseigner;

        return $this;
    }

    /**
     * @return Collection|Administrateur[]
     */
    public function getAdministrateurs(): Collection
    {
        return $this->administrateurs;
    }

    public function addAdministrateur(Administrateur $administrateur): self
    {
        if (!$this->administrateurs->contains($administrateur)) {
            $this->administrateurs[] = $administrateur;
            $administrateur->setEnseignant($this);
        }

        return $this;
    }

    public function removeAdministrateur(Administrateur $administrateur): self
    {
        if ($this->administrateurs->removeElement($administrateur)) {
            // set the owning side to null (unless already changed)
            if ($administrateur->getEnseignant() === $this) {
                $administrateur->setEnseignant(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Matiere[]
     */
    public function getMatieres(): Collection
    {
        return $this->matieres;
    }

    public function addMatiere(Matiere $matiere): self
    {
        if (!$this->matieres->contains($matiere)) {
            $this->matieres[] = $matiere;
            $matiere->setEnseignant($this);
        }

        return $this;
    }

    public function removeMatiere(Matiere $matiere): self
    {
        if ($this->matieres->removeElement($matiere)) {
            // set the owning side to null (unless already changed)
            if ($matiere->getEnseignant() === $this) {
                $matiere->setEnseignant(null);
            }
        }

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
            $emploidutemp->setEnseignant($this);
        }

        return $this;
    }

    public function removeEmploidutemp(Emploidutemps $emploidutemp): self
    {
        if ($this->emploidutemps->removeElement($emploidutemp)) {
            // set the owning side to null (unless already changed)
            if ($emploidutemp->getEnseignant() === $this) {
                $emploidutemp->setEnseignant(null);
            }
        }

        return $this;
    }
}
