<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CountryRepository")
 */
class Country
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Stat", mappedBy="country", orphanRemoval=true)
     */
    private $stats;

    public function __construct()
    {
        $this->stats = new ArrayCollection();
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

    /**
     * @return Collection|Stat[]
     */
    public function getStats(): Collection
    {
        return $this->stats;
    }

    public function addStat(Stat $stat): self
    {
        if (!$this->stats->contains($stat)) {
            $this->stats[] = $stat;
            $stat->setCountry($this);
        }

        return $this;
    }

    public function removeStat(Stat $stat): self
    {
        if ($this->stats->contains($stat)) {
            $this->stats->removeElement($stat);
            // set the owning side to null (unless already changed)
            if ($stat->getCountry() === $this) {
                $stat->setCountry(null);
            }
        }

        return $this;
    }

    public function getContaminated(){
        $total = 0;
        foreach ($this->getStats() as $stat){
            $total += $stat->getContaminated();
        }
        return $total;
    }

    public function getHealed(){
        $total = 0;
        foreach ($this->getStats() as $stat){
            $total += $stat->getHealed();
        }
        return $total;
    }

    public function getZombified(){
        $total = 0;
        foreach ($this->getStats() as $stat){
            $total += $stat->getZombified();
        }
        return $total;
    }

    public function __toString()
    {
      return $this->name;
    }
}
