<?php

namespace App\Entity;

use App\Repository\RAMRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: RAMRepository::class)]
class RAM
{
    use TimestampableEntity;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(nullable: true)]
    private ?int $price = null;

    #[ORM\OneToMany(mappedBy: 'RAM', targetEntity: telephone::class)]
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
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(?string $price): static
    {
        $this->price = $price;

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
            $telephone->setRAM($this);
        }

        return $this;
    }

    public function removeTelephone(telephone $telephone): static
    {
        if ($this->telephone->removeElement($telephone)) {
            // set the owning side to null (unless already changed)
            if ($telephone->getRAM() === $this) {
                $telephone->setRAM(null);
            }
        }

        return $this;
    }
}
