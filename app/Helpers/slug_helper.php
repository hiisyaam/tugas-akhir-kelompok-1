<?php
if (!function_exists('slugify')) {
    function slugify(string $string): string
    {
        // Ubah menjadi huruf kecil
        $string = strtolower($string);

        // Ganti karakter non-alfanumerik atau spasi dengan tanda "-"
        $string = preg_replace('/[^a-z0-9]+/', '-', $string);

        // Hapus tanda "-" di awal dan akhir (jika ada)
        $string = trim($string, '-');

        return $string;
    }
}
?>