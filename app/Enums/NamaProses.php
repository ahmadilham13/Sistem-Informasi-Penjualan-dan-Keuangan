<?php

namespace App\Enums;

/**
 * Default Ticket Types will be used in Project
 */
enum NamaProses: int
{
    case TRANSAKSI = 0;
    case BELI = 1;
    case SALDO = 2;

    public static function getDisplayName($type)
    {
        switch ($type) {
            case self::TRANSAKSI:
                return 'Transaksi Penjualan';
            case self::BELI:
                return 'Transaksi Pembelian';
            case self::SALDO:
                return 'Menambah Saldo';
            default:
                return 'Unknown Type';
        }
    }

    public static function getKeyValueArray(): array
    {
        $cases = NamaProses::cases();
        $result = [];

        foreach ($cases as $case) {
            $result[$case->value] = NamaProses::getDisplayName($case);
        }

        return $result;
    }
}
