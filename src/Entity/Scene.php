<?php

namespace App\Entity;

use App\Repository\SceneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SceneRepository::class)]
class Scene
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numero = null;

    /**
     * @var Collection<int, Performer>
     */
    #[ORM\ManyToMany(targetEntity: Performer::class, mappedBy: 'affectation')]
    private Collection $performers;

    /**
     * @var Collection<int, DateHoraire>
     */
    #[ORM\ManyToMany(targetEntity: DateHoraire::class, inversedBy: 'scenes')]
    private Collection $dateHoraire;

    public function __construct()
    {
        $this->performers = new ArrayCollection();
        $this->dateHoraire = new ArrayCollection();
    }




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumero(): ?int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): static
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * @return Collection<int, Performer>
     */
    public function getPerformers(): Collection
    {
        return $this->performers;
    }

    public function addPerformer(Performer $performer): static
    {
        if (!$this->performers->contains($performer)) {
            $this->performers->add($performer);
            $performer->addAffectation($this);
        }

        return $this;
    }

    public function removePerformer(Performer $performer): static
    {
        if ($this->performers->removeElement($performer)) {
            $performer->removeAffectation($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, DateHoraire>
     */
    public function getDateHoraire(): Collection
    {
        return $this->dateHoraire;
    }

    public function addDateHoraire(DateHoraire $dateHoraire): static
    {
        if (!$this->dateHoraire->contains($dateHoraire)) {
            $this->dateHoraire->add($dateHoraire);
        }

        return $this;
    }

    public function removeDateHoraire(DateHoraire $dateHoraire): static
    {
        $this->dateHoraire->removeElement($dateHoraire);

        return $this;
    }
}
