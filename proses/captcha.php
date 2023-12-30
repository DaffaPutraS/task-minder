<?php
session_start();

// Fungsi untuk menghasilkan captcha secara acak
function acakCaptcha() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array();

    // Panjang karakter dalam $alphabet
    $panjangAlpha = strlen($alphabet) - 2; 

    // Mengambil 5 karakter acak dari $alphabet
    for ($i = 0; $i < 5; $i++) { 
        $n = rand(0, $panjangAlpha); 
        $pass[] =  $alphabet[$n];
    }

    // Menggabungkan karakter menjadi string
    return implode($pass);
}

// Memanggil fungsi acakCaptcha untuk mendapatkan kode captcha
$code = acakCaptcha(); 
$_SESSION["code"] = $code;

// Membuat gambar dengan ukuran 200x50 piksel
$wh = imagecreatetruecolor(200, 50);

// Warna latar belakang
$bgc = imagecolorallocate($wh, 245, 245, 245);

// Warna teks
$fc = imagecolorallocate($wh, 17, 158, 155);

// Mengisi latar belakang gambar dengan warna
imagefill($wh, 0, 0, $bgc);

// Tentukan ukuran font dan hitung lebar teks captcha
$font_size = 10;
$text_width = imagefontwidth($font_size) * strlen($code);

// Hitung koordinat x agar captcha berada di tengah
$x = (imagesx($wh) - $text_width) / 2;

// Koordinat y tetap sama
$y = 17;

// Menambahkan teks captcha ke gambar
imagestring($wh, $font_size, $x, $y, $code, $fc);

// Menentukan tipe konten sebagai gambar JPEG
header('content-type: image/jpg');

// Menyimpan gambar sebagai file JPEG
imagejpeg($wh);

// Menghancurkan gambar untuk menghemat memori
imagedestroy($wh);
?>
