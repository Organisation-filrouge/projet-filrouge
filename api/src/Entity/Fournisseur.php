<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FournisseurRepository::class)]
class Fournisseur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $rue = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column]
    private ?int $codePostal = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    /**
     * @var Collection<int, FournirProduit>
     */
    #[ORM\OneToMany(targetEntity: FournirProduit::class, mappedBy: 'fournisseur')]
    private Collection $fournirProduits;

    public function __construct()
    {
        $this->fournirProduits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getRue(): ?string
    {
        return $this->rue;
    }

    public function setRue(string $rue): static
    {
        $this->rue = $rue;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): static
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return Collection<int, FournirProduit>
     */
    public function getFournirProduits(): Collection
    {
        return $this->fournirProduits;
    }

    public function addFournirProduit(FournirProduit $fournirProduit): static
    {
        if (!$this->fournirProduits->contains($fournirProduit)) {
            $this->fournirProduits->add($fournirProduit);
            $fournirProduit->setFournisseur($this);
        }

        return $this;
    }

    public function removeFournirProduit(FournirProduit $fournirProduit): static
    {
        if ($this->fournirProduits->removeElement($fournirProduit)) {
            // set the owning side to null (unless already changed)
            if ($fournirProduit->getFournisseur() === $this) {
                $fournirProduit->setFournisseur(null);
            }
        }

        return $this;
    }

}
