<?php

namespace App\Entity;

use App\Repository\PaymentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaymentRepository::class)
 */
class Payment
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $user_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $soort;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Rekening_nr;

    /**
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    private $Betaal_date;

    /**
     * @ORM\OneToMany(targetEntity=Booking::class, mappedBy="Payment_id")
     */
    private $bookings;

    public function __construct()
    {
        $this->bookings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(?int $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getSoort(): ?string
    {
        return $this->soort;
    }

    public function setSoort(string $soort): self
    {
        $this->soort = $soort;

        return $this;
    }

    public function getRekeningNr(): ?string
    {
        return $this->Rekening_nr;
    }

    public function setRekeningNr(string $Rekening_nr): self
    {
        $this->Rekening_nr = $Rekening_nr;

        return $this;
    }

    public function getBetaalDate(): ?\DateTimeInterface
    {
        return $this->Betaal_date;
    }

    public function setBetaalDate(?\DateTimeInterface $Betaal_date): self
    {
        $this->Betaal_date = $Betaal_date;

        return $this;
    }

    /**
     * @return Collection|Booking[]
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Booking $booking): self
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings[] = $booking;
            $booking->setPaymentId($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->bookings->contains($booking)) {
            $this->bookings->removeElement($booking);
            // set the owning side to null (unless already changed)
            if ($booking->getPaymentId() === $this) {
                $booking->setPaymentId(null);
            }
        }

        return $this;
    }
}
