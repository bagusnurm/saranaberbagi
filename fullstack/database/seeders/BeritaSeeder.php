<?php

namespace Database\Seeders;

use App\Models\ContentCategory;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $author = User::first();

        // Kategori konten
        $catEdukasi = ContentCategory::firstOrCreate(['slug' => 'edukasi'], ['name' => 'Edukasi']);
        $catKesehatan = ContentCategory::firstOrCreate(['slug' => 'kesehatan'], ['name' => 'Kesehatan']);
        $catBencana = ContentCategory::firstOrCreate(['slug' => 'tanggap-bencana'], ['name' => 'Tanggap Bencana']);
        $catKisah = ContentCategory::firstOrCreate(['slug' => 'kisah-sukses'], ['name' => 'Kisah Sukses']);
        $catFilantropi = ContentCategory::firstOrCreate(['slug' => 'edukasi-filantropi'], ['name' => 'Edukasi Philanthropy']);

        // Tags
        $tagTips = Tag::firstOrCreate(['slug' => 'tips-donasi'], ['name' => 'Tips Donasi']);
        $tagRelawan = Tag::firstOrCreate(['slug' => 'cerita-relawan'], ['name' => 'Cerita Relawan']);
        $tagFilantropi = Tag::firstOrCreate(['slug' => 'edukasi-philanthropy'], ['name' => 'Edukasi Philanthropy']);
        $tagKomunitas = Tag::firstOrCreate(['slug' => 'berita-komunitas'], ['name' => 'Berita Komunitas']);
        $tagPangan = Tag::firstOrCreate(['slug' => 'ketahanan-pangan'], ['name' => 'Ketahanan Pangan']);

        // ===== KABAR TERBARI (type: news) =====
        $newsItems = [
            [
                'category' => $catEdukasi,
                'tags' => [$tagKomunitas],
                'title' => 'Perpustakaan Keliling Tiba di Desa Harapan',
                'date' => now()->subDays(3),
                'thumbnail' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCtWbu662_2iNprm3alF0kRYaVnj_AcLjFaNMAdEanEt2kEPtK10neEJan1lIlnwR0Eypa7X933lr30xQDo2kPIpvy5vbHdxhWVz_WUmZ5V0ZOhrhhW6CsZDNtTT2ytO-ejtCGhSfOm_pDszAGOBLyGxmF0uUg_vsbRpn1pRFdEPbUVSh3_s2HCVasEhtvOHnfA53Oaqh9HYqw5Jm-_DVNyYrKEdax3YR76z9irRp8-OLMANMDmpf_Hjg',
                'content' => <<<'HTML'
<p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Program perpustakaan keliling Sarana Berbagi kembali menyapa anak-anak di pelosok desa. Kali ini, Desa Harapan menjadi tujuan utama dalam misi menyebarkan literasi dan pengetahuan.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">Misi Berbagi Pengetahuan</h2>
<p class="mb-6">Lebih dari 500 buku baru berhasil didistribusikan dalam program ini. Tidak hanya meminjamkan buku, relawan kami juga mengadakan sesi mendongeng dan aktivitas kreatif untuk membangun minat baca anak-anak.</p>
<p class="mb-8">Antusiasme terlihat dari wajah-wajah ceria mereka. Banyak yang bahkan meminta agar program ini dapat datang kembali bulan depan.</p>
<blockquote class="border-l-4 border-primary-container pl-6 py-2 my-10 bg-surface-container-low/50 rounded-r-lg"><p class="font-h3 text-h3 text-primary-container italic mb-2">"Buku adalah jendela dunia. Melalui program ini, kami berharap dapat membuka wawasan lebih luas bagi anak-anak desa."</p></blockquote>
<h2 class="font-h2 text-h2 mt-12 mb-6">Dampak yang Dirasakan</h2>
<p class="mb-6">Sejak diluncurkan tiga tahun lalu, program perpustakaan keliling telah mengunjungi lebih dari 50 desa dan menjangkau lebih dari 10.000 anak di seluruh Indonesia.</p>
<p class="">Dukungan donatur menjadi kunci keberlangsungan program ini. Setiap kontribusi yang Anda berikan membantu kami membawa lebih banyak buku dan pengetahuan ke daerah-daerah yang membutuhkan.</p>
HTML,
            ],
            [
                'category' => $catKesehatan,
                'tags' => [$tagKomunitas],
                'title' => 'Klinik Berjalan Melayani 500 Warga Lansia',
                'date' => now()->subDays(7),
                'thumbnail' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuB8JJYQSs4hSDhny6bWDq6C8tL3CNgX5Vuo1ax6SXD7haKd-UsCujEce-pTHKwoo6VkHNvJXtOqp2kzfKzKKC0AwuCXUPyvkA4DcGVjpaS0_bnQPztiHVcvJR41noQ0TBjThu9b9ooLtoZnPcACgbqsz99OPlt4V81lqJa-G2jxfISH0EZeipYnJkwiAg7OOAKDN8eK-KzpCv4RI_RHxQS9RyOUXjrLgmWWTTK4P7rlX-g1YcQgz8s3qA',
                'content' => <<<'HTML'
<p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Program klinik berjalan Sarana Berbagi kembali menunjukkan komitmen kami dalam meningkatkan akses kesehatan bagi masyarakat di daerah terpencil, khususnya untuk kelompok lansia.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">Pelayanan yang Komprehensif</h2>
<p class="mb-6">Tim medis kami terdiri dari 5 dokter umum, 10 perawat, dan 2 apoteker yang siap memberikan pelayanan kesehatan lengkap mulai dari pemeriksaan umum, pengukuran tekanan darah, hingga penyediaan obat-obatan esensial.</p>
<p class="mb-8">Lebih dari 500 warga lansia telah mendapatkan manfaat dari program bulan ini. Sebagian besar mengalami masalah kesehatan yang umum dialami lansia seperti hipertensi dan diabetes.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">Keberlanjutan Program</h2>
<p class="">Program klinik berjalan akan terus digelar setiap bulan di berbagai desa. Kami berkomitmen untuk menjangkau lebih banyak lansia yang membutuhkan akses kesehatan yang layak.</p>
HTML,
            ],
            [
                'category' => $catBencana,
                'tags' => [$tagKomunitas],
                'title' => 'Distribusi Air Bersih Pasca Gempa',
                'date' => now()->subDays(14),
                'thumbnail' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAuNn8SWz1-gb07ckiocA_tz4YyBPpeSOB0GqDB6zpekTROOVs2bQyPVfSG3Q83l7bR_9EaI520iHc20SCs_7r-PozeQuw2SuRHS5KKUrAxW8Lr3jfKeog6_ABuSg-CsQG51Px9e-izEL6jfRGys928Hi7Vtp5xxsjim09TgWk-rLUNNRyLbntLf1UR65QpcMtYUxXKxF4ul1kiVpNLNkaPhW5LVjTBo-Ww7TNYDU_2CBZuOQKdMJifvA',
                'content' => <<<'HTML'
<p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Bencana gempa bumi yang baru saja terjadi telah meninggalkan dampak signifikan bagi masyarakat. Akses air bersih menjadi salah satu kebutuhan paling mendesak yang harus segera dipenuhi.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">Respons Cepat Tim Darurat</h2>
<p class="mb-6">Dalam waktu kurang dari 24 jam, tim tanggap darurat Sarana Berbagi telah berada di lokasi dan mulai mendistribusikan air bersih ke titik-titik pengungsian. Lima titik distribusi didirikan untuk memastikan cakupan yang merata.</p>
<p class="mb-8">Setiap titik distribusi mampu melayani hingga 200 kepala keluarga per hari dengan kebutuhan air bersih yang layak konsumsi.</p>
<blockquote class="border-l-4 border-primary-container pl-6 py-2 my-10 bg-surface-container-low/50 rounded-r-lg"><p class="font-h3 text-h3 text-primary-container italic mb-2">"Air bersih adalah hak setiap manusia. Dalam situasi darurat seperti ini, kami hadir untuk memastikan kebutuhan dasar ini terpenuhi."</p></blockquote>
<h2 class="font-h2 text-h2 mt-12 mb-6">Fokus pada Kelompok Rentan</h2>
<p class="">Anak-anak dan lansia menjadi prioritas utama dalam distribusi ini. Tim kami juga menyediakan edukasi tentang pengolahan air darurat untuk mencegah penyakit pasca bencana.</p>
HTML,
            ],
        ];

        foreach ($newsItems as $item) {
            $post = Post::firstOrCreate(
                ['slug' => Str::slug($item['title'])],
                [
                    'type' => 'news',
                    'category_id' => $item['category']->id,
                    'author_id' => $author->id,
                    'title' => $item['title'],
                    'content' => $item['content'],
                    'thumbnail' => $item['thumbnail'],
                    'published_at' => $item['date'],
                    'status' => 'published',
                ]
            );
            $post->tags()->syncWithoutDetaching(collect($item['tags'])->pluck('id')->all());
        }

        // ===== BLOG & EDUKASI (type: blog) =====
        $blogItems = [
            [
                'category' => $catFilantropi,
                'tags' => [$tagFilantropi, $tagTips],
                'title' => 'Panduan Lengkap: Memulai Perjalanan Filantropi Anda',
                'date' => now()->subDays(5),
                'thumbnail' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuB2coEcT_MfIVs340P6HmV9D0GDp2fIcGQkCEe1mzq3WgVH4mfbNgIj-mGEiaIrzv8snzfdfpzy12x3gVJJYrROnT2qlw3QbtXwwsYb5mGVfqFxvA2HRcqgsMqV9jk0ppyS5A8-ra596aR8Fd3NVnNI4kzupD_jk4alRTM2BYwwZdWX0479uhUNFuwUfbmYOIm1t50-lPly0HB7NURl78Jl9cV8GfCpaYe3P1-VbviS1CgzzyP2dLvLPw',
                'content' => <<<'HTML'
<p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Filantropi bukan hanya soal jumlah dana yang Anda berikan, tetapi tentang niat dan konsistensi dalam berbagi. Panduan ini akan membantu Anda memulai perjalanan berbagi yang berdampak.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">Kenali Nilai Pribadi Anda</h2>
<p class="mb-6">Langkah pertama adalah mengenali isu sosial yang paling dekat dengan hati Anda. Apakah pendidikan anak, kesehatan lansia, atau tanggap bencana? Filantropi yang berkelanjutan lahir dari kepedulian yang tulus.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">Pilih Lembaga Terpercaya</h2>
<p class="mb-6">Pastikan lembaga yang Anda pilih memiliki legalitas resmi, laporan keuangan yang transparan, dan program yang jelas. Sarana Berbagi, sebagai yayasan berbadan hukum sejak 2016, berkomitmen pada transparansi penuh setiap penyaluran donasi.</p>
<blockquote class="border-l-4 border-primary-container pl-6 py-2 my-10 bg-surface-container-low/50 rounded-r-lg"><p class="font-h3 text-h3 text-primary-container italic mb-2">"Sedekah yang terbaik adalah yang diberikan secara konsisten, sekecil apapun jumlahnya."</p></blockquote>
<h2 class="font-h2 text-h2 mt-12 mb-6">Mulai dari Langkah Kecil</h2>
<p class="">Anda tidak harus menunggu kaya untuk berbagi. Mulailah dengan nominal yang ringan namun rutin, dan rasakan bagaimana kebiasaan baik ini tumbuh bersama waktu.</p>
HTML,
            ],
            [
                'category' => $catFilantropi,
                'tags' => [$tagTips],
                'title' => '5 Cara Memastikan Donasi Anda Tepat Sasaran',
                'date' => now()->subDays(10),
                'thumbnail' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDM-fkdbVDdQkw01VRzVV5tJYYHewojH-VKOpuS0HAp1lsFhZS0jEbhmdJw3xXCipHrwecPu9yHQ7-X4RAZEqnEJuNNXNv7STazTYTFfP85TejdYV4AzJApOaQRuDEfsFT8_Dr9N7n5uAyuUu7Yso_SW8gM5t_WaFaE2eb3bmQVl1AuCZzJ2c_FJgtSTK5mk7tkZb2TRdz0jEXJXNeNdDjfnNjvNnhwPaEWcuLRbwc0mdASckis8t8UvQ',
                'content' => <<<'HTML'
<p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Memilih lembaga filantropi yang terpercaya adalah langkah pertama. Pelajari bagaimana Anda bisa mengevaluasi transparansi dan dampak program sebelum menyalurkan donasi.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">1. Cek Legalitas Lembaga</h2>
<p class="mb-6">Lembaga yang kredibel memiliki akta pendirian, SK Kemenkumham, dan izin operasional yang jelas. Informasi ini biasanya dipublikasikan di website resmi mereka.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">2. Periksa Laporan Keuangan</h2>
<p class="mb-6">Transparansi keuangan adalah cermin profesionalisme. Lembaga baik akan mempublikasikan laporan penerimaan dan penyaluran dana secara berkala.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">3. Lihat Dokumentasi Program</h2>
<p class="mb-6">Foto dan video kegiatan adalah bukti nyata bahwa program benar-benar berjalan. Perhatikan apakah dokumentasi terbaru dan konsisten.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">4. Baca Testimoni Penerima Manfaat</h2>
<p class="mb-6">Suara dari penerima manfaat langsung adalah indikator paling jujur tentang dampak nyata sebuah program.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">5. Pantau Dampak Donasi Anda</h2>
<p class="">Lembaga yang baik akan melaporkan perkembangan program kepada donatur, bukan sekadar meminta lalu menghilang.</p>
HTML,
            ],
            [
                'category' => $catKisah,
                'tags' => [$tagPangan, $tagKomunitas],
                'title' => 'Pentingnya Ketahanan Pangan di Era Modern',
                'date' => now()->subDays(18),
                'thumbnail' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCZtcvsMdParxnBBe8ueBH3wdpLKeutYgCCvoRHHUahV9vuIW0_334WV1jNY_qYu6hKa-OrVZOd7m3Ia-JDrYqJJJtZJbELpXX3IcRi44j0ARIiFAUhnOVeGEXThOxiRdwsHrA_oMDa4t38Hx0zyZGJd-1dVAlFVRI8veYOvav3VA3H95ytw9U8WkyspeMFj37lDKgdyzqB9bJ-F50HyVgInlXEZuzP26cwOv6rd865VMLIBKZyqjbR9w',
                'content' => <<<'HTML'
<p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Bagaimana program kebun gizi komunitas membantu keluarga memenuhi kebutuhan nutrisi dasar di tengah tantangan ekonomi.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">Tantangan Ketahanan Pangan</h2>
<p class="mb-6">Kenaikan harga pangan dan fluktuasi iklim membuat banyak keluarga prasejahtera kesulitan memenuhi gizi harian. Ketahanan pangan keluarga menjadi isu yang semakin mendesak.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">Solusi: Kebun Gizi Komunitas</h2>
<p class="mb-6">Program kebun gizi mengajak warga menanam sayuran bergizi di lahan pekarangan. Selain memenuhi kebutuhan sendiri, hasil panen berlebih dapat dijual sebagai tambahan pendapatan.</p>
<blockquote class="border-l-4 border-primary-container pl-6 py-2 my-10 bg-surface-container-low/50 rounded-r-lg"><p class="font-h3 text-h3 text-primary-container italic mb-2">"Dari pekarangan sendiri, warga tidak hanya mendapat pangan sehat tetapi juga penghasilan tambahan."</p></blockquote>
<h2 class="font-h2 text-h2 mt-12 mb-6">Dampak yang Terukur</h2>
<p class="">Dalam setahun terakhir, 12 kebun gizi komunitas telah dibentuk dan melayani lebih dari 300 keluarga. Program ini membuktikan bahwa kemandirian pangan bisa dimulai dari hal sederhana.</p>
HTML,
            ],
            [
                'category' => $catEdukasi,
                'tags' => [$tagRelawan, $tagKomunitas],
                'title' => 'Membangun Kapasitas Relawan Lokal',
                'date' => now()->subDays(25),
                'thumbnail' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuCuC1wTOYxtDtK2-KosVe1yylCgfyaxM7e7lPpNraZ1l34OrNdr-ZNQav7T255fCvumQuxaCulxAfdBIw16nF7khJQA083Ezsn9BUy72fVniHf4Pf5XGrZQ9xrWGLWhmTT7l-PZuYnx0PnZQrT8iYqAxSC_HIaBrjsIhSU4CNiwBd9C_gKI-EoHj3goagSgUjihlhn5A5-aiaDdPSVr38iuZR2K2tjCkmRQbzvpGCGBAmcIyXAp1IbSdA',
                'content' => <<<'HTML'
<p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Kunci keberlanjutan program sosial ada pada pemberdayaan masyarakat lokal. Temukan strategi kami dalam melatih kader desa.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">Mengapa Relawan Lokal?</h2>
<p class="mb-6">Relawan lokal memahami konteks sosial, budaya, dan bahasa daerahnya. Keterlibatan mereka memastikan program berjalan lama setelah tim inti pulang.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">Program Pelatihan Kader Desa</h2>
<p class="mb-6">Kami menyelenggarakan pelatihan berkelanjutan: manajemen program dasar, teknik komunikasi persuasif, hingga pelaporan dampak. Kader terlatih kemudian menjadi penggerak program di desanya masing-masing.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">Hasil yang Membanggakan</h2>
<p class="">Saat ini lebih dari 80 kader desa aktif di 15 desa binaan. Mereka adalah tulang punggung keberlanjutan seluruh program Sarana Berbagi di lapangan.</p>
HTML,
            ],
        ];

        foreach ($blogItems as $item) {
            $post = Post::firstOrCreate(
                ['slug' => Str::slug($item['title'])],
                [
                    'type' => 'blog',
                    'category_id' => $item['category']->id,
                    'author_id' => $author->id,
                    'title' => $item['title'],
                    'content' => $item['content'],
                    'thumbnail' => $item['thumbnail'],
                    'published_at' => $item['date'],
                    'status' => 'published',
                ]
            );
            $post->tags()->syncWithoutDetaching(collect($item['tags'])->pluck('id')->all());
        }
    }
}
