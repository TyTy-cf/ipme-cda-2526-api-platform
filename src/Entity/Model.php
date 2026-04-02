<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiProperty;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Groups\ModelGroups;
use App\Repository\ModelRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ModelRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(
            order: ['brand.name' => 'ASC', 'name' => 'ASC'],
            normalizationContext: ['groups' => ModelGroups::COLLECTION],
        ),
        new Get(normalizationContext: ['groups' => ModelGroups::ITEM]),
        new Post(
            normalizationContext: ['groups' => ModelGroups::ITEM],
            denormalizationContext: ['groups' => ModelGroups::POST],
        )
    ]
)]
class Model
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(ModelGroups::ID)]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(ModelGroups::NAME)]
    #[Assert\NotBlank(message: 'Model name cannot be blank !')]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(ModelGroups::SLUG)]
    private ?string $slug = null;

    #[ORM\ManyToOne(inversedBy: 'models')]
    #[Groups(ModelGroups::BRAND)]
    private ?Brand $brand = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): static
    {
        $this->brand = $brand;

        return $this;
    }
}
