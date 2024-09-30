<?php

namespace App\Entity;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\InvitationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvitationRepository::class)]
#[ApiResource]
class Invitation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $In_Temps_Expiration = null;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class, inversedBy: 'invitations')]
    private Collection $invitation;

    /**
     * @var Collection<int, self>
     */
    #[ORM\ManyToMany(targetEntity: self::class, mappedBy: 'invitation')]
    private Collection $invitations;

    public function __construct()
    {
        $this->invitation = new ArrayCollection();
        $this->invitations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInTempsExpiration(): ?\DateTimeInterface
    {
        return $this->In_Temps_Expiration;
    }

    public function setInTempsExpiration(\DateTimeInterface $In_Temps_Expiration): static
    {
        $this->In_Temps_Expiration = $In_Temps_Expiration;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getInvitation(): Collection
    {
        return $this->invitation;
    }

    public function addInvitation(self $invitation): static
    {
        if (!$this->invitation->contains($invitation)) {
            $this->invitation->add($invitation);
        }

        return $this;
    }

    public function removeInvitation(self $invitation): static
    {
        $this->invitation->removeElement($invitation);

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getInvitations(): Collection
    {
        return $this->invitations;
    }
}
