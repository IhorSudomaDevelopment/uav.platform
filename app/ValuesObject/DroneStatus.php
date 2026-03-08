<?php

namespace App\ValuesObject;

class DroneStatus
{
    public const WORK = 'БГ';
    public const NOT_WORK = 'Не БГ';
    public const LOST = 'Втрачено';

    public static function getList()
    {
        return [
            self::WORK => self::WORK,
            self::NOT_WORK => self::NOT_WORK,
            self::LOST => self::LOST,
        ];
    }
}
