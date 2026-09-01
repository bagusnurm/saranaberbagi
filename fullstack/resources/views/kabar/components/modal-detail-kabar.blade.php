<!-- Detail Popup Modal -->
<div class="kabar-popup fixed inset-0 z-[100] flex items-center justify-center p-4 md:p-8" id="kabarPopup"
    style="opacity:0; visibility:hidden; transition: opacity 0.3s ease, visibility 0.3s ease;">
    <div class="absolute inset-0 bg-on-background/60 backdrop-blur-sm" onclick="closeKabarPopup()"></div>
    <div class="kabar-popup-content relative bg-surface rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto"
        style="transform: translateY(20px) scale(0.98); transition: transform 0.3s ease;">
        <button
            class="absolute top-4 right-4 z-10 w-10 h-10 rounded-full bg-surface-container-low hover:bg-surface-variant flex items-center justify-center text-on-surface-variant hover:text-on-surface transition-colors"
            onclick="closeKabarPopup()">
            <span class="material-symbols-outlined">close</span>
        </button>
        <div id="kabarPopupBody">
            <!-- Konten di-inject lewat JS -->
        </div>
    </div>
</div>

@push('scripts')
<script>
    const kabarData = {
        1: {
            category: 'Edukasi',
            categoryColor: 'primary-container',
            readTime: '5 min baca',
            title: 'Perpustakaan Keliling Tiba di Desa Harapan',
            author: 'Tim Redaksi',
            date: '12 Okt 2024',
            image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCtWbu662_2iNprm3alF0kRYaVnj_AcLjFaNMAdEanEt2kEPtK10neEJan1lIlnwR0Eypa7X933lr30xQDo2kPIpvy5vbHdxhWVz_WUmZ5V0ZOhrhhW6CsZDNtTT2ytO-ejtCGhSfOm_pDszAGOBLyGxmF0uUg_vsbRpn1pRFdEPbUVSh3_s2HCVasEhtvOHnfA53Oaqh9HYqw5Jm-_DVNyYrKEdax3YR76z9irRp8-OLMANMDmpf_Hjg',
            caption: 'Relawan Sarana Berbagi membagikan buku-buku baru kepada anak-anak di Desa Harapan.',
            excerpt: 'Membawa ratusan buku baru, relawan kami menghabiskan akhir pekan berbagi cerita dan pengetahuan dengan anak-anak di pelosok.',
            content: `
                <p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Program perpustakaan keliling Sarana Berbagi kembali menyapa anak-anak di pelosok desa. Kali ini, Desa Harapan menjadi tujuan utama dalam misi menyebarkan literasi dan pengetahuan.</p>
                <h2 class="font-h2 text-h2 mt-12 mb-6">Misi Berbagi Pengetahuan</h2>
                <p class="mb-6">Lebih dari 500 buku baru berhasil didistribusikan dalam program ini. Tidak hanya meminjamkan buku, relawan kami juga mengadakan sesi mendongeng dan aktivitas kreatif untuk membangun minat baca anak-anak.</p>
                <p class="mb-8">Antusiasme terlihat dari wajah-wajah ceria mereka. Banyak yang bahkan meminta agar program ini dapat datang kembali bulan depan.</p>
                <blockquote class="border-l-4 border-primary-container pl-6 py-2 my-10 bg-surface-container-low/50 rounded-r-lg"><p class="font-h3 text-h3 text-primary-container italic mb-2">"Buku adalah jendela dunia. Melalui program ini, kami berharap dapat membuka wawasan lebih luas bagi anak-anak desa."</p></blockquote>
                <h2 class="font-h2 text-h2 mt-12 mb-6">Dampak yang Dirasakan</h2>
                <p class="mb-6">Sejak diluncurkan tiga tahun lalu, program perpustakaan keliling telah mengunjungi lebih dari 50 desa dan menjangkau lebih dari 10.000 anak di seluruh Indonesia.</p>
                <p class="">Dukungan donatur menjadi kunci keberlangsungan program ini. Setiap kontribusi yang Anda berikan membantu kami membawa lebih banyak buku dan pengetahuan ke daerah-daerah yang membutuhkan.</p>
            `
        },
        2: {
            category: 'Kesehatan',
            categoryColor: 'secondary-container',
            readTime: '4 min baca',
            title: 'Klinik Berjalan Melayani 500 Warga Lansia',
            author: 'Dr. Andi Wijaya',
            date: '08 Okt 2024',
            image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuB8JJYQSs4hSDhny6bWDq6C8tL3CNgX5Vuo1ax6SXD7haKd-UsCujEce-pTHKwoo6VkHNvJXtOqp2kzfKzKKC0AwuCXUPyvkA4DcGVjpaS0_bnQPztiHVcvJR41noQ0TBjThu9b9ooLtoZnPcACgbqsz99OPlt4V81lqJa-G2jxfISH0EZeipYnJkwiAg7OOAKDN8eK-KzpCv4RI_RHxQS9RyOUXjrLgmWWTTK4P7rlX-g1YcQgz8s3qA',
            caption: 'Tim medis Sarana Berbagi memberikan pemeriksaan kesehatan gratis kepada warga lansia.',
            excerpt: 'Program pemeriksaan kesehatan gratis kami bulan ini berfokus pada kesejahteraan lansia di daerah terpencil dengan akses medis terbatas.',
            content: `
                <p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Program klinik berjalan Sarana Berbagi kembali menunjukkan komitmen kami dalam meningkatkan akses kesehatan bagi masyarakat di daerah terpencil, khususnya untuk kelompok lansia.</p>
                <h2 class="font-h2 text-h2 mt-12 mb-6">Pelayanan yang Komprehensif</h2>
                <p class="mb-6">Tim medis kami terdiri dari 5 dokter umum, 10 perawat, dan 2 apoteker yang siap memberikan pelayanan kesehatan lengkap mulai dari pemeriksaan umum, pengukuran tekanan darah, hingga penyediaan obat-obatan esensial.</p>
                <p class="mb-8">Lebih dari 500 warga lansia telah mendapatkan manfaat dari program bulan ini. Sebagian besar mengalami masalah kesehatan yang umum dialami lansia seperti hipertensi dan diabetes.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-10"><div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant/30"><span class="material-symbols-outlined text-primary-container text-4xl mb-4">medical_services</span><h3 class="font-h3 text-xl mb-2">Pemeriksaan Gratis</h3><p class="font-body-md text-sm text-on-surface-variant">Pemeriksaan kesehatan lengkap tanpa biaya untuk seluruh peserta.</p></div><div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant/30"><span class="material-symbols-outlined text-primary-container text-4xl mb-4">medication</span><h3 class="font-h3 text-xl mb-2">Obat-obatan</h3><p class="font-body-md text-sm text-on-surface-variant">Penyediaan obat esensial secara gratis bagi yang membutuhkan.</p></div></div>
                <h2 class="font-h2 text-h2 mt-12 mb-6">Keberlanjutan Program</h2>
                <p class="">Program klinik berjalan akan terus digelar setiap bulan di berbagai desa. Kami berkomitmen untuk menjangkau lebih banyak lansia yang membutuhkan akses kesehatan yang layak.</p>
            `
        },
        3: {
            category: 'Tanggap Bencana',
            categoryColor: 'error-container',
            readTime: '6 min baca',
            title: 'Distribusi Air Bersih Pasca Gempa',
            author: 'Tim Tanggap Darurat',
            date: '25 Sep 2024',
            image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuAuNn8SWz1-gb07ckiocA_tz4YyBPpeSOB0GqDB6zpekTROOVs2bQyPVfSG3Q83l7bR_9EaI520iHc20SCs_7r-PozeQuw2SuRHS5KKUrAxW8Lr3jfKeog6_ABuSg-CsQG51Px9e-izEL6jfRGys928Hi7Vtp5xxsjim09TgWk-rLUNNRyLbntLf1UR65QpcMtYUxXKxF4ul1kiVpNLNkaPhW5LVjTBo-Ww7TNYDU_2CBZuOQKdMJifvA',
            caption: 'Tim reaksi cepat mendirikan titik distribusi air bersih untuk warga terdampak gempa.',
            excerpt: 'Tim reaksi cepat Sarana Berbagi telah mendirikan 5 titik distribusi air bersih untuk membantu keluarga yang terdampak.',
            content: `
                <p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Bencana gempa bumi yang baru saja terjadi telah meninggalkan dampak signifikan bagi masyarakat. Akses air bersih menjadi salah satu kebutuhan paling mendesak yang harus segera dipenuhi.</p>
                <h2 class="font-h2 text-h2 mt-12 mb-6">Respons Cepat Tim Darurat</h2>
                <p class="mb-6">Dalam waktu kurang dari 24 jam, tim tanggap darurat Sarana Berbagi telah berada di lokasi dan mulai mendistribusikan air bersih ke titik-titik pengungsian. Lima titik distribusi didirikan untuk memastikan cakupan yang merata.</p>
                <p class="mb-8">Setiap titik distribusi mampu melayani hingga 200 kepala keluarga per hari dengan kebutuhan air bersih yang layak konsumsi.</p>
                <blockquote class="border-l-4 border-primary-container pl-6 py-2 my-10 bg-surface-container-low/50 rounded-r-lg"><p class="font-h3 text-h3 text-primary-container italic mb-2">"Air bersih adalah hak setiap manusia. Dalam situasi darurat seperti ini, kami hadir untuk memastikan kebutuhan dasar ini terpenuhi."</p></blockquote>
                <h2 class="font-h2 text-h2 mt-12 mb-6">Fokus pada Kelompok Rentan</h2>
                <p class="mb-6">Anak-anak dan lansia menjadi prioritas utama dalam distribusi ini. Tim kami juga menyediakan edukasi tentang pengolahan air darurat untuk mencegah penyakit pasca bencana.</p>
                <p class="">Dukungan dari para donatur sangat berarti untuk memperluas jangkauan bantuan. Setiap kontribusi membantu kami menyediakan lebih banyak air bersih bagi yang membutuhkan.</p>
            `
        },
        4: {
            category: 'Kisah Sukses',
            categoryColor: 'tertiary-container',
            readTime: '7 min baca',
            title: 'Ibu Siti: Mengubah Lahan Kering Menjadi Kebun Produktif',
            author: 'Nur Aini, S.Pd',
            date: '15 Sep 2024',
            image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDnUwyD1IG2V_5-KpX5REOEkQ1TJUmzH45nYDaS3GZX28ZbCZFjLNAkraX35GfZE9ik_H7-aAp1x2d6FnNKxC6slZh6uLt_mjTy000dQjAo012tmYPGS5FZCrlhNSqa5UGUyoS9EggmptVvxnVH4P-e8J-sUAtmYa70IL_FZ8bRyRHAvUgC9_paPavpgSdzQYiJRwwK3cmP1XqmyDZrA9x-C4d-UiUPxyxG2AGcHl5I8mbIHWk_PPPwLA',
            caption: 'Ibu Siti memetik sayur organik dari kebun produktifnya di desa.',
            excerpt: 'Berkat program pemberdayaan ekonomi, Ibu Siti kini menjadi pemasok sayur organik utama di desanya.',
            content: `
                <p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Di tengah keterbatasan lahan kering di desanya, Ibu Siti membuktikan bahwa tekad dan pengetahuan dapat mengubah tantangan menjadi peluang. Kini, ia menjadi inspirasi bagi banyak perempuan di sekitarnya.</p>
                <h2 class="font-h2 text-h2 mt-12 mb-6">Awal Mula Perjalanan</h2>
                <p class="mb-6">Tiga tahun lalu, Ibu Siti hanyalah seorang ibu rumah tangga dengan lahan kosong di belakang rumahnya. Melalui program pemberdayaan ekonomi Sarana Berbagi, ia mendapatkan pelatihan pertanian organik dan bantuan bibit tanaman.</p>
                <p class="mb-8">Dengan tekun dan penuh dedikasi, lahan kering seluas 500 meter persegi itu kini menjadi kebun produktif yang menghasilkan berbagai jenis sayuran organik.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-10"><div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant/30"><span class="material-symbols-outlined text-primary-container text-4xl mb-4">eco</span><h3 class="font-h3 text-xl mb-2">Pertanian Organik</h3><p class="font-body-md text-sm text-on-surface-variant">Menggunakan metode ramah lingkungan tanpa bahan kimia berbahaya.</p></div><div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant/30"><span class="material-symbols-outlined text-primary-container text-4xl mb-4">trending_up</span><h3 class="font-h3 text-xl mb-2">Pendapatan Meningkat</h3><p class="font-body-md text-sm text-on-surface-variant">Penjualan sayur organik meningkat 300% dalam setahun terakhir.</p></div></div>
                <h2 class="font-h2 text-h2 mt-12 mb-6">Menginspirasi Lingkungan</h2>
                <p class="mb-6">Kisah sukses Ibu Siti kini menginspirasi 15 ibu-ibu lain di desanya untuk mengikuti jejaknya. Mereka kini memiliki kebun organik masing-masing dan secara kolektif memasok pasar lokal.</p>
                <p class="">Program pemberdayaan ekonomi Sarana Berbagi telah membantu lebih dari 200 perempuan di berbagai desa untuk mandiri secara ekonomi.</p>
            `
        },
        5: {
            category: 'Edukasi',
            categoryColor: 'primary-container',
            readTime: '3 min baca',
            title: 'Renovasi SD Inpres Selesai Lebih Cepat',
            author: 'Tim Infrastructure',
            date: '02 Sep 2024',
            image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBsm8hA1U-3AAbSwvylFj_0Q3-WZ32YI3BI1aGX6pBxjPWKONrbzltHZ688eibuH9pTPqUOCv1EJ9mKuPD9eIbTVFxuAtfVSLFt_oWVWxDVGhfjPbzLflLad9v-3z7rUB7kKSkP5iHUolZ1tI4RC3mCfq3eQ_lr8g2rVTWSh_QZyrAbaRWV5G6V7zHn91AfYbvnjONdk7ajGfOq6LoQjJ410F7xwrHAaj1IFzOM23J1_l-ACXqQ3cY_Bg',
            caption: 'Relawan dan warga bersama-sama merenovasi fasilitas sekolah.',
            excerpt: 'Antusiasme puluhan relawan lokal membuat proses perbaikan fasilitas sekolah ini rampung sebelum tahun ajaran baru dimulai.',
            content: `
                <p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Apa yang seharusnya memakan waktu tiga bulan, berhasil diselesaikan dalam waktu hanya enam minggu. Semangat gotong royong antara relawan dan warga desa menjadi kunci keberhasilan renovasi SD Inpres ini.</p>
                <h2 class="font-h2 text-h2 mt-12 mb-6">Semangat Gotong Royong</h2>
                <p class="mb-6">Lebih dari 50 relawan dari berbagai latar belakang bergabung dalam proyek ini. Mulai dari tukang kayu, tukang batu, hingga mahasiswa yang rela meluangkan waktu mereka untuk membantu memperbaiki fasilitas pendidikan.</p>
                <p class="mb-8">Hasilnya, tiga ruang kelas yang sebelumnya rusak berat kini telah diperbaiki dan dilengkapi dengan meja dan kursi baru. Toilet dan area bermain juga direnovasi untuk kenyamanan siswa.</p>
                <blockquote class="border-l-4 border-primary-container pl-6 py-2 my-10 bg-surface-container-low/50 rounded-r-lg"><p class="font-h3 text-h3 text-primary-container italic mb-2">"Melihat anak-anak bisa belajar dengan nyaman, semua lelah kami terbayar lunas."</p></blockquote>
                <h2 class="font-h2 text-h2 mt-12 mb-6">Siap Sambut Tahun Ajaran Baru</h2>
                <p class="">Dengan selesainya renovasi ini, seluruh siswa SD Inpres kini memiliki lingkungan belajar yang lebih baik dan lebih aman untuk menyambut tahun ajaran baru.</p>
            `
        },
        6: {
            category: 'Kabar',
            categoryColor: 'secondary-container',
            readTime: '5 min baca',
            title: 'Panel Surya Untuk Balai Desa Terang',
            author: 'Tim Energi Bersih',
            date: '28 Agu 2024',
            image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBJ2qwp5lEwfGe0FhFBQkcUck3kLYfEZiogCmY-s3pBlurTSW-XdavlPf-IFBxjvUZgQikWOejKgnwbf_-7GbTeB-UqUbwolsG_wBmbg1M7eO7lJ2h8Rvsj1LaGOpYZnddiiLBIO7-rYWvqI22gDZI8Q1Pq2vwEui8Ev8fOhFrS_X0IxXAK2MlIJJB91K4nIBpUwU75mTKb86NIM5KEEZA0ERWyoCR2yanArahqK8ACDKlQJV9fMwVUhg',
            caption: 'Panel surya terpasang di atap balai desa untuk menyediakan energi bersih.',
            excerpt: 'Inisiatif energi bersih kami mulai menunjukkan hasil. Malam hari di balai desa kini bisa dimanfaatkan untuk kegiatan belajar warga.',
            content: `
                <p class="lead text-xl text-on-surface-variant mb-8 leading-relaxed">Program energi bersih Sarana Berbagi memasuki tahap baru dengan pemasangan panel surya di balai desa. Inisiatif ini tidak hanya menerangi malam hari, tetapi juga membuka peluang baru bagi masyarakat.</p>
                <h2 class="font-h2 text-h2 mt-12 mb-6">Energi untuk Kemajuan</h2>
                <p class="mb-6">Pemasangan 20 panel surya di atap balai desa kini mampu menghasilkan listrik yang cukup untuk menerangi seluruh area balai desa hingga 10 jam setiap malamnya. Ini merupakan langkah besar bagi desa yang sebelumnya belum memiliki akses listrik yang memadai.</p>
                <p class="mb-8">Dengan adanya listrik, kini masyarakat dapat mengadakan berbagai kegiatan di malam hari seperti belajar bersama, pelatihan keterampilan, hingga pertemuan desa.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 my-10"><div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant/30"><span class="material-symbols-outlined text-primary-container text-4xl mb-4">solar_power</span><h3 class="font-h3 text-xl mb-2">Energi Terbarukan</h3><p class="font-body-md text-sm text-on-surface-variant">20 panel surya menghasilkan energi bersih untuk seluruh balai desa.</p></div><div class="bg-surface-container-low p-6 rounded-xl border border-outline-variant/30"><span class="material-symbols-outlined text-primary-container text-4xl mb-4">lightbulb</span><h3 class="font-h3 text-xl mb-2">Malam yang Terang</h3><p class="font-body-md text-sm text-on-surface-variant">Kegiatan malam hari kini dimungkinkan dengan penerangan yang memadai.</p></div></div>
                <h2 class="font-h2 text-h2 mt-12 mb-6">Keberlanjutan Lingkungan</h2>
                <p class="">Program ini juga bagian dari komitmen Sarana Berbagi dalam mendukung penggunaan energi terbarukan. Kami berharap dapat memperluas inisiatif ini ke desa-desa lain di masa mendatang.</p>
            `
        }
    };

    function openKabarPopup(id) {
        const data = kabarData[id];
        if (!data) return;
        const popup = document.getElementById('kabarPopup');
        const body = document.getElementById('kabarPopupBody');
        const categoryClass = data.categoryColor === 'primary-container' ?
            'bg-primary-container text-on-primary-container' : data.categoryColor === 'secondary-container' ?
            'bg-secondary-container text-on-secondary-container' : data.categoryColor === 'error-container' ?
            'bg-error-container text-on-error-container' : 'bg-tertiary-container text-on-tertiary-container';
        body.innerHTML =
            `<article class="max-w-[720px] mx-auto p-6 md:p-10"><div class="flex items-center space-x-2 mb-6"><span class="inline-flex items-center px-3 py-1 rounded-full ${categoryClass} font-label-sm text-label-sm">${data.category}</span><span class="text-outline text-sm">•</span><span class="text-on-surface-variant font-body-md text-sm">${data.readTime}</span></div><h1 class="font-h1 text-h1-mobile md:text-h1 text-on-surface mb-6">${data.title}</h1><div class="flex items-center space-x-4 mb-10 pb-8 border-b border-outline-variant/30"><div class="w-12 h-12 rounded-full overflow-hidden bg-surface-variant flex items-center justify-center"><span class="material-symbols-outlined text-on-surface-variant">person</span></div><div><p class="font-label-sm text-label-sm text-on-surface font-semibold">${data.author}</p><p class="font-body-md text-sm text-on-surface-variant">${data.date}</p></div></div><figure class="mb-12 relative rounded-2xl overflow-hidden shadow-sm"><div class="bg-cover bg-center w-full aspect-video" style="background-image: url('${data.image}');"></div><figcaption class="mt-3 text-center text-sm text-on-surface-variant font-body-md">${data.caption}</figcaption></figure><div class="prose prose-custom prose-lg font-body-lg text-body-lg text-on-surface max-w-none">${data.content}</div><div class="mt-16 bg-primary text-white rounded-2xl p-8 md:p-12 text-center shadow-lg relative overflow-hidden"><div class="relative z-10"><h3 class="font-h2 text-h2 mb-4">Mari Bersama Ringankan Beban Mereka</h3><p class="font-body-lg text-lg mb-8 opacity-90 max-w-2xl mx-auto">Donasi Anda akan disalurkan langsung untuk program-program kami di seluruh Indonesia.</p><a href="{{ url('/donasi') }}" class="inline-block bg-[#F59E0B] hover:bg-[#D97706] text-white font-label-sm text-label-sm px-8 py-4 rounded-lg transition-colors shadow-md active:scale-95 font-semibold">Donasi Sekarang</a></div></div></article>`;
        popup.style.opacity = '1';
        popup.style.visibility = 'visible';
        popup.querySelector('.kabar-popup-content').style.transform = 'translateY(0) scale(1)';
        document.body.style.overflow = 'hidden';
    }

    function closeKabarPopup() {
        const popup = document.getElementById('kabarPopup');
        popup.style.opacity = '0';
        popup.style.visibility = 'hidden';
        popup.querySelector('.kabar-popup-content').style.transform = 'translateY(20px) scale(0.98)';
        document.body.style.overflow = '';
    }

    document.addEventListener('DOMContentLoaded', function() {
        const detailLinks = document.querySelectorAll('.kabar-detail-link, article[data-id]');
        detailLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                if (e.target.closest('a') && !e.target.closest('.kabar-detail-link')) return;
                const id = this.dataset.id;
                if (id) openKabarPopup(id);
            });
        });
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeKabarPopup();
    });
</script>
@endpush
