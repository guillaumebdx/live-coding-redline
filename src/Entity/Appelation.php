<?php

namespace App\Entity;

use App\Repository\AppelationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AppelationRepository::class)
 */
class Appelation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $identifier;

    /**
     * @ORM\OneToMany(targetEntity=Castle::class, mappedBy="appelation")
     */
    private $castles;

    public function __construct()
    {
        $this->castles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(?string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * @return Collection|Castle[]
     */
    public function getCastles(): Collection
    {
        return $this->castles;
    }

    public function addCastle(Castle $castle): self
    {
        if (!$this->castles->contains($castle)) {
            $this->castles[] = $castle;
            $castle->setAppelation($this);
        }

        return $this;
    }

    public function removeCastle(Castle $castle): self
    {
        if ($this->castles->removeElement($castle)) {
            // set the owning side to null (unless already changed)
            if ($castle->getAppelation() === $this) {
                $castle->setAppelation(null);
            }
        }

        return $this;
    }
}
