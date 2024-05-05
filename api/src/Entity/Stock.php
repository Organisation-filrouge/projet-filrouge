<?php

namespace App\Entity;

use App\Repository\StockRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StockRepository::class)]
class Stock
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $entrepot = null;

    #[ORM\OneToOne(mappedBy: 'stock', cascade: ['persist', 'remove'])]
    private ?BarreEnStock $barreEnStock = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEntrepot(): ?string
    {
        return $this->entrepot;
    }

    public function setEntrepot(string $entrepot): static
    {
        $this->entrepot = $entrepot;

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
            $this->barreEnStock->setStock(null);
        }

        // set the owning side of the relation if necessary
        if ($barreEnStock !== null && $barreEnStock->getStock() !== $this) {
            $barreEnStock->setStock($this);
        }

        $this->barreEnStock = $barreEnStock;

        return $this;
    }
}
