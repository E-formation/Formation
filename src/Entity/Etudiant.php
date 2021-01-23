<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtudiantRepository::class)
 */
class Etudiant
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
    private $ufr_inscrit;

    /**
     * @ORM\Column(type="date")
     */
    private $annee_inscrit;

    /**
     * @ORM\OneToMany(targetEntity=Administrateur::class, mappedBy="etudiant")
     */
    private $administrateurs;

    /**
     * @ORM\OneToMany(targetEntity=Matiere::class, mappedBy="etudiant")
     */
    private $matieres;

    /**
     * @ORM\OneToMany(targetEntity=Emploidutemps::class, mappedBy="etudiant")
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

    public function getUfrInscrit(): ?string
    {
        return $this->ufr_inscrit;
    }

    public function setUfrInscrit(string $ufr_inscrit): self
    {
        $this->ufr_inscrit = $ufr_inscrit;

        return $this;
    }

    public function getAnneeInscrit(): ?\DateTimeInterface
    {
        return $this->annee_inscrit;
    }

    public function setAnneeInscrit(\DateTimeInterface $annee_inscrit): self
    {
        $this->annee_inscrit = $annee_inscrit;

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
            $administrateur->setEtudiant($this);
        }

        return $this;
    }

    public function removeAdministrateur(Administrateur $administrateur): self
    {
        if ($this->administrateurs->removeElement($administrateur)) {
            // set the owning side to null (unless already changed)
            if ($administrateur->getEtudiant() === $this) {
                $administrateur->setEtudiant(null);
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
            $matiere->setEtudiant($this);
        }

        return $this;
    }

    public function removeMatiere(Matiere $matiere): self
    {
        if ($this->matieres->removeElement($matiere)) {
            // set the owning side to null (unless already changed)
            if ($matiere->getEtudiant() === $this) {
                $matiere->setEtudiant(null);
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
            $emploidutemp->setEtudiant($this);
        }

        return $this;
    }

    public function removeEmploidutemp(Emploidutemps $emploidutemp): self
    {
        if ($this->emploidutemps->removeElement($emploidutemp)) {
            // set the owning side to null (unless already changed)
            if ($emploidutemp->getEtudiant() === $this) {
                $emploidutemp->setEtudiant(null);
            }
        }

        return $this;
    }
}
