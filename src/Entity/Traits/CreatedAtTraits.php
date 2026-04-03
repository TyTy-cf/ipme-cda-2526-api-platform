<?php

namespace App\Entity\Traits;

use App\Groups\FavoriteGroups;
use Symfony\Component\Serializer\Attribute\Groups;
use Doctrine\ORM\Mapping as ORM;

trait CreatedAtTraits
{

    #[ORM\Column]
    #[Groups(FavoriteGroups::CREATED_AT)]
    private ?\DateTime $createdAt = null;

    public function getCreatedAt(): ?\DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

}
