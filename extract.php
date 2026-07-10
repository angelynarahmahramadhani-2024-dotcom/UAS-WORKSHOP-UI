<?php
// extract.php - Script helper untuk extract ZIP di Shared Hosting/InfinityFree tanpa SSH
// Cara pakai: akses http://domain-anda.com/extract.php?file=namafile.zip

$file = $_GET['file'] ?? '';

if (!$file) {
    echo "<h3>Extractor ZIP Helper</h3>";
    echo "Silakan pilih file yang ingin diekstrak dengan menambahkan parameter '?file=nama_file.zip' pada URL.<br><br>";
    echo "<strong>File ZIP yang tersedia di server:</strong><br>";
    foreach (glob("*.zip") as $zipFile) {
        echo "- <a href='?file=$zipFile'>$zipFile</a> (" . round(filesize($zipFile) / 1024 / 1024, 2) . " MB)<br>";
    }
    exit;
}

if (!file_exists($file)) {
    die("File $file tidak ditemukan di server.");
}

$zip = new ZipArchive;
if ($zip->open($file) === TRUE) {
    // Ekstrak ke folder saat ini
    $zip->extractTo(__DIR__ . '/');
    $zip->close();
    echo "<h3 style='color:green;'>Sukses mengekstrak $file!</h3>";
} else {
    echo "<h3 style='color:red;'>Gagal mengekstrak $file</h3>";
}
