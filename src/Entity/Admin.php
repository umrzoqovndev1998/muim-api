<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use App\Controller\AdminCreateAction;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
#[ApiResource(
    operations:[
        new Post(
            controller:AdminCreateAction::class,
            name:'createAdmin'
        ),
        new Post(
            uriTemplate: 'admins/auth',
            name: 'auth'
        ),
        new GetCollection(),
        new Delete()
    ]
)]
class Admin implements PasswordAuthenticatedUserInterface, UserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Email(message:"Emailni example@gmail.com ko'rinishida kiriting")]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Length(min:8,minMessage:"password 8 ta belgidan kam bo'lmasligi kerak")]
    private ?string $password = null;

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }
    public function getRoles(): array
    {
         return ["ROLE_ADMIN"];
    }
    public function eraseCredentials(): void
    {

    }
    public function getUserIdentifier(): string
    {
         return $this->getEmail();
    }


}
