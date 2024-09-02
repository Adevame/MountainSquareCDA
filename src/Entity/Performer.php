<?php

namespace App\Entity;

use App\Repository\PerformerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PerformerRepository::class)]
class Performer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    /**
     * @var Collection<int, Scene>
     */
    #[ORM\ManyToMany(targetEntity: Scene::class, inversedBy: 'performers')]
    private Collection $affectation;

    #[ORM\ManyToOne(inversedBy: 'performers')]
    private ?DateHoraire $prestation = null;

    public function __construct()
    {
        $this->affectation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection<int, Scene>
     */
    public function getAffectation(): Collection
    {
        return $this->affectation;
    }

    public function addAffectation(Scene $affectation): static
    {
        if (!$this->affectation->contains($affectation)) {
            $this->affectation->add($affectation);
        }

        return $this;
    }

    public function removeAffectation(Scene $affectation): static
    {
        $this->affectation->removeElement($affectation);

        return $this;
    }

    public function getPrestation(): ?DateHoraire
    {
        return $this->prestation;
    }

    public function setPrestation(?DateHoraire $prestation): static
    {
        $this->prestation = $prestation;

        return $this;
    }
}
