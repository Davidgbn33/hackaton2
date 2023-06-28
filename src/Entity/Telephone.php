<?php

namespace App\Entity;

use App\Repository\TelephoneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TelephoneRepository::class)]
class Telephone
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $cable_charger = null;

    #[ORM\Column(length: 255)]
    private ?string $estimatedPrice = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isCableCharger(): ?bool
    {
        return $this->cable_charger;
    }

    public function setCableCharger(bool $cable_charger): static
    {
        $this->cable_charger = $cable_charger;

        return $this;
    }

    public function getEstimatedPrice(): ?string
    {
        return $this->estimatedPrice;
    }

    public function setEstimatedPrice(string $estimatedPrice): static
    {
        $this->estimatedPrice = $estimatedPrice;

        return $this;
    }
}
