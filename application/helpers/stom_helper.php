<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('stringToNumber')) {
    function stringToNumber($value) {
        if (is_numeric($value)) {
            return floatval($value); // Mengonversi ke tipe data float
        } elseif (is_string($value)) {
            // Menghapus karakter selain digit dan koma
            $numericString = preg_replace("/[^0-9,.]/", "", $value);

            // Mengganti koma dengan titik jika ada
            $numericString = str_replace(',', '.', $numericString);

            // Mengonversi ke tipe data float
            return floatval($numericString);
        } else {
            return 0; // Nilai default jika tidak dapat dikonversi
        }
    }
}

if (!function_exists('numberToRupiah')) {
    function numberToRupiah($numericValue) {
        // Menggunakan number_format untuk mengubah angka menjadi format uang Rupiah
        $formattedRupiah = number_format($numericValue, 0, ',', '.');

        return $formattedRupiah;
    }
}

if (!function_exists('numberToRupiah2')) {
    function numberToRupiah2($numericValue) {
        // Menggunakan number_format untuk mengubah angka menjadi format uang Rupiah
        $formattedRupiah = number_format($numericValue, 2, ',', '.');

        return $formattedRupiah;
    }
}

