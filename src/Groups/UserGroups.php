<?php

namespace App\Groups;

interface UserGroups
{
    const UUID = "user:uuid";
    const FIRSTNAME = "user:firstname";
    const LASTNAME = "user:lastname";
    const EMAIL = "user:email";
    const PASSWORD = "user:password";
    const COLLECTION = [self::UUID, self::EMAIL];
    const ITEM = [self::UUID, self::FIRSTNAME, self::LASTNAME, self::EMAIL];
    const POST = [self::EMAIL, self::PASSWORD];

}
