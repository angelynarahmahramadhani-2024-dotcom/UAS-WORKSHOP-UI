<?php
// check_file.php - Debug utility to check layout file content on server
$file = __DIR__ . '/../resources/views/layouts/admin.blade.php';

if (file_exists($file)) {
    $content = file_get_contents($file);
    echo "<h3>Detail File: $file</h3>";
    echo "Ukuran file: " . filesize($file) . " bytes<br>";
    echo "Terakhir diubah: " . date("d M Y H:i:s", filemtime($file)) . "<br><br>";
    
    if (strpos($content, 'admin.artikel.index') !== false) {
        echo "<strong style='color:green;'>FAKTA: Link 'admin.artikel.index' ADA di dalam file layouts/admin.blade.php di server!</strong>";
    } else {
        echo "<strong style='color:red;'>FAKTA: Link 'admin.artikel.index' TIDAK ditemukan di file layouts/admin.blade.php di server.</strong>";
    }
} else {
    echo "<h3>File Tidak Ditemukan</h3>";
    echo "Lokasi pencarian: $file";
}
