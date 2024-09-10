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

    /**
     * @var Collection<int, Jour>
     */
    #[ORM\ManyToMany(targetEntity: Jour::class, mappedBy: 'scene')]
    private Collection $jourNumero;

    /**
     * @var Collection<int, Passage>
     */
    #[ORM\ManyToMany(targetEntity: Passage::class, inversedBy: 'scenes')]
    private Collection $passages;

    public function __construct()
    {
        $this->performers = new ArrayCollection();
        $this->dateHoraire = new ArrayCollection();
        $this->jourNumero = new ArrayCollection();
        $this->passages = new ArrayCollection();
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

    public function __toString(): string
    {
        return $this->numero;
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

    /**
     * @return Collection<int, Jour>
     */
    public function getJourNumero(): Collection
    {
        return $this->jourNumero;
    }

    public function addJourNumero(Jour $jourNumero): static
    {
        if (!$this->jourNumero->contains($jourNumero)) {
            $this->jourNumero->add($jourNumero);
            $jourNumero->addScene($this);
        }

        return $this;
    }

    public function removeJourNumero(Jour $jourNumero): static
    {
        if ($this->jourNumero->removeElement($jourNumero)) {
            $jourNumero->removeScene($this);
        }

        return $this;
    }

    public function getPassageNumero(Passage $passageNumero) :Collection
    {
        return $this->passageNumero;
    }

     /**
     * @return Collection<int, Passage>
     */
    public function getPassages(): Collection
    {
        return $this->passages;
    }

    public function addPassage(Passage $passage): static
    {
        if (!$this->passages->contains($passage)) {
            $this->passages->add($passage);
            $passage->setScene($this);
        }

        return $this;
    }

    public function removePassage(Passage $passage): static
    {
        if ($this->passages->removeElement($passage)) {
            if ($passage->getScene() === $this) {
                $passage->setScene(null);
            }
        }

        return $this;
    }
}