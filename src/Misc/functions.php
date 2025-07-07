<?php

namespace LyraMaker\Entrevista\Misc;

use DateTime;

function generateYearsOld(string $birthDate)
{
    $actualYear = new DateTime('now');
    $birthDate = new DateTime($birthDate);

    $age = $actualYear->diff($birthDate)->y;
    return $age;
}
