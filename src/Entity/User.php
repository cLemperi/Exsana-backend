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
}
