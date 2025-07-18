<?php

namespace App\Entity;

use App\Repository\FurnitureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FurnitureRepository::class)]
class Furniture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 255)]
    private ?string $material = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $color = null;

    #[ORM\Column]
    private ?bool $isGreen = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?string $image = null;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $category = null;

    #[ORM\Column(nullable: true)]
    private ?bool $outdoor = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $defaultLegsImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $defaultSeatImage = null;

    /**
     * @var Collection<int, FurnitureLeg>
     */
    #[ORM\OneToMany(targetEntity: FurnitureLeg::class, mappedBy: 'furniture')]
    private Collection $furnitureLegs;

    /**
     * @var Collection<int, FurnitureSeat>
     */
    #[ORM\OneToMany(targetEntity: FurnitureSeat::class, mappedBy: 'furniture')]
    private Collection $furnitureSeats;

    public function __construct()
    {
        $this->furnitureLegs = new ArrayCollection();
        $this->furnitureSeats = new ArrayCollection();
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

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function setMaterial(string $material): static
    {
        $this->material = $material;

        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function isGreen(): ?bool
    {
        return $this->isGreen;
    }

    public function setIsGreen(bool $isGreen): static
    {
        $this->isGreen = $isGreen;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }
    public function setImage(?string $image): self
    {
        $this->image = $image;
        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function isOutdoor(): ?bool
    {
        return $this->outdoor;
    }

    public function setOutdoor(bool $outdoor): static
    {
        $this->outdoor = $outdoor;

        return $this;
    }

    public function getDefaultLegsImage(): ?string
    {
        return $this->defaultLegsImage;
    }

    public function setDefaultLegsImage(?string $defaultLegsImage): static
    {
        $this->defaultLegsImage = $defaultLegsImage;

        return $this;
    }

    public function getDefaultSeatImage(): ?string
    {
        return $this->defaultSeatImage;
    }

    public function setDefaultSeatImage(?string $defaultSeatImage): static
    {
        $this->defaultSeatImage = $defaultSeatImage;

        return $this;
    }

    /**
     * @return Collection<int, FurnitureLeg>
     */
    public function getFurnitureLegs(): Collection
    {
        return $this->furnitureLegs;
    }

    public function addFurnitureLeg(FurnitureLeg $furnitureLeg): static
    {
        if (!$this->furnitureLegs->contains($furnitureLeg)) {
            $this->furnitureLegs->add($furnitureLeg);
            $furnitureLeg->setFurniture($this);
        }

        return $this;
    }

    public function removeFurnitureLeg(FurnitureLeg $furnitureLeg): static
    {
        if ($this->furnitureLegs->removeElement($furnitureLeg)) {
            // set the owning side to null (unless already changed)
            if ($furnitureLeg->getFurniture() === $this) {
                $furnitureLeg->setFurniture(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FurnitureSeat>
     */
    public function getFurnitureSeats(): Collection
    {
        return $this->furnitureSeats;
    }

    public function addFurnitureSeat(FurnitureSeat $furnitureSeat): static
    {
        if (!$this->furnitureSeats->contains($furnitureSeat)) {
            $this->furnitureSeats->add($furnitureSeat);
            $furnitureSeat->setFurniture($this);
        }

        return $this;
    }

    public function removeFurnitureSeat(FurnitureSeat $furnitureSeat): static
    {
        if ($this->furnitureSeats->removeElement($furnitureSeat)) {
            // set the owning side to null (unless already changed)
            if ($furnitureSeat->getFurniture() === $this) {
                $furnitureSeat->setFurniture(null);
            }
        }

        return $this;
    }
}
