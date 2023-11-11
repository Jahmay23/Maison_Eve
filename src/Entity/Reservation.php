<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_end = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column(length: 255)]
    private ?string $choice = null;

    #[ORM\Column]
    private ?bool $etat = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Logements $logements = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Voitures $voitures = null;

    #[ORM\OneToMany(mappedBy: 'reservation', targetEntity: ReservationService::class, orphanRemoval: true)]
    private Collection $ReservationService;

    public function __construct()
    {
        $this->ReservationService = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->date_end;
    }

    public function setDateEnd(\DateTimeInterface $date_end): static
    {
        $this->date_end = $date_end;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getChoice(): ?string
    {
        return $this->choice;
    }

    public function setChoice(string $choice): static
    {
        $this->choice = $choice;

        return $this;
    }

    public function isEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(bool $etat): static
    {
        $this->etat = $etat;

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

    public function getLogements(): ?Logements
    {
        return $this->logements;
    }

    public function setLogements(Logements $logements): static
    {
        $this->logements = $logements;

        return $this;
    }

    public function getVoitures(): ?Voitures
    {
        return $this->voitures;
    }

    public function setVoitures(Voitures $voitures): static
    {
        $this->voitures = $voitures;

        return $this;
    }

    /**
     * @return Collection<int, ReservationService>
     */
    public function getReservationService(): Collection
    {
        return $this->ReservationService;
    }

    public function addReservationService(ReservationService $reservationService): static
    {
        if (!$this->ReservationService->contains($reservationService)) {
            $this->ReservationService->add($reservationService);
            $reservationService->setReservation($this);
        }

        return $this;
    }

    public function removeReservationService(ReservationService $reservationService): static
    {
        if ($this->ReservationService->removeElement($reservationService)) {
            // set the owning side to null (unless already changed)
            if ($reservationService->getReservation() === $this) {
                $reservationService->setReservation(null);
            }
        }

        return $this;
    }
}
