<?php
// Script darurat untuk mengekstrak folder vendor di shared hosting tanpa SSH
$zip = new ZipArchive;
if ($zip->open('vendor.zip') === TRUE) {
    $zip->extractTo(__DIR__ . '/');
    $zip->close();
    echo 'Unzip vendor.zip sukses!';
} else {
    echo 'Gagal membuka/mengekstrak vendor.zip';
}
