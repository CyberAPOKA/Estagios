<?php

namespace App\Core\Constants;

use App\Core\Utils\Enum;

class SelectedStatus extends Enum
{
    const YES = 'yes';
    const NO = 'no';
    const WAITING = 'waiting';

    static $labels = [
        self::YES => 'Sim',
        self::NO => 'Não',
        self::WAITING => 'Aguardando resposta'
    ];
}
