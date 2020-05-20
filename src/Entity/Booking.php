<?php

namespace App\Entity;

use App\Repository\BookingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BookingRepository::class)
 */
class Booking
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Room::class, inversedBy="bookings")
     */
    private $Room_id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="bookings")
     */
    private $User_id;

    /**
     * @ORM\Column(type="date")
     */
    private $checkIn_date;

    /**
     * @ORM\Column(type="date")
     */
    private $checkOut_date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $BetaalMethode;

    /**
     * @ORM\ManyToOne(targetEntity=Payment::class, inversedBy="bookings")
     */
    private $Payment_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoomId(): ?Room
    {
        return $this->Room_id;
    }

    public function setRoomId(?Room $Room_id): self
    {
        $this->Room_id = $Room_id;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->User_id;
    }

    public function setUserId(?User $User_id): self
    {
        $this->User_id = $User_id;

        return $this;
    }

    public function getCheckInDate(): ?\DateTimeInterface
    {
        return $this->checkIn_date;
    }

    public function setCheckInDate(\DateTimeInterface $checkIn_date): self
    {
        $this->checkIn_date = $checkIn_date;

        return $this;
    }

    public function getCheckOutDate(): ?\DateTimeInterface
    {
        return $this->checkOut_date;
    }

    public function setCheckOutDate(\DateTimeInterface $checkOut_date): self
    {
        $this->checkOut_date = $checkOut_date;

        return $this;
    }

    public function getBetaalMethode(): ?string
    {
        return $this->BetaalMethode;
    }

    public function setBetaalMethode(?string $BetaalMethode): self
    {
        $this->BetaalMethode = $BetaalMethode;

        return $this;
    }

    public function getPaymentId(): ?Payment
    {
        return $this->Payment_id;
    }

    public function setPaymentId(?Payment $Payment_id): self
    {
        $this->Payment_id = $Payment_id;

        return $this;
    }
}
