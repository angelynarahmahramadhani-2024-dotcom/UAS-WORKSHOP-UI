<?php
set_time_limit(600);
$root = dirname(__DIR__);
$action = $_GET['action'] ?? '';

echo "<h3>Extractor ZIP Helper</h3>";
echo "<p>Root: $root</p>";

if ($action === 'merge-vendor') {
    echo "<p>Menggabungkan vendor parts...</p>";
    $out = fopen("$root/vendor.zip", 'wb');
    for ($i = 1; $i <= 10; $i++) {
        $part = "$root/vendor_part$i.zip.part";
        if (!file_exists($part)) break;
        $data = file_get_contents($part);
        fwrite($out, $data);
        echo "- Ditambahkan vendor_part$i.zip.part (" . round(strlen($data)/1024/1024, 1) . " MB)<br>";
        flush();
    }
    fclose($out);
    echo "<p style='color:green;'><b>vendor.zip berhasil digabungkan! (" . round(filesize("$root/vendor.zip")/1024/1024, 1) . " MB)</b></p>";
    echo "<p><a href='?action=extract-vendor'>Klik untuk EXTRACT vendor.zip</a></p>";
    exit;
}

if ($action === 'merge-wp') {
    echo "<p>Menggabungkan wordpress parts...</p>";
    $out = fopen("$root/wordpress-findship.zip", 'wb');
    for ($i = 1; $i <= 10; $i++) {
        $part = "$root/wp_part$i.zip.part";
        if (!file_exists($part)) break;
        $data = file_get_contents($part);
        fwrite($out, $data);
        echo "- Ditambahkan wp_part$i.zip.part (" . round(strlen($data)/1024/1024, 1) . " MB)<br>";
        flush();
    }
    fclose($out);
    echo "<p style='color:green;'><b>wordpress-findship.zip berhasil digabungkan! (" . round(filesize("$root/wordpress-findship.zip")/1024/1024, 1) . " MB)</b></p>";
    echo "<p><a href='?action=extract-wp'>Klik untuk EXTRACT wordpress-findship.zip</a></p>";
    exit;
}

if ($action === 'extract-vendor') {
    $zipPath = "$root/vendor.zip";
    if (!file_exists($zipPath)) die("vendor.zip tidak ditemukan!");
    echo "<p>Mengekstrak vendor.zip...</p>"; flush();
    $zip = new ZipArchive;
    if ($zip->open($zipPath) === TRUE) {
        $zip->extractTo($root . '/');
        $zip->close();
        echo "<h3 style='color:green;'>Sukses mengekstrak vendor.zip!</h3>";
    } else {
        echo "<h3 style='color:red;'>Gagal mengekstrak vendor.zip</h3>";
    }
    exit;
}

if ($action === 'extract-wp') {
    $zipPath = "$root/wordpress-findship.zip";
    if (!file_exists($zipPath)) die("wordpress-findship.zip tidak ditemukan!");
    echo "<p>Mengekstrak wordpress-findship.zip...</p>"; flush();
    $zip = new ZipArchive;
    if ($zip->open($zipPath) === TRUE) {
        $zip->extractTo($root . '/');
        $zip->close();
        echo "<h3 style='color:green;'>Sukses mengekstrak wordpress-findship.zip!</h3>";
    } else {
        echo "<h3 style='color:red;'>Gagal mengekstrak wordpress-findship.zip</h3>";
    }
    exit;
}

// Default: tampilkan status
echo "<h4>Status File Parts:</h4>";
echo "<b>Vendor parts:</b><br>";
for ($i = 1; $i <= 4; $i++) {
    $f = "$root/vendor_part$i.zip.part";
    $status = file_exists($f) ? "✅ ADA (".round(filesize($f)/1024/1024,1)." MB)" : "❌ BELUM";
    echo "- vendor_part$i.zip.part: $status<br>";
}
echo "<br><b>WordPress parts:</b><br>";
for ($i = 1; $i <= 4; $i++) {
    $f = "$root/wp_part$i.zip.part";
    $status = file_exists($f) ? "✅ ADA (".round(filesize($f)/1024/1024,1)." MB)" : "❌ BELUM";
    echo "- wp_part$i.zip.part: $status<br>";
}
echo "<br><h4>Aksi:</h4>";
echo "<a href='?action=merge-vendor'>1. Gabungkan & Extract VENDOR</a><br>";
echo "<a href='?action=merge-wp'>2. Gabungkan & Extract WORDPRESS</a><br>";
