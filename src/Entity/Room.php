<?php

namespace App\Entity;

use App\Repository\RoomRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Mapping\EntityBase;

/**
 * @ORM\Entity(repositoryClass=RoomRepository::class)
 */
class Room extends EntityBase
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Room_nr;

    /**
     * @ORM\Column(type="float")
     */
    private $Price;

    /**
     * @ORM\Column(type="integer")
     */
    private $Bed;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $available;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Image_name;

    /**
     * @ORM\Column(type="integer")
     */
    private $Image_size;


    /**
     * @ORM\ManyToOne(targetEntity=Soort::class, inversedBy="rooms")
     */
    private $Soort;

    /**
     * @ORM\OneToMany(targetEntity=Booking::class, mappedBy="Room_id")
     */
    private $bookings;

    /**
     * @ORM\OneToMany(targetEntity=Extras::class, mappedBy="Room_nr")
     */
    private $extras;

    public function __construct()
    {
        $this->bookings = new ArrayCollection();
        $this->extras = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoomNr(): ?int
    {
        return $this->Room_nr;
    }

    public function setRoomNr(int $Room_nr): self
    {
        $this->Room_nr = $Room_nr;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->Price;
    }

    public function setPrice(float $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getBed(): ?int
    {
        return $this->Bed;
    }

    public function setBed(int $Bed): self
    {
        $this->Bed = $Bed;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getAvailable(): ?bool
    {
        return $this->available;
    }

    public function setAvailable(bool $available): self
    {
        $this->available = $available;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->Image_name;
    }

    public function setImageName(string $Image_name): self
    {
        $this->Image_name = $Image_name;

        return $this;
    }

    public function getImageSize(): ?int
    {
        return $this->Image_size;
    }

    public function setImageSize(int $Image_size): self
    {
        $this->Image_size = $Image_size;

        return $this;
    }


    public function getSoort(): ?Soort
    {
        return $this->Soort;
    }

    public function setSoort(?Soort $Soort): self
    {
        $this->Soort = $Soort;

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
            $booking->setRoomId($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->bookings->contains($booking)) {
            $this->bookings->removeElement($booking);
            // set the owning side to null (unless already changed)
            if ($booking->getRoomId() === $this) {
                $booking->setRoomId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Extras[]
     */
    public function getExtras(): Collection
    {
        return $this->extras;
    }

    public function addExtra(Extras $extra): self
    {
        if (!$this->extras->contains($extra)) {
            $this->extras[] = $extra;
            $extra->setRoomNr($this);
        }

        return $this;
    }

    public function removeExtra(Extras $extra): self
    {
        if ($this->extras->contains($extra)) {
            $this->extras->removeElement($extra);
            // set the owning side to null (unless already changed)
            if ($extra->getRoomNr() === $this) {
                $extra->setRoomNr(null);
            }
        }

        return $this;
    }
}
