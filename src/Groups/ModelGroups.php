<?php

namespace App\Groups;

interface ModelGroups
{
    const ID = "model:id";
    const NAME = "model:name";
    const SLUG = "model:slug";
    const BRAND = "model:brand";
    const COLLECTION = [self::NAME, self::SLUG];
    const ITEM = [self::ID, self::NAME, self::SLUG, self::BRAND, BrandGroups::COLLECTION];

}
