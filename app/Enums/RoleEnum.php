<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class RoleEnum extends Enum
{
    const user = "user";
    const admin = "admin";
    const owner = "owner";
}
