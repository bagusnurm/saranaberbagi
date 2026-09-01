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

        // ===== KABAR TERBARU / BERITA KEGIATAN (type: news) =====
        $newsItems = [
            [
                'category' => $catKisah,
                'tags' => [$tagKomunitas],
                'title' => 'Penyaluran Hewan Qurban Idul Adha Hadirkan Kebahagiaan untuk Masyarakat Pelosok',
                'date' => now()->subDays(1),
                'thumbnail' => 'https://images.unsplash.com/photo-1593113598332-cd288d649433?w=800&auto=format&fit=crop&q=80',
                'content' => <<<'HTML'
<p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed"><strong>SARANA BERBAGI</strong> – Idul Adha selalu menjadi momen penuh haru dan kebahagiaan bagi umat Muslim di seluruh dunia. Di balik gema takbir yang berkumandang, ada jutaan saudara kita yang menanti hadirnya keberkahan melalui daging qurban. Tahun ini, Yayasan Sarana Berbagi bersama Rumah Tahfidz Annaba kembali menyalurkan amanah qurban kepada masyarakat yang membutuhkan hingga pelosok desa.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">Menembus Pelosok Demi Senyuman Umat</h2>
<p class="mb-6">Distribusi daging qurban difokuskan ke wilayah-wilayah pedesaan terpencil yang jarang tersentuh distribusi qurban perkotaan. Warga menyambut kedatangan tim relawan dengan penuh antusias dan rasa syukur.</p>
<p class="mb-8">"Bagi kami, makan daging sapi adalah hal yang sangat langka. Terima kasih kepada para donatur Sarana Berbagi yang telah mengingat kami di pelosok," ungkap salah seorang warga penerima manfaat.</p>
<blockquote class="border-l-4 border-primary pl-6 py-3 my-8 bg-surface-container-low/50 rounded-r-xl"><p class="font-h3 text-h3 text-primary italic mb-1">"Setiap helai bulu hewan qurban adalah kebaikan, dan setiap senyuman penerima manfaat adalah doa keberkahan bagi para donatur."</p></blockquote>
<h2 class="font-h2 text-h2 mt-12 mb-6">Amanah dan Transparansi Penyaluran</h2>
<p class="">Yayasan Sarana Berbagi memastikan setiap proses pemotongan, penimbangan, hingga pendistribusian dilakukan secara higienis, tepat sasaran, dan terdokumentasi rapi demi menjaga amanah para pekurban.</p>
HTML,
            ],
            [
                'category' => $catKisah,
                'tags' => [$tagKomunitas, $tagPangan],
                'title' => 'Jum\'at Bahagia di Masjid: Sedekah Rp10 Ribu Hadirkan Senyum Anak Yatim dan Dukung UMKM Lokal',
                'date' => now()->subDays(3),
                'thumbnail' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=800&auto=format&fit=crop&q=80',
                'content' => <<<'HTML'
<p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed"><strong>SARANA BERBAGI</strong> – Suasana selepas shalat Jum'at di salah satu masjid wilayah Bandung tampak berbeda. Di sudut halaman masjid, beberapa anak kecil terlihat duduk rapi sambil sesekali menoleh ke arah relawan yang sedang menyiapkan paket makanan. Wajah mereka penuh harap, seolah ada kebahagiaan kecil yang sudah ditunggu sejak pagi. Bukan tanpa alasan, setiap hari Jum'at program Sedekah Makan Berkah rutin diselenggarakan.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">Memberdayakan Warung dan UMKM Lokal</h2>
<p class="mb-6">Program ini tidak hanya membagikan makanan bernutrisi kepada anak-anak yatim dan jamaah dhuafa, tetapi juga memborong paket makanan dari warung-warung makan kecil milik pedagang lokal di sekitar masjid.</p>
<p class="mb-8">Dengan cara ini, sedekah dari donatur menghasilkan dua dampak sekaligus: membahagiakan penerima makanan dan menghidupkan perekonomian pedagang kecil.</p>
HTML,
            ],
            [
                'category' => $catEdukasi,
                'tags' => [$tagKomunitas],
                'title' => 'Di Balik Atap yang Terbuka, Cahaya Hafiz Qur\'an Terus Menyala di Bukit Cimenyan',
                'date' => now()->subDays(5),
                'thumbnail' => 'https://images.unsplash.com/photo-1577896851231-70ef18881754?w=800&auto=format&fit=crop&q=80',
                'content' => <<<'HTML'
<p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed"><strong>SARANA BERBAGI</strong> – Di ketinggian perbukitan Cimenyan, tepatnya di Desa Mandalamekar, berdiri sebuah bangunan sederhana yang menyimpan energi luar biasa. Madrasah Al-Furqon Mandalamekar, sebuah tempat menimba ilmu yang jauh dari kata mewah, kini menjadi pusat perjuangan bagi puluhan generasi muda muslim untuk menghafal bait-bait suci Al-Qur'an. Kondisi bangunan madrasah ini jauh dari kata sempurna, namun semangat para santri tak pernah padam.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">Penyaluran Mushaf Al-Qur'an dan Iqro</h2>
<p class="mb-6">Tim Sarana Berbagi menyalurkan mushaf Al-Qur'an baru, buku tajwid, serta karpet sajadah untuk menggantikan alas belajar santri yang sudah usang dan lapuk.</p>
<p class="">Dukungan sarana belajar yang layak ini diharapkan mampu memicu motivasi anak-anak desa untuk terus mendalami Al-Qur'an hingga menjadi generasi hafiz yang berakhlak mulia.</p>
HTML,
            ],
            [
                'category' => $catFilantropi,
                'tags' => [$tagFilantropi, $tagRelawan],
                'title' => 'Menembus Lelah, Mengukir Senyum: Strategi Filantropi Berbasis Komunitas di Wilayah Bandung Selatan',
                'date' => now()->subDays(8),
                'thumbnail' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?w=800&auto=format&fit=crop&q=80',
                'content' => <<<'HTML'
<p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed"><strong>SARANA BERBAGI</strong> – Wilayah Bandung Selatan memiliki tantangan geografis tersendiri dalam pendistribusian program sosial kemanusiaan. Melalui pendekatan filantropi berbasis komunitas, Sarana Berbagi melibatkan tokoh masyarakat, pemuda karang taruna, dan pengurus RT/RW dalam pemetaan mustahik yang paling membutuhkan.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">Efektivitas Pendekatan Akar Rumput</h2>
<p class="mb-6">Dengan data yang akurat dari warga setempat, potensi salah sasaran bantuan dapat diminimalisir hingga mendekati nol. Relawan lokal juga berperan aktif dalam memantau keberlanjutan dampak bantuan yang diberikan.</p>
HTML,
            ],
            [
                'category' => $catEdukasi,
                'tags' => [$tagKomunitas],
                'title' => 'Perpustakaan Keliling Tiba di Desa Harapan',
                'date' => now()->subDays(10),
                'thumbnail' => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=800&auto=format&fit=crop&q=80',
                'content' => <<<'HTML'
<p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Program perpustakaan keliling Sarana Berbagi kembali menyapa anak-anak di pelosok desa. Kali ini, Desa Harapan menjadi tujuan utama dalam misi menyebarkan literasi dan pengetahuan.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">Misi Berbagi Pengetahuan</h2>
<p class="mb-6">Lebih dari 500 buku baru berhasil didistribusikan dalam program ini. Tidak hanya meminjamkan buku, relawan kami juga mengadakan sesi mendongeng dan aktivitas kreatif untuk membangun minat baca anak-anak.</p>
HTML,
            ],
            [
                'category' => $catKesehatan,
                'tags' => [$tagKomunitas],
                'title' => 'Klinik Berjalan Melayani 500 Warga Lansia',
                'date' => now()->subDays(15),
                'thumbnail' => 'https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?w=800&auto=format&fit=crop&q=80',
                'content' => <<<'HTML'
<p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Program klinik berjalan Sarana Berbagi kembali menunjukkan komitmen kami dalam meningkatkan akses kesehatan bagi masyarakat di daerah terpencil, khususnya untuk kelompok lansia.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">Pelayanan yang Komprehensif</h2>
<p class="mb-6">Tim medis kami terdiri dari 5 dokter umum, 10 perawat, dan 2 apoteker yang siap memberikan pelayanan kesehatan lengkap mulai dari pemeriksaan umum hingga penyediaan obat-obatan esensial.</p>
HTML,
            ],
            [
                'category' => $catBencana,
                'tags' => [$tagKomunitas],
                'title' => 'Distribusi Air Bersih Pasca Gempa',
                'date' => now()->subDays(20),
                'thumbnail' => 'https://images.unsplash.com/photo-1541971875076-8f970d573be6?w=800&auto=format&fit=crop&q=80',
                'content' => <<<'HTML'
<p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Bencana gempa bumi yang baru saja terjadi telah meninggalkan dampak signifikan bagi masyarakat. Akses air bersih menjadi salah satu kebutuhan paling mendesak yang harus segera dipenuhi.</p>
<h2 class="font-h2 text-h2 mt-12 mb-6">Respons Cepat Tim Darurat</h2>
<p class="mb-6">Dalam waktu kurang dari 24 jam, tim tanggap darurat Sarana Berbagi telah berada di lokasi dan mulai mendistribusikan air bersih ke titik-titik pengungsian.</p>
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
