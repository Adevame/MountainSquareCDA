<?php

namespace App\Entity;

use App\Repository\JourRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JourRepository::class)]
class Jour
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numero = null;

    /**
     * @var Collection<int, Scene>
     */
    #[ORM\ManyToMany(targetEntity: Scene::class, inversedBy: 'jourNumero')]
    private Collection $scene;

    /**
     * @var Collection<int, Performer>
     */
    #[ORM\ManyToMany(targetEntity: Performer::class, inversedBy: 'jourNumero')]
    private Collection $performers;

    /**
     * @var Collection<int, DateHoraire>
     */
    #[ORM\ManyToMany(targetEntity: DateHoraire::class, inversedBy: 'jourNumero')]
    private Collection $passage;

    public function __construct()
    {
        $this->scene = new ArrayCollection();
        $this->performers = new ArrayCollection();
        $this->passage = new ArrayCollection();
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
     * @return Collection<int, Scene>
     */
    public function getScene(): Collection
    {
        return $this->scene;
    }

    public function addScene(Scene $scene): static
    {
        if (!$this->scene->contains($scene)) {
            $this->scene->add($scene);
        }

        return $this;
    }

    public function removeScene(Scene $scene): static
    {
        $this->scene->removeElement($scene);

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
        }

        return $this;
    }

    public function removePerformer(Performer $performer): static
    {
        $this->performers->removeElement($performer);

        return $this;
    }

    /**
     * @return Collection<int, DateHoraire>
     */
    public function getPassage(): Collection
    {
        return $this->passage;
    }

    public function addPassage(DateHoraire $passage): static
    {
        if (!$this->passage->contains($passage)) {
            $this->passage->add($passage);
        }

        return $this;
    }

    public function removePassage(DateHoraire $passage): static
    {
        $this->passage->removeElement($passage);

        return $this;
    }
}
