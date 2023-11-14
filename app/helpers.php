<?php

function calculateCategory($number)
{
    $result = 0;
    if ($number >= 8) {
        $result = "Baik";
    } elseif ($number >= 7) {
        $result = "Rata-rata Atas";
    } elseif ($number >= 5) {
        $result = "Rata-rata";
    } elseif ($number >= 4) {
        $result = "Rata-rata Bawah";
    } else {
        $result = "Kurang";
    }
    return $result;
}
