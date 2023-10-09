<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\UserFromRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserFromRepository::class)]
#[ApiResource]
class UserFrom
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nickname = null;

    #[ORM\Column(length: 255)]
    private ?string $lastname = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $job = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\ManyToOne(inversedBy: 'userFroms')]
    private ?User $userFrom = null;

    #[ORM\ManyToMany(targetEntity: Formations::class, inversedBy: 'userFroms')]
    private Collection $formationRegistration;

    public function __construct()
    {
        $this->formationRegistration = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    public function setNickname(string $nickname): static
    {
        $this->nickname = $nickname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(?string $job): static
    {
        $this->job = $job;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getUserFrom(): ?User
    {
        return $this->userFrom;
    }

    public function setUserFrom(?User $userFrom): static
    {
        $this->userFrom = $userFrom;

        return $this;
    }

    /**
     * @return Collection<int, Formations>
     */
    public function getFormationRegistration(): Collection
    {
        return $this->formationRegistration;
    }

    public function addFormationRegistration(Formations $formationRegistration): static
    {
        if (!$this->formationRegistration->contains($formationRegistration)) {
            $this->formationRegistration->add($formationRegistration);
        }

        return $this;
    }

    public function removeFormationRegistration(Formations $formationRegistration): static
    {
        $this->formationRegistration->removeElement($formationRegistration);

        return $this;
    }
}
