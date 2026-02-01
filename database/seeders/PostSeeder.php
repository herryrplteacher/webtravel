<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the first user as creator
        $user = User::first();

        if (! $user) {
            $this->command->warn('No users found. Please seed users first.');

            return;
        }

        $posts = [
            [
                'title' => 'Tips Memilih Travel yang Aman dan Terpercaya',
                'slug' => 'tips-memilih-travel-yang-aman-dan-terpercaya',
                'excerpt' => 'Panduan lengkap memilih jasa travel yang aman, terpercaya, dan nyaman untuk perjalanan Anda.',
                'content' => '<h2>Memilih Travel yang Tepat</h2><p>Dalam memilih jasa travel, ada beberapa hal penting yang perlu diperhatikan untuk memastikan perjalanan Anda aman dan nyaman:</p><ol><li><strong>Legalitas Perusahaan</strong> - Pastikan travel memiliki izin operasional yang resmi</li><li><strong>Reputasi</strong> - Cek review dan testimoni dari penumpang sebelumnya</li><li><strong>Armada</strong> - Pilih travel dengan armada yang terawat dan modern</li><li><strong>Harga</strong> - Bandingkan harga dengan layanan yang ditawarkan</li><li><strong>Customer Service</strong> - Pastikan mudah dihubungi dan responsif</li></ol><p>Web Travel berkomitmen untuk memberikan layanan terbaik dengan memenuhi semua kriteria di atas.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(10),
                'created_by' => $user->id,
            ],
            [
                'title' => 'Rute Terpopuler di Web Travel',
                'slug' => 'rute-terpopuler-di-web-travel',
                'excerpt' => 'Berikut adalah rute-rute travel terpopuler yang tersedia di Web Travel dengan jadwal lengkap.',
                'content' => '<h2>Rute Travel Favorit</h2><p>Web Travel melayani berbagai rute populer di Indonesia dengan jadwal yang fleksibel:</p><h3>Jakarta - Bandung</h3><p>Rute paling favorit dengan jadwal keberangkatan setiap 2 jam. Perjalanan ditempuh dalam waktu 3-4 jam dengan armada yang nyaman.</p><h3>Jakarta - Surabaya</h3><p>Tersedia jadwal pagi dan malam dengan fasilitas lengkap untuk perjalanan jarak jauh.</p><h3>Bandung - Yogyakarta</h3><p>Rute wisata dengan pemandangan indah sepanjang perjalanan.</p><p>Pesan tiket Anda sekarang dan nikmati perjalanan yang menyenangkan!</p>',
                'is_published' => true,
                'published_at' => now()->subDays(7),
                'created_by' => $user->id,
            ],
            [
                'title' => 'Promo Spesial Akhir Tahun',
                'slug' => 'promo-spesial-akhir-tahun',
                'excerpt' => 'Dapatkan diskon hingga 30% untuk pemesanan tiket travel di bulan Desember!',
                'content' => '<h2>Promo Akhir Tahun 2026</h2><p>Rayakan akhir tahun dengan promo spesial dari Web Travel!</p><h3>Ketentuan Promo:</h3><ul><li>Diskon 30% untuk pembelian tiket PP</li><li>Diskon 20% untuk pembelian tiket sekali jalan</li><li>Gratis 1 botol air mineral setiap penumpang</li><li>Berlaku untuk semua rute</li></ul><h3>Periode Promo:</h3><p>1 Desember 2026 - 31 Desember 2026</p><p>Buruan pesan sekarang sebelum kehabisan! Hubungi customer service kami untuk informasi lebih lanjut.</p>',
                'is_published' => true,
                'published_at' => now()->subDays(3),
                'created_by' => $user->id,
            ],
            [
                'title' => 'Fasilitas Baru di Armada Web Travel',
                'slug' => 'fasilitas-baru-di-armada-web-travel',
                'excerpt' => 'Nikmati fasilitas baru yang kami hadirkan untuk kenyamanan perjalanan Anda.',
                'content' => '<h2>Upgrade Fasilitas Armada</h2><p>Web Travel terus berinovasi untuk memberikan kenyamanan maksimal kepada pelanggan. Berikut adalah fasilitas terbaru yang kami hadirkan:</p><h3>1. WiFi Gratis</h3><p>Tetap terhubung dengan internet selama perjalanan dengan WiFi gratis yang tersedia di semua armada.</p><h3>2. USB Charging Port</h3><p>Setiap kursi dilengkapi dengan USB port untuk charging gadget Anda.</p><h3>3. Reclining Seat</h3><p>Kursi dapat direbahkan hingga 140 derajat untuk kenyamanan maksimal.</p><h3>4. Entertainment System</h3><p>Nikmati film dan musik pilihan selama perjalanan.</p><p>Semua fasilitas ini tersedia di armada kelas executive kami.</p>',
                'is_published' => true,
                'published_at' => now()->subDay(),
                'created_by' => $user->id,
            ],
            [
                'title' => 'Panduan Perjalanan Aman di Masa Pandemi',
                'slug' => 'panduan-perjalanan-aman-di-masa-pandemi',
                'excerpt' => 'Protokol kesehatan yang kami terapkan untuk menjaga keamanan dan kenyamanan perjalanan Anda.',
                'content' => '<h2>Komitmen Kami untuk Keselamatan</h2><p>Web Travel menerapkan protokol kesehatan ketat untuk memastikan perjalanan Anda tetap aman:</p><h3>Sebelum Keberangkatan:</h3><ul><li>Sterilisasi armada setiap sebelum dan sesudah perjalanan</li><li>Pemeriksaan suhu tubuh penumpang dan crew</li><li>Wajib menggunakan masker</li></ul><h3>Selama Perjalanan:</h3><ul><li>Sirkulasi udara dengan filter HEPA</li><li>Pembatasan kapasitas penumpang</li><li>Hand sanitizer tersedia di setiap armada</li></ul><h3>Kebijakan Tiket:</h3><ul><li>Reschedule gratis jika tidak fit untuk travel</li><li>Refund untuk penumpang dengan gejala COVID-19</li></ul><p>Kesehatan dan keselamatan Anda adalah prioritas utama kami.</p>',
                'is_published' => false,
                'published_at' => null,
                'created_by' => $user->id,
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
