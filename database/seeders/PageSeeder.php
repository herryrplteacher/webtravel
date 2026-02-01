<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
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

        $pages = [
            [
                'title' => 'Tentang Kami',
                'slug' => 'tentang-kami',
                'content' => '<h2>Tentang Web Travel</h2><p>Web Travel adalah perusahaan penyedia layanan travel terpercaya yang telah melayani ribuan pelanggan di seluruh Indonesia. Kami berkomitmen untuk memberikan pengalaman perjalanan yang nyaman, aman, dan terjangkau.</p><p>Dengan armada bus yang modern dan terawat, serta driver yang berpengalaman, kami siap mengantarkan Anda ke berbagai destinasi dengan aman dan tepat waktu.</p>',
                'is_published' => true,
                'created_by' => $user->id,
            ],
            [
                'title' => 'Syarat dan Ketentuan',
                'slug' => 'syarat-dan-ketentuan',
                'content' => '<h2>Syarat dan Ketentuan</h2><p>Dengan menggunakan layanan Web Travel, Anda menyetujui syarat dan ketentuan berikut:</p><ol><li>Penumpang wajib hadir minimal 15 menit sebelum keberangkatan.</li><li>Tiket yang sudah dibeli tidak dapat dikembalikan.</li><li>Penumpang wajib menjaga kebersihan dan kenyamanan bersama.</li><li>Dilarang membawa barang berbahaya atau terlarang.</li><li>Penumpang wajib mengikuti instruksi dari driver dan crew.</li></ol>',
                'is_published' => true,
                'created_by' => $user->id,
            ],
            [
                'title' => 'Kebijakan Privasi',
                'slug' => 'kebijakan-privasi',
                'content' => '<h2>Kebijakan Privasi</h2><p>Web Travel menghargai privasi Anda. Data pribadi yang Anda berikan akan kami jaga kerahasiaannya dan hanya digunakan untuk keperluan layanan kami.</p><p>Kami tidak akan membagikan data Anda kepada pihak ketiga tanpa izin Anda, kecuali diwajibkan oleh hukum.</p>',
                'is_published' => true,
                'created_by' => $user->id,
            ],
            [
                'title' => 'Cara Pemesanan',
                'slug' => 'cara-pemesanan',
                'content' => '<h2>Cara Pemesanan Tiket</h2><ol><li>Kunjungi website atau hubungi customer service kami.</li><li>Pilih rute dan jadwal yang Anda inginkan.</li><li>Isi data penumpang dengan lengkap dan benar.</li><li>Lakukan pembayaran sesuai dengan metode yang tersedia.</li><li>Simpan bukti pembayaran dan tunjukkan saat boarding.</li></ol><p>Untuk informasi lebih lanjut, hubungi customer service kami di nomor yang tertera di website.</p>',
                'is_published' => true,
                'created_by' => $user->id,
            ],
            [
                'title' => 'Hubungi Kami',
                'slug' => 'hubungi-kami',
                'content' => '<h2>Hubungi Kami</h2><p>Kami siap membantu Anda. Hubungi kami melalui:</p><ul><li><strong>Telepon:</strong> +62 812-3456-7890</li><li><strong>Email:</strong> info@webtravel.com</li><li><strong>WhatsApp:</strong> +62 812-3456-7890</li><li><strong>Alamat:</strong> Jl. Contoh No. 123, Jakarta, Indonesia</li></ul><p>Jam operasional: Senin - Minggu, 08:00 - 20:00 WIB</p>',
                'is_published' => true,
                'created_by' => $user->id,
            ],
        ];

        foreach ($pages as $page) {
            Page::create($page);
        }
    }
}
