<?php

namespace App\Entity;

use App\Repository\ImagesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImagesRepository::class)]
class Images
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $descriptions = null;

    #[ORM\OneToMany(mappedBy: 'images', targetEntity: Voitures::class)]
    private Collection $voitures;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'services')]
    #[ORM\JoinColumn(nullable: false)]
    private ?self $images = null;

    #[ORM\OneToMany(mappedBy: 'images', targetEntity: self::class)]
    private Collection $services;

    #[ORM\OneToMany(mappedBy: 'images', targetEntity: Logements::class)]
    private Collection $logements;

    public function __construct()
    {
        $this->voitures = new ArrayCollection();
        $this->services = new ArrayCollection();
        $this->logements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescriptions(): ?string
    {
        return $this->descriptions;
    }

    public function setDescriptions(string $descriptions): static
    {
        $this->descriptions = $descriptions;

        return $this;
    }

    /**
     * @return Collection<int, Voitures>
     */
    public function getVoitures(): Collection
    {
        return $this->voitures;
    }

    public function addVoiture(Voitures $voiture): static
    {
        if (!$this->voitures->contains($voiture)) {
            $this->voitures->add($voiture);
            $voiture->setImages($this);
        }

        return $this;
    }

    public function removeVoiture(Voitures $voiture): static
    {
        if ($this->voitures->removeElement($voiture)) {
            // set the owning side to null (unless already changed)
            if ($voiture->getImages() === $this) {
                $voiture->setImages(null);
            }
        }

        return $this;
    }

    public function getImages(): ?self
    {
        return $this->images;
    }

    public function setImages(?self $images): static
    {
        $this->images = $images;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addService(self $service): static
    {
        if (!$this->services->contains($service)) {
            $this->services->add($service);
            $service->setImages($this);
        }

        return $this;
    }

    public function removeService(self $service): static
    {
        if ($this->services->removeElement($service)) {
            // set the owning side to null (unless already changed)
            if ($service->getImages() === $this) {
                $service->setImages(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Logements>
     */
    public function getLogements(): Collection
    {
        return $this->logements;
    }

    public function addLogement(Logements $logement): static
    {
        if (!$this->logements->contains($logement)) {
            $this->logements->add($logement);
            $logement->setImages($this);
        }

        return $this;
    }

    public function removeLogement(Logements $logement): static
    {
        if ($this->logements->removeElement($logement)) {
            // set the owning side to null (unless already changed)
            if ($logement->getImages() === $this) {
                $logement->setImages(null);
            }
        }

        return $this;
    }
}
