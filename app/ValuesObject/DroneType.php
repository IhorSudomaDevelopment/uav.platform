<?php

namespace App\ValuesObject;

class DroneType
{
    public const HEAVY_SHOT = 'Heavy Shot';
    public const BAT = 'Кажан';
    public const VAMPIRE = 'Вампір';

    public static function getList()
    {
        return [
            self::HEAVY_SHOT => self::HEAVY_SHOT,
            self::BAT => self::BAT,
            self::VAMPIRE => self::VAMPIRE,
        ];
    }
}
