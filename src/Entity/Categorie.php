<?php

namespace App\Entity;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
#[ApiResource]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Ca_libelle = null;

    /**
     * @var Collection<int, Carte>
     */
    #[ORM\OneToMany(targetEntity: Carte::class, mappedBy: 'categorie')]
    private Collection $carte;

    public function __construct()
    {
        $this->carte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCaLibelle(): ?string
    {
        return $this->Ca_libelle;
    }

    public function setCaLibelle(string $Ca_libelle): static
    {
        $this->Ca_libelle = $Ca_libelle;

        return $this;
    }

    /**
     * @return Collection<int, Carte>
     */
    public function getCarte(): Collection
    {
        return $this->carte;
    }

    public function addCarte(Carte $carte): static
    {
        if (!$this->carte->contains($carte)) {
            $this->carte->add($carte);
            $carte->setCategorie($this);
        }

        return $this;
    }

    public function removeCarte(Carte $carte): static
    {
        if ($this->carte->removeElement($carte)) {
            // set the owning side to null (unless already changed)
            if ($carte->getCategorie() === $this) {
                $carte->setCategorie(null);
            }
        }

        return $this;
    }
}
