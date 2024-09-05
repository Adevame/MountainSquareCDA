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

    /**
     * @var Collection<int, Jour>
     */
    #[ORM\ManyToMany(targetEntity: Jour::class, mappedBy: 'performers')]
    private Collection $jourNumero;

    #[ORM\Column(length: 255)]
    private ?string $typeMusique = null;

    #[ORM\Column(length: 255)]
    private ?string $youtube = null;

    public function __construct()
    {
        $this->affectation = new ArrayCollection();
        $this->jourNumero = new ArrayCollection();
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

    public function __toString(): string
    {
        return $this->nom;
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
            $jourNumero->addPerformer($this);
        }

        return $this;
    }

    public function removeJourNumero(Jour $jourNumero): static
    {
        if ($this->jourNumero->removeElement($jourNumero)) {
            $jourNumero->removePerformer($this);
        }

        return $this;
    }

    public function getTypeMusique(): ?string
    {
        return $this->typeMusique;
    }

    public function setTypeMusique(string $typeMusique): static
    {
        $this->typeMusique = $typeMusique;

        return $this;
    }

    public function getYoutube(): ?string
    {
        return $this->youtube;
    }

    public function setYoutube(string $youtube): static
    {
        $this->youtube = $youtube;

        return $this;
    }
}
