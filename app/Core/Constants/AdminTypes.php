<?php

namespace App\Core\Constants;

use App\Core\Utils\Enum;

class AdminTypes extends Enum
{
    const ADMIN = 'admin';
    const RH = 'rh';
    const RECRUITER = 'recruiter';
    const SECRETARY = 'secretary';
    const ADMINISTRATIVE = 'administrative';

    static $labels = [
        self::ADMIN => 'Administrator',
        self::RH => 'RH',
        self::RECRUITER => 'Recrutador',
        self::SECRETARY => 'Secretário',
        self::ADMINISTRATIVE => 'administrativo'
    ];
}
