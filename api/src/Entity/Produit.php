<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?float $epaisseur = null;

    #[ORM\Column]
    private ?float $hauteur = null;

    #[ORM\Column]
    private ?float $largeur = null;

    #[ORM\Column]
    private ?float $kg_par_m = null;

    #[ORM\Column]
    private ?float $prix_par_kg = null;

    #[ORM\Column]
    private ?int $hebhea = null;

    #[ORM\Column]
    private ?float $epaisseur_semelle = null;

    #[ORM\Column]
    private ?float $epaisseur_lame = null;

    #[ORM\Column]
    private ?float $hauteur_lame = null;


    #[ORM\Column]
    private ?float $largeur_semelle = null;

    #[ORM\Column]
    private ?float $section_cm2 = null;

    #[ORM\Column]
    private ?float $diametre_exterieur = null;

    #[ORM\Column]
    private ?float $hauteur_aile = null;

    #[ORM\OneToOne(mappedBy: 'produit', cascade: ['persist', 'remove'])]
    private ?LigneCommande $ligneCommande = null;



    #[ORM\OneToOne(mappedBy: 'produit', cascade: ['persist', 'remove'])]
    private ?HistoriquePrix $historiquePrix = null;

    #[ORM\OneToOne(mappedBy: 'produit', cascade: ['persist', 'remove'])]
    private ?BarreEnStock $barreEnStock = null;

    /**
     * @var Collection<int, FournirProduit>
     */
    #[ORM\OneToMany(targetEntity: FournirProduit::class, mappedBy: 'produit')]
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

    public function getEpaisseur(): ?float

    {
        return $this->epaisseur;
    }

    public function setEpaisseur(float $epaisseur): static
    {
        $this->epaisseur = $epaisseur;

        return $this;
    }

    public function getHauteur(): ?float
    {
        return $this->hauteur;
    }

    public function setHauteur(float $hauteur): static
    {
        $this->hauteur = $hauteur;

        return $this;
    }

    public function getLargeur(): ?float
    {
        return $this->largeur;
    }

    public function setLargeur(float $largeur): static
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getKgParM(): ?float
    {
        return $this->kg_par_m;
    }

    public function setKgParM(float $kg_par_m): static
    {
        $this->kg_par_m = $kg_par_m;

        return $this;
    }

    public function getPrixParKg(): ?float
    {
        return $this->prix_par_kg;
    }

    public function setPrixParKg(float $prix_par_kg): static
    {
        $this->prix_par_kg = $prix_par_kg;

        return $this;
    }

    public function getHebhea(): ?int
    {
        return $this->hebhea;
    }

    public function setHebhea(int $hebhea): static
    {
        $this->hebhea = $hebhea;

        return $this;
    }

    public function getEpaisseurSemelle(): ?float
    {
        return $this->epaisseur_semelle;
    }

    public function setEpaisseurSemelle(float $epaisseur_semelle): static
    {
        $this->epaisseur_semelle = $epaisseur_semelle;

        return $this;
    }

    public function getEpaisseurLame(): ?float
    {
        return $this->epaisseur_lame;
    }

    public function setEpaisseurLame(float $epaisseur_lame): static
    {
        $this->epaisseur_lame = $epaisseur_lame;

        return $this;
    }

    public function getHauteurLame(): ?float
    {
        return $this->hauteur_lame;
    }

    public function setHauteurLame(float $hauteur_lame): static
    {
        $this->hauteur_lame = $hauteur_lame;

        return $this;
    }

    public function getLargeurSemelle(): ?float
    {
        return $this->largeur_semelle;
    }

    public function setLargeurSemelle(float $largeur_semelle): static
    {
        $this->largeur_semelle = $largeur_semelle;

        return $this;
    }

    public function getSectionCm2(): ?float
    {
        return $this->section_cm2;
    }

    public function setSectionCm2(float $section_cm2): static
    {
        $this->section_cm2 = $section_cm2;

        return $this;
    }

    public function getDiametreExterieur(): ?float
    {
        return $this->diametre_exterieur;
    }

    public function setDiametreExterieur(float $diametre_exterieur): static
    {
        $this->diametre_exterieur = $diametre_exterieur;

        return $this;
    }

    public function getHauteurAile(): ?float
    {
        return $this->hauteur_aile;
    }

    public function setHauteurAile(float $hauteur_aile): static
    {
        $this->hauteur_aile = $hauteur_aile;

        return $this;
    }

    public function getLigneCommande(): ?LigneCommande
    {
        return $this->ligneCommande;
    }

    public function setLigneCommande(?LigneCommande $ligneCommande): static
    {
        // unset the owning side of the relation if necessary
        if ($ligneCommande === null && $this->ligneCommande !== null) {
            $this->ligneCommande->setProduit(null);
        }

        // set the owning side of the relation if necessary
        if ($ligneCommande !== null && $ligneCommande->getProduit() !== $this) {
            $ligneCommande->setProduit($this);
        }

        $this->ligneCommande = $ligneCommande;

        return $this;
    }

    public function getHistoriquePrix(): ?HistoriquePrix
    {
        return $this->historiquePrix;
    }

    public function setHistoriquePrix(?HistoriquePrix $historiquePrix): static
    {
        // unset the owning side of the relation if necessary
        if ($historiquePrix === null && $this->historiquePrix !== null) {
            $this->historiquePrix->setProduit(null);
        }

        // set the owning side of the relation if necessary
        if ($historiquePrix !== null && $historiquePrix->getProduit() !== $this) {
            $historiquePrix->setProduit($this);
        }

        $this->historiquePrix = $historiquePrix;

        return $this;
    }

    public function getBarreEnStock(): ?BarreEnStock
    {
        return $this->barreEnStock;
    }

    public function setBarreEnStock(?BarreEnStock $barreEnStock): static
    {
        // unset the owning side of the relation if necessary
        if ($barreEnStock === null && $this->barreEnStock !== null) {
            $this->barreEnStock->setProduit(null);
        }

        // set the owning side of the relation if necessary
        if ($barreEnStock !== null && $barreEnStock->getProduit() !== $this) {
            $barreEnStock->setProduit($this);
        }

        $this->barreEnStock = $barreEnStock;

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
            $fournirProduit->setProduit($this);
        }

        return $this;
    }

    public function removeFournirProduit(FournirProduit $fournirProduit): static
    {
        if ($this->fournirProduits->removeElement($fournirProduit)) {
            // set the owning side to null (unless already changed)
            if ($fournirProduit->getProduit() === $this) {
                $fournirProduit->setProduit(null);
            }
        }

        return $this;
    }

}
