<?php

namespace App\Helpers;

class Helper
{
    public function formatRupiah($value): String
    {
        return 'Rp ' . number_format($value, 0, ',', '.');
    }
}
