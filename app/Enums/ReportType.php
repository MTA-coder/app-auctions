<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class ReportType extends Enum
{
    const complain =   "complain";
    const fraud =   "fraud";
    const adult = "adult";
}
