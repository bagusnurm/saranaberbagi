<?php

namespace Database\Seeders;

use App\Models\AidRequest;
use App\Models\Campaign;
use App\Models\CategoryCampaign;
use App\Models\CollaborationRequest;
use App\Models\Donation;
use App\Models\JobApplication;
use App\Models\JobVacancy;
use App\Models\PaymentMethod;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DummyDataSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::first();

        // 1. Kategori Campaign
        $catKemanusiaan = CategoryCampaign::firstOrCreate(
            ['slug' => 'bantuan-kemanusiaan-bencana'],
            [
                'name' => 'Bantuan Kemanusiaan & Bencana',
                'description' => 'Program tanggap bencana alam dan bantuan darurat kemanusiaan.',
            ]
        );

        $catPendidikan = CategoryCampaign::firstOrCreate(
            ['slug' => 'pendidikan-yatim-dhuafa'],
            [
                'name' => 'Pendidikan & Yatim Dhuafa',
                'description' => 'Program beasiswa dan perlengkapan sekolah anak-anak pra-sejahtera.',
            ]
        );

        $catKesehatan = CategoryCampaign::firstOrCreate(
            ['slug' => 'kesehatan-pengobatan'],
            [
                'name' => 'Kesehatan & Pengobatan',
                'description' => 'Bantuan biaya operasional medis dan obat-obatan dhuafa.',
            ]
        );

        $catDakwah = CategoryCampaign::firstOrCreate(
            ['slug' => 'sarana-ibadah-dakwah'],
            [
                'name' => 'Sarana Ibadah & Dakwah',
                'description' => 'Penyaluran mushaf Al-Quran dan renovasi mushola pelosok.',
            ]
        );

        // 2. Program Donasi (Campaign)
        $campaign1 = Campaign::firstOrCreate(
            ['slug' => 'sedekah-quran-sarana-ibadah-pelosok'],
            [
                'campaign_category_id' => $catDakwah->id,
                'title' => 'Sedekah Al-Qur\'an & Sarana Ibadah Pelosok Negeri',
                'description' => '<p>Mari bersama menghadirkan mushaf Al-Qur\'an layak dan sarana ibadah bagi saudara-saudara kita di pelosok Nusantara.</p>',
                'target_amount' => 50000000,
                'collected_amount' => 14750000,
                'start_date' => now()->subDays(15),
                'end_date' => now()->addDays(45),
                'status' => 'active',
                'is_featured' => true,
            ]
        );

        $campaign2 = Campaign::firstOrCreate(
            ['slug' => 'bantuan-operasi-jantung-balita-dhuafa'],
            [
                'campaign_category_id' => $catKesehatan->id,
                'title' => 'Bantuan Operasi Jantung Balita Dhuafa',
                'description' => '<p>Bantu kesembuhan adik kecil pejuang penyakit jantung bawaan agar dapat menjalani tindakan medis secepatnya.</p>',
                'target_amount' => 75000000,
                'collected_amount' => 34000000,
                'start_date' => now()->subDays(10),
                'end_date' => now()->addDays(20),
                'status' => 'active',
                'is_featured' => true,
            ]
        );

        $campaign3 = Campaign::firstOrCreate(
            ['slug' => 'paket-sembako-nutrisi-lansia-sebatang-kara'],
            [
                'campaign_category_id' => $catKemanusiaan->id,
                'title' => 'Paket Sembako & Nutrisi Lansia Sebatang Kara',
                'description' => '<p>Salurkan bantuan paket pangan dan sembako bagi para lansia dhuafa yang hidup sebatang kara.</p>',
                'target_amount' => 25000000,
                'collected_amount' => 18000000,
                'start_date' => now()->subDays(30),
                'end_date' => now()->addDays(15),
                'status' => 'active',
                'is_featured' => false,
            ]
        );

        // 3. Metode Pembayaran (Payment Methods)
        $pmBca = PaymentMethod::firstOrCreate(
            ['name' => 'Bank BCA'],
            [
                'type' => 'bank_transfer',
                'account_number' => '1234567890',
                'account_name' => 'Yayasan Sarana Berbagi',
                'is_active' => true,
            ]
        );

        $pmMandiri = PaymentMethod::firstOrCreate(
            ['name' => 'Bank Mandiri'],
            [
                'type' => 'bank_transfer',
                'account_number' => '9876543210',
                'account_name' => 'Yayasan Sarana Berbagi',
                'is_active' => true,
            ]
        );

        $pmQris = PaymentMethod::firstOrCreate(
            ['name' => 'QRIS Sarana Berbagi'],
            [
                'type' => 'qris',
                'account_number' => 'NMID123456789',
                'account_name' => 'Sarana Berbagi Indonesia',
                'is_active' => true,
            ]
        );

        // 4. Transaksi Donasi (Donations)
        // A. Pending - Siap diverifikasi / ditandai gagal / dihubungi WA
        Donation::firstOrCreate(
            ['invoice_number' => 'INV-20260830-001'],
            [
                'campaign_id' => $campaign1->id,
                'payment_method_id' => $pmBca->id,
                'donor_name' => 'Budi Santoso',
                'donor_email' => 'budi.santoso@gmail.com',
                'donor_phone' => '081234567890',
                'is_anonymous' => false,
                'amount' => 500000,
                'message' => 'Bismillah, semoga bermanfaat untuk sarana ibadah di pelosok dan menjadi amal jariyah keluarga kami.',
                'status' => 'pending',
                'created_at' => now()->subHours(2),
            ]
        );

        Donation::firstOrCreate(
            ['invoice_number' => 'INV-20260830-002'],
            [
                'campaign_id' => $campaign2->id,
                'payment_method_id' => $pmQris->id,
                'donor_name' => 'Siti Rahmawati',
                'donor_email' => 'siti.rahmawati@yahoo.com',
                'donor_phone' => '082198765432',
                'is_anonymous' => false,
                'amount' => 250000,
                'message' => 'Lekas sembuh adik manis, semoga operasinya lancar.',
                'status' => 'pending',
                'created_at' => now()->subHours(5),
            ]
        );

        // B. Verified
        Donation::firstOrCreate(
            ['invoice_number' => 'INV-20260829-003'],
            [
                'campaign_id' => $campaign2->id,
                'payment_method_id' => $pmMandiri->id,
                'donor_name' => 'Ahmad Fauzi',
                'donor_email' => 'fauzi.ahmad@gmail.com',
                'donor_phone' => '085712345678',
                'is_anonymous' => false,
                'amount' => 1000000,
                'message' => 'Semoga lekas diberikan kesembuhan dan keluarga diberikan ketabahan.',
                'status' => 'verified',
                'verified_by' => $admin?->id,
                'created_at' => now()->subDay(),
            ]
        );

        Donation::firstOrCreate(
            ['invoice_number' => 'INV-20260828-004'],
            [
                'campaign_id' => $campaign3->id,
                'payment_method_id' => $pmQris->id,
                'donor_name' => 'Hamba Allah',
                'donor_email' => null,
                'donor_phone' => null,
                'is_anonymous' => true,
                'amount' => 2000000,
                'message' => 'Semoga berkah untuk para lansia.',
                'status' => 'verified',
                'verified_by' => $admin?->id,
                'created_at' => now()->subDays(2),
            ]
        );

        // C. Failed
        Donation::firstOrCreate(
            ['invoice_number' => 'INV-20260827-005'],
            [
                'campaign_id' => $campaign1->id,
                'payment_method_id' => $pmBca->id,
                'donor_name' => 'Anonim',
                'donor_email' => 'anonim@test.com',
                'donor_phone' => '089912341234',
                'is_anonymous' => false,
                'amount' => 100000,
                'message' => null,
                'status' => 'failed',
                'created_at' => now()->subDays(3),
            ]
        );

        // 5. Permohonan Bantuan (AidRequests)
        // A. Pending - Siap diverifikasi / ditolak / dihubungi WA
        AidRequest::firstOrCreate(
            ['applicant_name' => 'Ibu Sumarni', 'phone' => '081389012345'],
            [
                'applicant_name' => 'Ibu Sumarni',
                'phone' => '081389012345',
                'aid_type' => 'Bantuan Medis & Obat-obatan',
                'address' => 'Dusun Sukamaju RT 03/RW 02, Kec. Cibinong, Kab. Bogor, Jawa Barat',
                'description' => 'Membutuhkan bantuan biaya pengobatan rawat jalan dan obat rutin pasca stroke untuk suami lansia yang tidak memiliki penghasilan tetap.',
                'status' => 'pending',
                'admin_note' => null,
                'created_at' => now()->subHours(4),
            ]
        );

        // B. Verified - Siap disalurkan bantuan (Disburse) / ditolak / dihubungi WA
        AidRequest::firstOrCreate(
            ['applicant_name' => 'Pak Slamet Riyadi', 'phone' => '085211223344'],
            [
                'applicant_name' => 'Pak Slamet Riyadi',
                'phone' => '085211223344',
                'aid_type' => 'Paket Sembako & Kebutuhan Pokok Darurat',
                'address' => 'Jl. Kampung Baru No. 15, RT 01/RW 04, Garut, Jawa Barat',
                'description' => 'Rumah terdampak musibah longsor skala kecil. Membutuhkan terpal penutup darurat dan kebutuhan sembako bagi 5 anggota keluarga.',
                'status' => 'verified',
                'admin_note' => 'Berkas KTP & Surat Keterangan Tidak Mampu (SKTM) telah dicek dan divalidasi oleh tim relawan lapangan Garut.',
                'created_at' => now()->subDays(2),
            ]
        );

        // C. Disbursed
        AidRequest::firstOrCreate(
            ['applicant_name' => 'Ibu Nurul Hidayah', 'phone' => '087812345678'],
            [
                'applicant_name' => 'Ibu Nurul Hidayah',
                'phone' => '087812345678',
                'aid_type' => 'Bantuan Biaya Pendidikan Sekolah',
                'address' => 'Kelurahan Sukasari RT 05/RW 01, Kota Bandung',
                'description' => 'Bantuan pelunasan tunggakan SPP dan seragam sekolah anak yatim tingkat SMP.',
                'status' => 'disbursed',
                'admin_note' => 'Bantuan tunai pendidikan sebesar Rp 1.500.000 telah disalurkan langsung ke bagian tata usaha sekolah pada 28 Agustus 2026.',
                'created_at' => now()->subDays(5),
            ]
        );

        // D. Rejected
        AidRequest::firstOrCreate(
            ['applicant_name' => 'Agus Prasetyo', 'phone' => '089612344321'],
            [
                'applicant_name' => 'Agus Prasetyo',
                'phone' => '089612344321',
                'aid_type' => 'Pinjaman Modal Usaha Dagang',
                'address' => 'Jl. Kenanga No. 8, Cimahi',
                'description' => 'Mengajukan pinjaman modal untuk membuka warung kelontong.',
                'status' => 'rejected',
                'admin_note' => 'Program yayasan saat ini difokuskan untuk bantuan darurat kemanusiaan, medis dhuafa, dan pendidikan anak yatim.',
                'created_at' => now()->subDays(4),
            ]
        );

        // 6. Kerjasama / Kolaborasi (CollaborationRequests)
        // A. Pending - Siap ditinjau / disetujui / ditolak / kontak
        CollaborationRequest::firstOrCreate(
            ['institution_name' => 'PT Nusantara Sejahtera Berkelanjutan'],
            [
                'institution_name' => 'PT Nusantara Sejahtera Berkelanjutan',
                'email' => 'csr@nusantarasejahtera.co.id',
                'phone' => '081122334455',
                'collaboration_type' => 'Penyaluran CSR 500 Paket Sembako',
                'proposal_description' => 'Kami dari divisi CSR PT Nusantara Sejahtera Berkelanjutan ingin berkolaborasi menyalurkan alokasi dana sosial perusahaan berupa 500 paket sembako untuk masyarakat pra-sejahtera di wilayah Jabodetabek dan Jawa Barat.',
                'status' => 'pending',
                'admin_note' => null,
                'created_at' => now()->subHours(6),
            ]
        );

        // B. Reviewed - Siap disetujui / ditolak / kontak
        CollaborationRequest::firstOrCreate(
            ['institution_name' => 'Komunitas Relawan Muda Indonesia'],
            [
                'institution_name' => 'Komunitas Relawan Muda Indonesia',
                'email' => 'relawanmuda.id@gmail.com',
                'phone' => '085698761234',
                'collaboration_type' => 'Pelatihan Relawan & Aksi Tanggap Bencana',
                'proposal_description' => 'Mengajak Sarana Berbagi sebagai mitra strategis dalam penyelenggaraan bootcamp tanggap bencana bagi 100 pemuda relawan.',
                'status' => 'reviewed',
                'admin_note' => 'Proposal telah ditinjau tim kemitraan. Sedang menjadwalkan online meeting koordinasi detail teknis kegiatan.',
                'created_at' => now()->subDays(3),
            ]
        );

        // C. Approved
        CollaborationRequest::firstOrCreate(
            ['institution_name' => 'Yayasan Lentera Bangsa Mandiri'],
            [
                'institution_name' => 'Yayasan Lentera Bangsa Mandiri',
                'email' => 'info@lenterabangsa.org',
                'phone' => '081287654321',
                'collaboration_type' => 'Program Beasiswa Santri Tahfidz Dhuafa',
                'proposal_description' => 'Program bersama pendampingan belajar dan penyediaan beasiswa pembinaan santri berprestasi.',
                'status' => 'approved',
                'admin_note' => 'MoU kerjasama resmi ditandatangani. Program mulai berjalan periode September 2026.',
                'created_at' => now()->subDays(7),
            ]
        );

        // 7. Lowongan Kerja (JobVacancies)
        $job1 = JobVacancy::firstOrCreate(
            ['slug' => 'fundraising-partnership-officer'],
            [
                'title' => 'Fundraising & Partnership Officer',
                'description' => '<p>Bertanggung jawab membangun kemitraan strategis dengan korporat, komunitas, dan donatur lembaga.</p>',
                'requirements' => '<p>- Pendidikan min. S1 segala jurusan<br>- Pengalaman min. 1-2 tahun di bidang NGO / CSR / Marketing<br>- Kemampuan komunikasi dan negosiasi yang baik</p>',
                'location' => 'Jakarta Selatan / Hybrid',
                'employment_type' => 'fulltime',
                'deadline' => now()->addDays(30),
                'status' => 'open',
            ]
        );

        $job2 = JobVacancy::firstOrCreate(
            ['slug' => 'graphic-designer-content-creator'],
            [
                'title' => 'Graphic Designer & Content Creator',
                'description' => '<p>Membuat konten kreatif digital, poster program donasi, dan video dokumentasi penyaluran bantuan.</p>',
                'requirements' => '<p>- Menguasai Adobe Photoshop, Illustrator, Premiere / CapCut<br>- Kreatif dan up-to-date dengan tren media sosial<br>- Memiliki portfolio desain</p>',
                'location' => 'Bandung / Remote',
                'employment_type' => 'fulltime',
                'deadline' => now()->addDays(20),
                'status' => 'open',
            ]
        );

        $job3 = JobVacancy::firstOrCreate(
            ['slug' => 'relawan-lapangan-distribusi-logistik'],
            [
                'title' => 'Relawan Lapangan Distribusi Logistik',
                'description' => '<p>Membantu tim operasional dalam pengepakan dan penyaluran langsung bantuan ke lokasi penerima manfaat.</p>',
                'requirements' => '<p>- Fisik sehat dan memiliki jiwa sosial tinggi<br>- Bersedia terjun ke lapangan / pelosok daerah</p>',
                'location' => 'Jabodetabek & Jabar',
                'employment_type' => 'volunteer',
                'deadline' => now()->addDays(60),
                'status' => 'open',
            ]
        );

        // 8. Lamaran Masuk (JobApplications)
        // A. Pending - Siap ditinjau (Review) / interview / terima / tolak / kontak
        JobApplication::firstOrCreate(
            ['applicant_name' => 'Dimas Ardiansyah, S.Sos', 'job_vacancy_id' => $job1->id],
            [
                'job_vacancy_id' => $job1->id,
                'applicant_name' => 'Dimas Ardiansyah, S.Sos',
                'email' => 'dimas.ardiansyah@gmail.com',
                'phone' => '081298765001',
                'cv_file' => 'applications/cv/sample_cv_dimas.pdf',
                'cover_letter' => 'Dengan pengalaman 2 tahun di bidang kemitraan CSR dan penggalangan dana sosial, saya berminat untuk mendedikasikan keahlian saya bersama Sarana Berbagi.',
                'status' => 'pending',
                'created_at' => now()->subHours(3),
            ]
        );

        // B. Review - Siap dijadwalkan interview / terima / tolak / kontak
        JobApplication::firstOrCreate(
            ['applicant_name' => 'Clarissa Putri, S.Ds', 'job_vacancy_id' => $job2->id],
            [
                'job_vacancy_id' => $job2->id,
                'applicant_name' => 'Clarissa Putri, S.Ds',
                'email' => 'clarissa.design@gmail.com',
                'phone' => '085711229988',
                'cv_file' => 'applications/cv/sample_cv_clarissa.pdf',
                'cover_letter' => 'Saya adalah lulusan DKV yang memiliki ketertarikan tinggi dalam menciptakan materi visual bermakna untuk menggerakkan kepedulian masyarakat.',
                'status' => 'review',
                'created_at' => now()->subDays(1),
            ]
        );

        // C. Interview - Siap diterima / tolak / kontak
        JobApplication::firstOrCreate(
            ['applicant_name' => 'Rian Pratama', 'job_vacancy_id' => $job1->id],
            [
                'job_vacancy_id' => $job1->id,
                'applicant_name' => 'Rian Pratama',
                'email' => 'rian.pratama@gmail.com',
                'phone' => '081377889900',
                'cv_file' => 'applications/cv/sample_cv_rian.pdf',
                'cover_letter' => 'Memiliki pengalaman 3 tahun dalam menjalin relasi kelembagaan publik dan sponsorship event nasional.',
                'status' => 'interview',
                'created_at' => now()->subDays(3),
            ]
        );

        // D. Accepted
        JobApplication::firstOrCreate(
            ['applicant_name' => 'Bayu Setiawan', 'job_vacancy_id' => $job3->id],
            [
                'job_vacancy_id' => $job3->id,
                'applicant_name' => 'Bayu Setiawan',
                'email' => 'bayu.relawan@gmail.com',
                'phone' => '089865432100',
                'cv_file' => 'applications/cv/sample_cv_bayu.pdf',
                'cover_letter' => 'Siap berkontribusi aktif dan terjun langsung mendistribusikan bantuan kepada masyarakat yang membutuhkan.',
                'status' => 'accepted',
                'created_at' => now()->subDays(4),
            ]
        );
    }
}
