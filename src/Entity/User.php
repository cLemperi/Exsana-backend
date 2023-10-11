<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\OneToMany(mappedBy: 'userFrom', targetEntity: UserFrom::class)]
    private Collection $userFroms;

    #[ORM\OneToMany(mappedBy: 'userMessage', targetEntity: UserMessage::class, orphanRemoval: true)]
    private Collection $userMessages;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: FormationsUser::class, orphanRemoval: true)]
    private Collection $formationsUsers;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Sex = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $job = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $rppsCode = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $postalCode = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $city = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $street = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $profil = null;

    public function __construct()
    {
        $this->userFroms = new ArrayCollection();
        $this->userMessages = new ArrayCollection();
        $this->formationsUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection<int, UserFrom>
     */
    public function getUserFroms(): Collection
    {
        return $this->userFroms;
    }

    public function addUserFrom(UserFrom $userFrom): static
    {
        if (!$this->userFroms->contains($userFrom)) {
            $this->userFroms->add($userFrom);
            $userFrom->setUserFrom($this);
        }

        return $this;
    }

    public function removeUserFrom(UserFrom $userFrom): static
    {
        if ($this->userFroms->removeElement($userFrom)) {
            // set the owning side to null (unless already changed)
            if ($userFrom->getUserFrom() === $this) {
                $userFrom->setUserFrom(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, UserMessage>
     */
    public function getUserMessages(): Collection
    {
        return $this->userMessages;
    }

    public function addUserMessage(UserMessage $userMessage): static
    {
        if (!$this->userMessages->contains($userMessage)) {
            $this->userMessages->add($userMessage);
            $userMessage->setUserMessage($this);
        }

        return $this;
    }

    public function removeUserMessage(UserMessage $userMessage): static
    {
        if ($this->userMessages->removeElement($userMessage)) {
            // set the owning side to null (unless already changed)
            if ($userMessage->getUserMessage() === $this) {
                $userMessage->setUserMessage(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, FormationsUser>
     */
    public function getFormationsUsers(): Collection
    {
        return $this->formationsUsers;
    }

    public function addFormationsUser(FormationsUser $formationsUser): static
    {
        if (!$this->formationsUsers->contains($formationsUser)) {
            $this->formationsUsers->add($formationsUser);
            $formationsUser->setUser($this);
        }

        return $this;
    }

    public function removeFormationsUser(FormationsUser $formationsUser): static
    {
        if ($this->formationsUsers->removeElement($formationsUser)) {
            // set the owning side to null (unless already changed)
            if ($formationsUser->getUser() === $this) {
                $formationsUser->setUser(null);
            }
        }

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->Sex;
    }

    public function setSex(?string $Sex): static
    {
        $this->Sex = $Sex;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): static
    {
        $this->lastName = $lastName;

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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getRppsCode(): ?string
    {
        return $this->rppsCode;
    }

    public function setRppsCode(?string $rppsCode): static
    {
        $this->rppsCode = $rppsCode;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(?string $postalCode): static
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(?string $street): static
    {
        $this->street = $street;

        return $this;
    }

    public function getProfil(): ?string
    {
        return $this->profil;
    }

    public function setProfil(?string $profil): static
    {
        $this->profil = $profil;

        return $this;
    }
}
