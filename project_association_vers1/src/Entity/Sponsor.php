<?php

namespace App\Entity;

use App\Repository\SponsorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SponsorRepository::class)
 */
class Sponsor
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
    private $nameSponsor;

    /**
     * @ORM\Column(type="float")
     */
    private $amount_earned;

    /**
     * @ORM\ManyToMany(targetEntity=Evenement::class, mappedBy="sponsor")
     */
    private $evenements;

    public function __construct()
    {
        $this->evenements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameSponsor(): ?string
    {
        return $this->nameSponsor;
    }

    public function setNameSponsor(string $nameSponsor): self
    {
        $this->nameSponsor = $nameSponsor;

        return $this;
    }

    public function getAmountEarned(): ?float
    {
        return $this->amount_earned;
    }

    public function setAmountEarned(float $amount_earned): self
    {
        $this->amount_earned = $amount_earned;

        return $this;
    }

    /**
     * @return Collection|Evenement[]
     */
    public function getEvenements(): Collection
    {
        return $this->evenements;
    }

    public function addEvenement(Evenement $evenement): self
    {
        if (!$this->evenements->contains($evenement)) {
            $this->evenements[] = $evenement;
            $evenement->addSponsor($this);
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): self
    {
        if ($this->evenements->removeElement($evenement)) {
            $evenement->removeSponsor($this);
        }

        return $this;
    }
}
