<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Post;
use App\Entity\Interfaces\CreatedAtInterface;
use App\Entity\Traits\CreatedAtTraits;
use App\Groups\FavoriteGroups;
use App\Processor\UserProcessor;
use App\Repository\FavoriteRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: FavoriteRepository::class)]
#[ApiResource(
    operations: [
        new Post(
            normalizationContext: ['groups' => FavoriteGroups::ITEM],
            denormalizationContext: ['groups' => FavoriteGroups::POST],
            processor: UserProcessor::class,
        ),
        new Delete(
            security: "is_granted('ROLE_USER') and object.getUser() == user",
        ),
    ]
)]
class Favorite implements CreatedAtInterface
{
    use CreatedAtTraits;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(FavoriteGroups::ID)]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'favorites')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(FavoriteGroups::USER)]
    private ?User $user = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(FavoriteGroups::LISTING)]
    private ?Listing $listing = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getListing(): ?Listing
    {
        return $this->listing;
    }

    public function setListing(?Listing $listing): static
    {
        $this->listing = $listing;

        return $this;
    }
}
