<?php

namespace App\Core\Constants;

use App\Core\Utils\Enum;

class RequestStatus extends Enum
{
    const REGISTERED = 'registered';
    const COMPLETED = 'completed';
    const CANCELED = 'canceled';
    const AuthorizedByAdministrative = 'authorizedbyadministrative';
    const AuthorizedBySecretary = 'authorizedbysecretary';
    const ResumesSentByHR = 'resumessentbyhr';
    const RequestForMoreResumes = 'requestformoreresumes';
    const FINISHED = 'finished';

    static $labels = [
        self::REGISTERED => 'Cadastrada',
        self::COMPLETED => 'Concluída',
        self::CANCELED => 'Cancelada',
        self::AuthorizedByAdministrative => 'Autorizada por administrativo',
        self::AuthorizedBySecretary => 'Autorizada por secretário',
        self::ResumesSentByHR => 'Currículos enviados pelo RH',
        self::RequestForMoreResumes => 'Solicitação de mais currículos',
        self::FINISHED => 'Finalizada',
    ];
}
