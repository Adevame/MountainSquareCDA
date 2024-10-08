<?php

namespace App\Entity;

use App\Repository\DateHoraireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DateHoraireRepository::class)]
class DateHoraire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_IMMUTABLE)]
    private ?\DateTimeInterface $time = null;

    /**
     * @var Collection<int, Performer>
     */
    #[ORM\OneToMany(targetEntity: Performer::class, mappedBy: 'prestation')]
    private Collection $performers;

    /**
     * @var Collection<int, Scene>
     */
    #[ORM\ManyToMany(targetEntity: Scene::class, mappedBy: 'dateHoraire')]
    private Collection $scenes;

    /**
     * @var Collection<int, Jour>
     */
    #[ORM\ManyToMany(targetEntity: Jour::class, mappedBy: 'passage')]
    private Collection $jourNumero;

    /**
     * @var Collection<int, Passage>
     */
    #[ORM\OneToMany(targetEntity: Passage::class, mappedBy: 'horaires')]
    private Collection $passages;

    public function __construct()
    {
        $this->performers = new ArrayCollection();
        $this->scenes = new ArrayCollection();
        $this->jourNumero = new ArrayCollection();
        $this->passages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): static
    {
        $this->time = $time;

        return $this;
    }

    public function __toString(): string
    {
        if ($this->time === null) {
            return '';
        }
        return $this->time instanceof \DateTimeInterface ? $this->time->format('Y-m-d H:i') : '';
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
            $performer->setPrestation($this);
        }

        return $this;
    }

    public function removePerformer(Performer $performer): static
    {
        if ($this->performers->removeElement($performer)) {
            // set the owning side to null (unless already changed)
            if ($performer->getPrestation() === $this) {
                $performer->setPrestation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Scene>
     */
    public function getScenes(): Collection
    {
        return $this->scenes;
    }

    public function addScene(Scene $scene): static
    {
        if (!$this->scenes->contains($scene)) {
            $this->scenes->add($scene);
            $scene->addDateHoraire($this);
        }

        return $this;
    }

    public function removeScene(Scene $scene): static
    {
        if ($this->scenes->removeElement($scene)) {
            $scene->removeDateHoraire($this);
        }

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
            $jourNumero->addPassage($this);
        }

        return $this;
    }

    public function removeJourNumero(Jour $jourNumero): static
    {
        if ($this->jourNumero->removeElement($jourNumero)) {
            $jourNumero->removePassage($this);
        }

        return $this;
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
            $passage->setHoraires($this);
        }

        return $this;
    }

    public function removePassage(Passage $passage): static
    {
        if ($this->passages->removeElement($passage)) {
            // set the owning side to null (unless already changed)
            if ($passage->getHoraires() === $this) {
                $passage->setHoraires(null);
            }
        }

        return $this;
    }
}
