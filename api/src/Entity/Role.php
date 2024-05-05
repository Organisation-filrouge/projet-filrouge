<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RoleRepository::class)]
class Role
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $type_role = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeRole(): ?string
    {
        return $this->type_role;
    }

    public function setTypeRole(string $type_role): static
    {
        $this->type_role = $type_role;

        return $this;
    }
}
