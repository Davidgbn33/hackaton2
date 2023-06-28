<?php

namespace App\Entity;

use App\Repository\StatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity(repositoryClass: StatusRepository::class)]
#[ORM\Table(name: '`condition`')]
class Status
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $price = null;

    #[ORM\OneToMany(mappedBy: 'status', targetEntity: telephone::class)]
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
            $telephone->setStatus($this);
        }

        return $this;
    }

    public function removeTelephone(telephone $telephone): static
    {
        if ($this->telephone->removeElement($telephone)) {
            // set the owning side to null (unless already changed)
            if ($telephone->getStatus() === $this) {
                $telephone->setStatus(null);
            }
        }

        return $this;
    }
}
