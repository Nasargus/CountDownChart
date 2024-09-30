<?php

namespace App\Entity;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\TableauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TableauRepository::class)]
#[ApiResource]
class Tableau
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Ta_libelle = null;

    /**
     * @var Collection<int, Carte>
     */
    #[ORM\OneToMany(targetEntity: Carte::class, mappedBy: 'tableau')]
    private Collection $carte;

    public function __construct()
    {
        $this->carte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaLibelle(): ?string
    {
        return $this->Ta_libelle;
    }

    public function setTaLibelle(string $Ta_libelle): static
    {
        $this->Ta_libelle = $Ta_libelle;

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
            $carte->setTableau($this);
        }

        return $this;
    }

    public function removeCarte(Carte $carte): static
    {
        if ($this->carte->removeElement($carte)) {
            // set the owning side to null (unless already changed)
            if ($carte->getTableau() === $this) {
                $carte->setTableau(null);
            }
        }

        return $this;
    }
}
