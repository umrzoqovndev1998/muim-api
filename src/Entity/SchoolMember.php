<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\SchoolMemberRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;

#[ORM\Entity(repositoryClass: SchoolMemberRepository::class)]
#[ApiResource(
    normalizationContext: ['groups' => ['school_member:read']],
    denormalizationContext:['groups' => ['school_member:write']]
)]

#[Groups(['school_member:read'])]
class SchoolMember
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[NotBlank(message:"Bo'sh bo'lishi mumkin emas")]
    #[Groups(['school_member:write'])]
    private ?string $full_name = null;

    #[ORM\Column(length: 255)]
    #[NotBlank(message:"Bo'sh bo'lishi mumkin emas")]
    #[Groups(['school_member:write'])]
    private ?string $role = null;

    #[ORM\Column(length: 255)]
    #[NotBlank(message:"Bo'sh bo'lishi mumkin emas")]
    #[Groups(['school_member:write'])]
    private ?string $task = null;

    #[ORM\Column(type: Types::TEXT)]
    #[NotBlank(message:"Bo'sh bo'lishi mumkin emas")]
    #[Groups(['school_member:write'])]
    private ?string $about_member = null;

    #[ORM\OneToOne(inversedBy: 'schoolMember', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['school_member:write'])]
    private ?MediaObject $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFullName(): ?string
    {
        return $this->full_name;
    }

    public function setFullName(string $full_name): static
    {
        $this->full_name = $full_name;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): static
    {
        $this->role = $role;

        return $this;
    }

    public function getTask(): ?string
    {
        return $this->task;
    }

    public function setTask(string $task): static
    {
        $this->task = $task;

        return $this;
    }

    public function getAboutMember(): ?string
    {
        return $this->about_member;
    }

    public function setAboutMember(string $about_member): static
    {
        $this->about_member = $about_member;

        return $this;
    }

    public function getImage(): ?MediaObject
    {
        return $this->image;
    }

    public function setImage(MediaObject $image): static
    {
        $this->image = $image;

        return $this;
    }
}
