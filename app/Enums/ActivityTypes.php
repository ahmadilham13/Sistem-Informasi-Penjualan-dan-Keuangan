<?php

namespace App\Enums;

/**
 * @method static static COMMENT()
 * @method static static UPLOAD()
 */
enum ActivityTypes: int
{
    case PETUGAS = 0;
    case DELETE_PETUGAS = 1;
    case MODAL = 2;
    case DELETE_MODAL = 3;
    case PRODUCT = 4;
    case DELETE_PRODUCT = 5;
    case TRANSAKSI = 6;
    case LAPORAN = 7;
}
