<?php

namespace App\Entity;

use App\Repository\TelephoneRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: TelephoneRepository::class)]
class Telephone
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $cable_charger = null;

    #[ORM\Column(nullable: true)]
    private ?int $estimatedPrice = null;

    #[ORM\ManyToOne(inversedBy: 'telephone')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'telephone')]
    private ?Brand $brand = null;

    #[ORM\ManyToOne(inversedBy: 'telephone')]
    private ?Model $model = null;

    #[ORM\ManyToOne(inversedBy: 'telephone')]
    private ?RAM $RAM = null;

    #[ORM\ManyToOne(inversedBy: 'telephone')]
    private ?Memory $memory = null;

    #[ORM\ManyToOne(inversedBy: 'telephone')]
    private ?Network $network = null;

    #[ORM\ManyToOne(inversedBy: 'telephone')]
    private ?Status $status = null;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(?Model $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function getRAM(): ?RAM
    {
        return $this->RAM;
    }

    public function setRAM(?RAM $RAM): static
    {
        $this->RAM = $RAM;

        return $this;
    }

    public function getMemory(): ?Memory
    {
        return $this->memory;
    }

    public function setMemory(?Memory $memory): static
    {
        $this->memory = $memory;

        return $this;
    }

    public function getNetwork(): ?Network
    {
        return $this->network;
    }

    public function setNetwork(?Network $network): static
    {
        $this->network = $network;

        return $this;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function setStatus(?Status $status): static
    {
        $this->status = $status;

        return $this;
    }
}
