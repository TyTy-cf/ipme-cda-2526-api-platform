<?php

namespace App\Groups;

interface FavoriteGroups
{
    const ID = "favorite:id";
    const CREATED_AT = "favorite:createdAt";
    const USER = "favorite:user";
    const LISTING = "favorite:listing";
    const POST = [self::LISTING];
    const ITEM = [self::ID, self::CREATED_AT, self::USER, self::LISTING];

}
