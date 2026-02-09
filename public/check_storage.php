<?php
// HAPUS FILE INI SETELAH SELESAI!
echo '<h2>Storage Symlink Fix</h2>';

$link = __DIR__ . '/storage';
$target = __DIR__ . '/../storage/app/public';

// Step 1: Hapus folder storage yang salah (bukan symlink)
if (is_dir($link) && ! is_link($link)) {
    // Hapus folder kosong/copy secara rekursif
    function deleteDir($dir) {
        $items = array_diff(scandir($dir), ['.', '..']);
        foreach ($items as $item) {
            $path = $dir . '/' . $item;
            is_dir($path) ? deleteDir($path) : unlink($path);
        }
        return rmdir($dir);
    }

    if (deleteDir($link)) {
        echo '<p style="color:green;">&#10004; Folder public/storage (bukan symlink) berhasil dihapus.</p>';
    } else {
        echo '<p style="color:red;">&#10008; Gagal menghapus folder public/storage. Hapus manual via File Manager.</p>';
    }
} elseif (is_link($link)) {
    unlink($link);
    echo '<p style="color:green;">&#10004; Symlink lama dihapus.</p>';
} else {
    echo '<p>Tidak ada folder/symlink public/storage.</p>';
}

// Step 2: Buat symlink baru
if (! file_exists($link)) {
    if (@symlink($target, $link)) {
        echo '<p style="color:green;">&#10004; Symlink berhasil dibuat: public/storage -> storage/app/public</p>';
    } else {
        echo '<p style="color:red;">&#10008; Hosting tidak support symlink. Route fallback di web.php akan digunakan sebagai gantinya.</p>';
    }
}

// Step 3: Verifikasi
echo '<hr><h3>Verifikasi:</h3>';
echo '<p>public/storage exists: ' . (file_exists($link) ? 'YES' : 'NO') . '</p>';
echo '<p>Is symlink: ' . (is_link($link) ? 'YES' : 'NO') . '</p>';

$testFile = 'routes/ANglLxbkrCXC0OS12wbW1iLsdV2AWmF2NIgOaQAd.png';
$testPath = $link . '/' . $testFile;
echo '<p>Test file accessible via symlink: ' . (file_exists($testPath) ? '<span style="color:green;">YES &#10004;</span>' : 'NO') . '</p>';

$testDirect = $target . '/' . $testFile;
echo '<p>Test file exists in storage: ' . (file_exists($testDirect) ? '<span style="color:green;">YES &#10004;</span>' : 'NO') . '</p>';

echo '<br><p><strong>Sekarang test gambar:</strong> <a href="/storage/' . $testFile . '" target="_blank">Klik di sini</a></p>';
echo '<p style="color:orange;"><strong>HAPUS FILE INI SETELAH SELESAI!</strong></p>';
