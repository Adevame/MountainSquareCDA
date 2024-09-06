<?php

namespace App\Entity;

use App\Repository\PassageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PassageRepository::class)]
class Passage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'passages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Performer $performers = null;

    #[ORM\ManyToOne(inversedBy: 'passages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DateHoraire $horaires = null;

    #[ORM\ManyToOne(inversedBy: 'passages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Scene $scene = null;

    #[ORM\ManyToOne(inversedBy: 'passages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Jour $jour = null;

    #[ORM\Column]
    private ?int $numero = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPerformers(): ?Performer
    {
        return $this->performers;
    }

    public function setPerformers(?Performer $performers): static
    {
        $this->performers = $performers;

        return $this;
    }

    public function getHoraires(): ?DateHoraire
    {
        return $this->horaires;
    }

    public function setHoraires(?DateHoraire $horaires): static
    {
        $this->horaires = $horaires;

        return $this;
    }

    public function getScene(): ?Scene
    {
        return $this->scene;
    }

    public function setScene(?Scene $scene): static
    {
        $this->scene = $scene;

        return $this;
    }

    public function getJour(): ?Jour
    {
        return $this->jour;
    }

    public function setJour(?Jour $jour): static
    {
        $this->jour = $jour;

        return $this;
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
}
