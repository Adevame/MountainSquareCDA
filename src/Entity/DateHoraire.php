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

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
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

    public function __construct()
    {
        $this->performers = new ArrayCollection();
        $this->scenes = new ArrayCollection();
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
}
