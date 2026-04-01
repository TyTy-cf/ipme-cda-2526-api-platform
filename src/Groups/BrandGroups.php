<?php

namespace App\Groups;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;

interface BrandGroups
{
    const ID = "brand:id";
    const NAME = "brand:name";
    const SLUG = "brand:slug";
    const MODELS = "brand:models";
    const COUNT_MODELS = "brand:count_model";
    const COLLECTION = [self::NAME, self::SLUG, self::COUNT_MODELS];
    const ITEM = [self::ID, self::NAME, self::SLUG, self::MODELS, ModelGroups::ALL];
    const POST = self::NAME;

}
