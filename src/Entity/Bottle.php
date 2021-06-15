<?php

namespace App\Entity;

use App\Repository\BottleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BottleRepository::class)
 */
class Bottle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $year;

    /**
     * @ORM\ManyToOne(targetEntity=Castle::class, inversedBy="bottles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $castle;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantity;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getCastle(): ?Castle
    {
        return $this->castle;
    }

    public function setCastle(?Castle $castle): self
    {
        $this->castle = $castle;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function addOne(): void
    {
        $this->quantity += 1;
    }

    public function removeOne(): void
    {
        $this->quantity > 0 ? $this->quantity -= 1 : 0;
    }
}
