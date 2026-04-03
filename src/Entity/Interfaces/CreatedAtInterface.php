<?php

namespace App\Entity\Interfaces;

use DateTime;

interface CreatedAtInterface
{

    public function setCreatedAt(DateTime $createdAt): self;

}
