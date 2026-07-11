<?php
// unzip_update.php - Script helper untuk extract update ZIP (dijalankan dari folder public)
$zip = new ZipArchive;
$zipPath = __DIR__ . '/../findship_update_v4.zip';
$extractPath = __DIR__ . '/../';

if ($zip->open($zipPath) === TRUE) {
    $zip->extractTo($extractPath);
    $zip->close();
    echo '<h2>Unzip findship_update_v4.zip SUKSES!</h2>';
    echo '<p>Semua file pembaruan telah berhasil diekstrak ke folder root.</p>';
} else {
    echo '<h2>Gagal mengekstrak findship_update_v4.zip</h2>';
    echo '<p>Pastikan file findship_update_v4.zip sudah diunggah di folder root (htdocs).</p>';
}
