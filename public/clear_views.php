<?php
// clear_views.php - Clear compiled Blade templates on Shared Hosting
$dir = __DIR__ . '/../storage/framework/views';

if (is_dir($dir)) {
    $count = 0;
    foreach (glob("$dir/*") as $file) {
        if (is_file($file) && basename($file) !== '.gitignore') {
            unlink($file);
            $count++;
        }
    }
    echo "<h2>Sukses!</h2>";
    echo "<p>Berhasil menghapus $count file cache Blade views. Silakan refresh halaman Admin Anda.</p>";
} else {
    echo "<h2>Error</h2>";
    echo "<p>Direktori cache views tidak ditemukan di: $dir</p>";
}
