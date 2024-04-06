<?php

namespace App\Entity;

use App\Repository\VoitureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VoitureRepository::class)
 */
class Voiture
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
    private $serie;

    /**
     * @ORM\OneToMany(targetEntity=Location::class, mappedBy="voiture")
     */
    private $locationsv;

    public function __construct()
    {
        $this->locationsv = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSerie(): ?string
    {
        return $this->serie;
    }

    public function setSerie(string $serie): self
    {
        $this->serie = $serie;

        return $this;
    }

    /**
     * @return Collection<int, Location>
     */
    public function getLocationsv(): Collection
    {
        return $this->locationsv;
    }

    public function addLocationsv(Location $locationsv): self
    {
        if (!$this->locationsv->contains($locationsv)) {
            $this->locationsv[] = $locationsv;
            $locationsv->setVoiture($this);
        }

        return $this;
    }

    public function removeLocationsv(Location $locationsv): self
    {
        if ($this->locationsv->removeElement($locationsv)) {
            // set the owning side to null (unless already changed)
            if ($locationsv->getVoiture() === $this) {
                $locationsv->setVoiture(null);
            }
        }

        return $this;
    }
}
