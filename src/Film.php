<?php

class Film {
    private int $id;

    public function __construct(
        private string $titre,
        private string $realisateur,
        private string $synopsis,
        private string $genre,
        private string $scenariste,
        private string $societe,
        private int $annee,
        private ?string $image = null,
    )
    {
        $this->id = 0;
    }

    public function getid(): int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function setRealisateur(string $realisateur): static
    {
        $this->realisateur = $realisateur;

        return $this;
    }

    public function getRealisateur(): string
    {
        return $this->realisateur;
    }

    public function setSynopsis(string $synopsis): static
    {
        $this->synopsis = $synopsis;

        return $this;

    }

    public function getSynopsis(): string
    {
        return $this->synopsis;
    }

    public function setGenre(string $genre): static
    {
        $this->genre = $genre;

        return $this;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function setScenariste(string $scenariste): static
    {
        $this->scenariste = $scenariste;

        return $this;
    }

    public function getScenariste(): string
    {
        return $this->scenariste;
    }

    public function setSociete(string $societe): static
    {
        $this->societe = $societe;

        return $this;
    }

    public function getSociete(): string
    {
        return $this->societe;
    }

    public function setAnnee(int $annee): static
    {
        $this->annee = $annee;

        return $this;
    }

    public function getAnnee(): int
    {
        return $this->annee;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }
}
