<?php

namespace App\Entity;

use App\Repository\MarquesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MarquesRepository::class)]
class Marques
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'marque', targetEntity: Models::class)]
    private Collection $models;

    #[ORM\Column(length: 255)]
    private ?string $imgurl = null;

    public function __construct()
    {
        $this->models = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImgurl(): ?string
    {
        return $this->imgurl;
    }
    public function setImgurl(string $imgurl): self
    {
        $this->imgurl = $imgurl;
        return $this;
    }

    /**
     * @return Collection<int, Models>
     */
    public function getModels(): Collection
    {
        return $this->models;
    }

    public function addModel(Models $model): self
    {
        if (!$this->models->contains($model)) {
            $this->models->add($model);
            $model->setMarque($this);
        }

        return $this;
    }

    public function removeModel(Models $model): self
    {
        if ($this->models->removeElement($model)) {
            // set the owning side to null (unless already changed)
            if ($model->getMarque() === $this) {
                $model->setMarque(null);
            }
        }

        return $this;
    }
}
