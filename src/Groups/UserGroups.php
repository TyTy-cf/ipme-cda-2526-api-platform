<?php

namespace App\Groups;

interface UserGroups
{
    const UUID = "user:uuid";
    const FIRSTNAME = "user:firstname";
    const LASTNAME = "user:lastname";
    const EMAIL = "user:email";
    const SIRET = "user:siret";
    const PASSWORD = "user:password";
    const PLAIN_PASSWORD = "user:plainPassword";
    const ITEM = [self::UUID, self::FIRSTNAME, self::LASTNAME, self::EMAIL];
    const POST = [self::EMAIL, self::FIRSTNAME, self::LASTNAME, self::SIRET, self::PLAIN_PASSWORD];
    const PATCH = [...self::POST];

}
