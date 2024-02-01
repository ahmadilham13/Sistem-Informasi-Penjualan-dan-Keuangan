<?php

namespace App\Enums;

/**
 * Default Ticket Types will be used in Project
 */
enum TypeProses: int
{
    case MASUK = 0;
    case KELUAR = 1;

    public static function getDisplayName($type)
    {
        switch ($type) {
            case self::MASUK:
                return 'Uang Masuk';
            case self::KELUAR:
                return 'Uang Keluar';
            default:
                return 'Unknown Type';
        }
    }

    public static function getKeyValueArray(): array
    {
        $cases = TypeProses::cases();
        $result = [];

        foreach ($cases as $case) {
            $result[$case->value] = TypeProses::getDisplayName($case);
        }

        return $result;
    }
}
