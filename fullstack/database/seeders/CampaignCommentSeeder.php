<?php

namespace Database\Seeders;

use App\Models\CampaignComment;
use Illuminate\Database\Seeder;

class CampaignCommentSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['program_slug' => 'berbagi-al-quran', 'name' => 'Ahmad Fauzi', 'content' => 'Alhamdulillah, sudah 2 kali ikut berdonasi di program ini. Laporan penyalurannya rapi dan transparan. Semoga jadi amal jariyah!'],
            ['program_slug' => 'berbagi-al-quran', 'name' => 'Siti Rahma', 'content' => 'MasyaAllah program yang sangat bermanfaat. Semoga mushaf Al-Qur\'annya sampai ke pelosok desa.', 'email' => 'siti@example.com'],
            ['program_slug' => 'berbagi-sembako', 'name' => 'Budi Santoso', 'content' => 'Semangat tim relawan! Semoga rezeki yang mau membantu semakin banyak.'],
            ['program_slug' => 'berdaya', 'name' => 'Nurul Hidayah', 'content' => 'Program BERDAYA membantu banget untuk bapak ibu di sekitar rumah. Terima kasih Sarana Berbagi.'],
            ['program_slug' => 'sarana-peduli-bencana', 'name' => 'Dedi Kurniawan', 'content' => 'Respons cepat pas banjir kemarin. Pertahankan!'],
        ];

        foreach ($items as $item) {
            CampaignComment::create($item + ['is_approved' => true]);
        }
    }
}
