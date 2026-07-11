<?php
// diagnose.php - Check file locations on server
echo "<h3>Diagnostik File Server</h3>";

// Check Artikel.php location
$correctPath = __DIR__ . '/../app/Models/Artikel.php';
$wrongPath = __DIR__ . '/../app/app/Models/Artikel.php';

echo "<h4>1. Cek Artikel.php</h4>";
echo "Path yang benar: $correctPath<br>";
echo "File ada? " . (file_exists($correctPath) ? "<strong style='color:green'>YA</strong>" : "<strong style='color:red'>TIDAK</strong>") . "<br><br>";

echo "Path salah (nested app/app): $wrongPath<br>";
echo "File ada? " . (file_exists($wrongPath) ? "<strong style='color:orange'>YA (file di lokasi salah!)</strong>" : "TIDAK") . "<br><br>";

// Check AdminArtikelController
$controllerPath = __DIR__ . '/../app/Http/Controllers/AdminArtikelController.php';
echo "<h4>2. Cek AdminArtikelController.php</h4>";
echo "Path: $controllerPath<br>";
echo "File ada? " . (file_exists($controllerPath) ? "<strong style='color:green'>YA</strong>" : "<strong style='color:red'>TIDAK</strong>") . "<br><br>";

// List contents of app/Models
echo "<h4>3. Isi folder app/Models/</h4>";
$modelsDir = __DIR__ . '/../app/Models';
if (is_dir($modelsDir)) {
    foreach (scandir($modelsDir) as $f) {
        if ($f !== '.' && $f !== '..') echo "- $f<br>";
    }
} else {
    echo "<strong style='color:red'>Folder app/Models/ TIDAK DITEMUKAN!</strong>";
}

// Check if there's a nested app/app directory
echo "<br><h4>4. Cek folder app/app/ (seharusnya TIDAK ada)</h4>";
$nestedApp = __DIR__ . '/../app/app';
echo "Folder app/app/ ada? " . (is_dir($nestedApp) ? "<strong style='color:orange'>YA (ini salah!)</strong>" : "<strong style='color:green'>TIDAK (bagus!)</strong>");
