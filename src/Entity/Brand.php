<?php

namespace App\Entity;

use App\Repository\BrandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BrandRepository::class)]
class Brand
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'brand', targetEntity: telephone::class)]
    private Collection $telephone;

    public function __construct()
    {
        $this->telephone = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, telephone>
     */
    public function getTelephone(): Collection
    {
        return $this->telephone;
    }

    public function addTelephone(telephone $telephone): static
    {
        if (!$this->telephone->contains($telephone)) {
            $this->telephone->add($telephone);
            $telephone->setBrand($this);
        }

        return $this;
    }

    public function removeTelephone(telephone $telephone): static
    {
        if ($this->telephone->removeElement($telephone)) {
            // set the owning side to null (unless already changed)
            if ($telephone->getBrand() === $this) {
                $telephone->setBrand(null);
            }
        }

        return $this;
    }
}
