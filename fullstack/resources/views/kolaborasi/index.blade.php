@extends('layouts.app')

@section('title', 'Platform Tumbuh Bersama & Pengajuan Bantuan - Sarana Berbagi')

@section('content')
<div class="bg-surface py-12 md:py-16">
    <div class="max-w-container-max mx-auto px-4 sm:px-6 lg:px-margin-desktop">

        {{-- Section 1: Hero Header --}}
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h1 class="font-h1 text-3xl md:text-5xl font-bold text-on-surface tracking-tight mb-4">
                Platform Tumbuh Bersama
            </h1>
            <p class="font-body-md text-base md:text-lg text-on-surface-variant leading-relaxed">
                Tumbuhkan kolaborasi kebaikan dengan Platform digital <strong>Sarana Berbagi</strong>. Kami mengintegrasikan berbagai program pemberdayaan melalui ekosistem digital yang transparan dan berdampak luas.
            </p>
        </div>

        {{-- Section 2: Ekosistem Kebaikan (Mind Map Card) --}}
        <div class="bg-surface-container-lowest border border-outline-variant/30 rounded-2xl shadow-sm p-6 md:p-10 mb-16 transition-all hover:shadow-md">
            <div class="text-center max-w-2xl mx-auto mb-8">
                <h2 class="font-h2 text-2xl md:text-3xl font-bold text-on-surface mb-2">
                    Ekosistem Kebaikan
                </h2>
                <p class="text-sm md:text-base text-on-surface-variant">
                    Menghubungkan program pemberdayaan, mitra afiliasi, dan donatur melalui satu platform terpadu.
                </p>
            </div>

            <div class="relative overflow-hidden rounded-xl bg-surface-container-low/40 border border-outline-variant/20 p-2 md:p-6 flex items-center justify-center">
                <img 
                    src="{{ asset('img/mind-map.png') }}" 
                    alt="Platform Tumbuh Bersama - Mind Map Ekosistem Kebaikan" 
                    class="w-full max-w-4xl h-auto object-contain mx-auto rounded-lg shadow-sm hover:scale-[1.01] transition-transform duration-300"
                    loading="lazy"
                />
            </div>
        </div>

        {{-- Section 3: Banner Pengajuan Bantuan Program --}}
        <div class="bg-primary text-white rounded-t-2xl px-6 md:px-10 py-6 shadow-sm">
            <h2 class="font-h2 text-2xl md:text-3xl font-bold tracking-tight mb-1">
                Pengajuan Bantuan Program
            </h2>
            <p class="text-white/85 text-sm md:text-base">
                Panduan lengkap prosedur dan persyaratan untuk mengajukan kolaborasi program bantuan.
            </p>
        </div>

        {{-- Section 4: Grid Prosedur & Syarat Ketentuan --}}
        <div class="bg-surface-container-lowest border-x border-b border-outline-variant/30 rounded-b-2xl p-6 md:p-10 shadow-sm mb-16">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10">
                
                {{-- Left Column: Prosedur & Jenis Layanan --}}
                <div class="lg:col-span-5 flex flex-col gap-6">
                    
                    {{-- Prosedur Card --}}
                    <div class="bg-surface-container-low/40 border border-outline-variant/30 rounded-xl p-6">
                        <div class="flex items-center gap-2 mb-5 text-primary">
                            <span class="material-symbols-outlined text-2xl">account_tree</span>
                            <h3 class="font-h3 text-lg font-bold text-on-surface">Prosedur Pengajuan</h3>
                        </div>

                        <div class="space-y-4">
                            {{-- Step 1 --}}
                            <div class="flex items-start gap-3.5">
                                <div class="w-7 h-7 rounded-full bg-primary/10 text-primary font-bold text-xs flex items-center justify-center shrink-0 mt-0.5 border border-primary/20">
                                    1
                                </div>
                                <div>
                                    <h4 class="font-semibold text-sm text-on-surface">Pengisian Formulir</h4>
                                    <p class="text-xs text-on-surface-variant leading-relaxed mt-0.5">
                                        Pemohon melengkapi data diri dan detail kebutuhan pada form pengajuan online.
                                    </p>
                                </div>
                            </div>

                            {{-- Step 2 --}}
                            <div class="flex items-start gap-3.5">
                                <div class="w-7 h-7 rounded-full bg-primary/10 text-primary font-bold text-xs flex items-center justify-center shrink-0 mt-0.5 border border-primary/20">
                                    2
                                </div>
                                <div>
                                    <h4 class="font-semibold text-sm text-on-surface">Verifikasi Data</h4>
                                    <p class="text-xs text-on-surface-variant leading-relaxed mt-0.5">
                                        Tim kami akan melakukan validasi dokumen dan survei lokasi jika diperlukan.
                                    </p>
                                </div>
                            </div>

                            {{-- Step 3 --}}
                            <div class="flex items-start gap-3.5">
                                <div class="w-7 h-7 rounded-full bg-primary/10 text-primary font-bold text-xs flex items-center justify-center shrink-0 mt-0.5 border border-primary/20">
                                    3
                                </div>
                                <div>
                                    <h4 class="font-semibold text-sm text-on-surface">Persetujuan</h4>
                                    <p class="text-xs text-on-surface-variant leading-relaxed mt-0.5">
                                        Pemberitahuan hasil verifikasi melalui email atau WhatsApp terdaftar.
                                    </p>
                                </div>
                            </div>

                            {{-- Step 4 --}}
                            <div class="flex items-start gap-3.5">
                                <div class="w-7 h-7 rounded-full bg-primary/10 text-primary font-bold text-xs flex items-center justify-center shrink-0 mt-0.5 border border-primary/20">
                                    4
                                </div>
                                <div>
                                    <h4 class="font-semibold text-sm text-on-surface">Penyaluran Bantuan</h4>
                                    <p class="text-xs text-on-surface-variant leading-relaxed mt-0.5">
                                        Proses distribusi bantuan sesuai dengan program yang disetujui.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Jenis Layanan Bantuan Card --}}
                    <div class="bg-surface-container-low/40 border border-outline-variant/30 rounded-xl p-6">
                        <div class="flex items-center gap-2 mb-4 text-primary">
                            <span class="material-symbols-outlined text-2xl">category</span>
                            <h3 class="font-h3 text-lg font-bold text-on-surface">Jenis Layanan Bantuan</h3>
                        </div>

                        <div class="flex flex-col gap-2.5">
                            <div class="flex items-center gap-3 bg-surface-container-lowest border border-outline-variant/20 px-3.5 py-2.5 rounded-lg text-xs md:text-sm font-medium text-on-surface text-opacity-90">
                                <span class="material-symbols-outlined text-primary text-lg">school</span>
                                <span>Pendidikan</span>
                            </div>
                            <div class="flex items-center gap-3 bg-surface-container-lowest border border-outline-variant/20 px-3.5 py-2.5 rounded-lg text-xs md:text-sm font-medium text-on-surface text-opacity-90">
                                <span class="material-symbols-outlined text-primary text-lg">health_and_safety</span>
                                <span>Kesehatan</span>
                            </div>
                            <div class="flex items-center gap-3 bg-surface-container-lowest border border-outline-variant/20 px-3.5 py-2.5 rounded-lg text-xs md:text-sm font-medium text-on-surface text-opacity-90">
                                <span class="material-symbols-outlined text-primary text-lg">shopping_basket</span>
                                <span>Pangan / Sembako</span>
                            </div>
                            <div class="flex items-center gap-3 bg-surface-container-lowest border border-outline-variant/20 px-3.5 py-2.5 rounded-lg text-xs md:text-sm font-medium text-on-surface text-opacity-90">
                                <span class="material-symbols-outlined text-primary text-lg">payments</span>
                                <span>Pemberdayaan Ekonomi</span>
                            </div>
                            <div class="flex items-center gap-3 bg-surface-container-lowest border border-outline-variant/20 px-3.5 py-2.5 rounded-lg text-xs md:text-sm font-medium text-on-surface text-opacity-90">
                                <span class="material-symbols-outlined text-primary text-lg">crisis_alert</span>
                                <span>Bencana Alam</span>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Right Column: Syarat & Ketentuan + Persetujuan Checkbox --}}
                <div class="lg:col-span-7 flex flex-col justify-between gap-6">
                    
                    {{-- S&K Box --}}
                    <div class="bg-surface-container-low/40 border border-outline-variant/30 rounded-xl p-6 md:p-8">
                        <div class="flex items-center gap-2 mb-4 text-primary">
                            <span class="material-symbols-outlined text-2xl">gavel</span>
                            <h3 class="font-h3 text-lg md:text-xl font-bold text-on-surface">Syarat dan Ketentuan</h3>
                        </div>

                        <p class="text-xs md:text-sm text-on-surface-variant mb-4 leading-relaxed">
                            Dengan mengajukan permohonan bantuan melalui platform Sarana Berbagi, Anda menyetujui syarat dan ketentuan berikut:
                        </p>

                        <ul class="space-y-3 text-xs md:text-sm text-on-surface-variant leading-relaxed list-disc pl-5">
                            <li>Pemohon wajib memberikan informasi dan dokumen yang sebenar-benarnya dan dapat dipertanggungjawabkan secara hukum.</li>
                            <li>Bantuan ditujukan untuk individu, keluarga, atau komunitas yang benar-benar membutuhkan (masuk dalam kategori asnaf/penerima manfaat sesuai kebijakan lembaga).</li>
                            <li>Sarana Berbagi berhak melakukan verifikasi lapangan (survei) secara langsung atau melalui mitra terpercaya sebelum memutuskan persetujuan bantuan.</li>
                            <li>Persetujuan pengajuan bantuan sepenuhnya merupakan hak prerogatif Sarana Berbagi, disesuaikan dengan ketersediaan dana program terkait.</li>
                            <li>Pemohon bersedia mendokumentasikan penerimaan bantuan dan memberikan laporan perkembangan (jika bantuan bersifat program berlanjut) sebagai bentuk transparansi kepada donatur.</li>
                            <li>Data pribadi yang dikumpulkan akan dijaga kerahasiaannya dan hanya digunakan untuk keperluan proses verifikasi dan pelaporan internal lembaga sesuai dengan Kebijakan Privasi kami.</li>
                        </ul>
                    </div>

                    {{-- Persetujuan & Tombol Lanjutkan --}}
                    <div class="bg-surface-container-low/60 border border-outline-variant/40 rounded-xl p-6">
                        <label class="flex items-start gap-3 cursor-pointer select-none">
                            <input 
                                type="checkbox" 
                                id="termsCheckbox"
                                class="mt-1 w-5 h-5 rounded border-outline-variant/60 text-primary focus:ring-primary/30 transition cursor-pointer"
                            >
                            <span class="text-xs md:text-sm text-on-surface font-medium leading-relaxed">
                                Saya menyatakan bahwa data yang akan saya isi adalah benar dan menyetujui seluruh syarat & ketentuan pengajuan bantuan di atas.
                            </span>
                        </label>

                        <div class="mt-6 flex justify-end">
                            <button 
                                type="button" 
                                id="proceedBtn" 
                                disabled
                                class="inline-flex items-center gap-2 bg-primary text-white font-semibold text-sm px-6 py-3 rounded-lg opacity-50 cursor-not-allowed transition-all duration-200 shadow-sm hover:bg-primary-container active:scale-95"
                            >
                                <span>LANJUTKAN KE FORM PENGAJUAN</span>
                                <span class="material-symbols-outlined text-lg">arrow_forward</span>
                            </button>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        {{-- Section 5: Formulir Pengajuan Bantuan (Interaktif) --}}
        <div id="formSection" class="scroll-mt-28 transition-all duration-300">
            
            {{-- Flash Alert Sukses --}}
            @if (session('success'))
                <div class="mb-8 p-5 bg-emerald-50 border border-emerald-300 rounded-xl text-emerald-900 shadow-sm flex items-start gap-4">
                    <span class="material-symbols-outlined text-emerald-600 text-3xl shrink-0">check_circle</span>
                    <div class="flex-1 text-sm md:text-base leading-relaxed">
                        <h4 class="font-bold text-emerald-950 text-base mb-1">Pengajuan Berhasil Dikirim!</h4>
                        {!! session('success') !!}
                    </div>
                </div>
            @endif

            {{-- Flash Alert Error --}}
            @if (session('error'))
                <div class="mb-8 p-5 bg-red-50 border border-red-300 rounded-xl text-red-900 shadow-sm flex items-start gap-4">
                    <span class="material-symbols-outlined text-red-600 text-3xl shrink-0">error</span>
                    <div class="flex-1 text-sm md:text-base leading-relaxed">
                        <h4 class="font-bold text-red-950 text-base mb-1">Terjadi Kendala</h4>
                        {{ session('error') }}
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-8 p-5 bg-red-50 border border-red-300 rounded-xl text-red-900 shadow-sm">
                    <div class="flex items-center gap-2 mb-2 font-bold text-red-950">
                        <span class="material-symbols-outlined text-red-600">report</span>
                        <span>Mohon lengkapi atau perbaiki beberapa kolom berikut:</span>
                    </div>
                    <ul class="list-disc pl-6 text-xs md:text-sm space-y-1">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-surface-container-lowest border border-outline-variant/30 rounded-2xl shadow-sm overflow-hidden">
                
                {{-- Form Header --}}
                <div class="bg-surface-container-low/70 border-b border-outline-variant/30 px-6 md:px-10 py-6 flex flex-col md:flex-row md:items-center justify-between gap-4">
                    <div>
                        <div class="inline-flex items-center gap-2 text-primary text-xs md:text-sm font-semibold uppercase tracking-wider mb-1">
                            <span class="material-symbols-outlined text-lg">edit_document</span>
                            <span>Formulir Pengajuan Bantuan</span>
                        </div>
                        <h3 class="font-h2 text-xl md:text-2xl font-bold text-on-surface">
                            Data Permohonan Bantuan Kemanusiaan
                        </h3>
                        <p class="text-xs md:text-sm text-on-surface-variant mt-1">
                            Pastikan data pemohon, rekening, dan berkas identitas yang diunggah valid dan terbaca jelas.
                        </p>
                    </div>
                </div>

                {{-- Form Body --}}
                <form action="{{ route('kolaborasi.store') }}" method="POST" enctype="multipart/form-data" class="p-6 md:p-10 space-y-10" id="aidRequestForm">
                    @csrf

                    {{-- 1. Pilihan Program / Campaign --}}
                    <div>
                        <div class="flex items-center gap-2 text-primary font-bold text-base mb-4 pb-2 border-b border-outline-variant/20">
                            <span class="material-symbols-outlined">volunteer_activism</span>
                            <span>1. Pilihan Program Bantuan</span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label for="campaign_id" class="block text-xs md:text-sm font-semibold text-on-surface mb-2">
                                    Pilih Program / Campaign Bantuan <span class="text-on-surface-variant font-normal">(Opsional, jika ditujukan untuk program spesifik)</span>
                                </label>
                                <select 
                                    name="campaign_id" 
                                    id="campaign_id"
                                    class="w-full rounded-xl border-outline-variant/40 bg-surface-container-lowest text-on-surface text-sm py-3 px-4 focus:ring-primary focus:border-primary transition"
                                >
                                    <option value="">-- Bantuan Umum / Belum Terikat Program Spesifik --</option>
                                    @foreach ($campaigns as $camp)
                                        <option value="{{ $camp->id }}" {{ old('campaign_id') == $camp->id ? 'selected' : '' }}>
                                            {{ $camp->title }}
                                        </option>
                                    @endforeach
                                </select>
                                <p class="text-xs text-on-surface-variant mt-1.5">
                                    Pilih campaign yang relevan dengan kebutuhan Anda (misal: Sembako, Pengobatan Jantung, Al-Qur'an, dll).
                                </p>
                            </div>
                        </div>
                    </div>

                    {{-- 2. Data Pemohon / Penerima Manfaat --}}
                    <div>
                        <div class="flex items-center gap-2 text-primary font-bold text-base mb-4 pb-2 border-b border-outline-variant/20">
                            <span class="material-symbols-outlined">person</span>
                            <span>2. Data Pemohon & Penerima Manfaat</span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Nama Lengkap --}}
                            <div>
                                <label for="applicant_name" class="block text-xs md:text-sm font-semibold text-on-surface mb-2">
                                    Nama Lengkap Pemohon <span class="text-error">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="applicant_name" 
                                    id="applicant_name"
                                    value="{{ old('applicant_name') }}"
                                    required
                                    placeholder="Contoh: Ahmad Subagja"
                                    class="w-full rounded-xl border-outline-variant/40 bg-surface-container-lowest text-on-surface text-sm py-3 px-4 focus:ring-primary focus:border-primary transition"
                                >
                            </div>

                            {{-- Nomor WhatsApp / HP --}}
                            <div>
                                <label for="phone" class="block text-xs md:text-sm font-semibold text-on-surface mb-2">
                                    Nomor WhatsApp / HP Aktif <span class="text-error">*</span>
                                </label>
                                <input 
                                    type="tel" 
                                    name="phone" 
                                    id="phone"
                                    value="{{ old('phone') }}"
                                    required
                                    placeholder="Contoh: 081234567890"
                                    class="w-full rounded-xl border-outline-variant/40 bg-surface-container-lowest text-on-surface text-sm py-3 px-4 focus:ring-primary focus:border-primary transition"
                                >
                            </div>

                            {{-- NIK --}}
                            <div>
                                <label for="nik" class="block text-xs md:text-sm font-semibold text-on-surface mb-2">
                                    Nomor Induk Kependudukan (NIK 16 Digit) <span class="text-error">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="nik" 
                                    id="nik"
                                    maxlength="16"
                                    value="{{ old('nik') }}"
                                    required
                                    placeholder="3204xxxxxxxxxxxx"
                                    class="w-full rounded-xl border-outline-variant/40 bg-surface-container-lowest text-on-surface text-sm py-3 px-4 focus:ring-primary focus:border-primary transition"
                                >
                            </div>

                            {{-- Nomor KK --}}
                            <div>
                                <label for="kk_number" class="block text-xs md:text-sm font-semibold text-on-surface mb-2">
                                    Nomor Kartu Keluarga (KK 16 Digit) <span class="text-error">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="kk_number" 
                                    id="kk_number"
                                    maxlength="16"
                                    value="{{ old('kk_number') }}"
                                    required
                                    placeholder="3204xxxxxxxxxxxx"
                                    class="w-full rounded-xl border-outline-variant/40 bg-surface-container-lowest text-on-surface text-sm py-3 px-4 focus:ring-primary focus:border-primary transition"
                                >
                            </div>

                            {{-- Tanggal Lahir --}}
                            <div>
                                <label for="birthdate" class="block text-xs md:text-sm font-semibold text-on-surface mb-2">
                                    Tanggal Lahir <span class="text-error">*</span>
                                </label>
                                <input 
                                    type="date" 
                                    name="birthdate" 
                                    id="birthdate"
                                    value="{{ old('birthdate') }}"
                                    required
                                    class="w-full rounded-xl border-outline-variant/40 bg-surface-container-lowest text-on-surface text-sm py-3 px-4 focus:ring-primary focus:border-primary transition"
                                >
                            </div>

                            {{-- Jenis Kelamin --}}
                            <div>
                                <label for="gender" class="block text-xs md:text-sm font-semibold text-on-surface mb-2">
                                    Jenis Kelamin <span class="text-error">*</span>
                                </label>
                                <select 
                                    name="gender" 
                                    id="gender"
                                    required
                                    class="w-full rounded-xl border-outline-variant/40 bg-surface-container-lowest text-on-surface text-sm py-3 px-4 focus:ring-primary focus:border-primary transition"
                                >
                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                    <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Laki-laki (Pria)</option>
                                    <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Perempuan (Wanita)</option>
                                </select>
                            </div>

                            {{-- Status Perkawinan --}}
                            <div>
                                <label for="marital_status" class="block text-xs md:text-sm font-semibold text-on-surface mb-2">
                                    Status Perkawinan <span class="text-error">*</span>
                                </label>
                                <select 
                                    name="marital_status" 
                                    id="marital_status"
                                    required
                                    class="w-full rounded-xl border-outline-variant/40 bg-surface-container-lowest text-on-surface text-sm py-3 px-4 focus:ring-primary focus:border-primary transition"
                                >
                                    <option value="">-- Pilih Status Perkawinan --</option>
                                    <option value="belum_menikah" {{ old('marital_status') === 'belum_menikah' ? 'selected' : '' }}>Belum Menikah</option>
                                    <option value="menikah" {{ old('marital_status') === 'menikah' ? 'selected' : '' }}>Menikah</option>
                                    <option value="cerai_hidup" {{ old('marital_status') === 'cerai_hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                    <option value="cerai_mati" {{ old('marital_status') === 'cerai_mati' ? 'selected' : '' }}>Cerai Mati</option>
                                </select>
                            </div>

                            {{-- Pekerjaan --}}
                            <div>
                                <label for="occupation" class="block text-xs md:text-sm font-semibold text-on-surface mb-2">
                                    Pekerjaan Saat Ini
                                </label>
                                <input 
                                    type="text" 
                                    name="occupation" 
                                    id="occupation"
                                    value="{{ old('occupation') }}"
                                    placeholder="Contoh: Buruh Harian / Pedagang / Tidak Bekerja"
                                    class="w-full rounded-xl border-outline-variant/40 bg-surface-container-lowest text-on-surface text-sm py-3 px-4 focus:ring-primary focus:border-primary transition"
                                >
                            </div>

                            {{-- Mualaf Status --}}
                            <div class="md:col-span-2 flex items-center gap-3 bg-surface-container-low/40 p-4 rounded-xl border border-outline-variant/20">
                                <input 
                                    type="checkbox" 
                                    name="is_mualaf" 
                                    id="is_mualaf" 
                                    value="1"
                                    {{ old('is_mualaf') ? 'checked' : '' }}
                                    class="w-5 h-5 rounded border-outline-variant/60 text-primary focus:ring-primary/30 transition cursor-pointer"
                                >
                                <label for="is_mualaf" class="text-xs md:text-sm text-on-surface font-medium cursor-pointer">
                                    Pemohon / Penerima Manfaat adalah seorang <strong>Mualaf</strong>
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- 3. Alamat Domisili --}}
                    <div>
                        <div class="flex items-center gap-2 text-primary font-bold text-base mb-4 pb-2 border-b border-outline-variant/20">
                            <span class="material-symbols-outlined">location_on</span>
                            <span>3. Alamat Domisili Lengkap</span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            {{-- Provinsi --}}
                            <div>
                                <label for="province" class="block text-xs md:text-sm font-semibold text-on-surface mb-2">
                                    Provinsi <span class="text-error">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="province" 
                                    id="province"
                                    value="{{ old('province', 'Jawa Barat') }}"
                                    required
                                    placeholder="Contoh: Jawa Barat"
                                    class="w-full rounded-xl border-outline-variant/40 bg-surface-container-lowest text-on-surface text-sm py-3 px-4 focus:ring-primary focus:border-primary transition"
                                >
                            </div>

                            {{-- Kota / Kabupaten --}}
                            <div>
                                <label for="city" class="block text-xs md:text-sm font-semibold text-on-surface mb-2">
                                    Kota / Kabupaten <span class="text-error">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="city" 
                                    id="city"
                                    value="{{ old('city', 'Kabupaten Bandung') }}"
                                    required
                                    placeholder="Contoh: Kabupaten Bandung"
                                    class="w-full rounded-xl border-outline-variant/40 bg-surface-container-lowest text-on-surface text-sm py-3 px-4 focus:ring-primary focus:border-primary transition"
                                >
                            </div>

                            {{-- Kelurahan / Desa / Kecamatan --}}
                            <div>
                                <label for="village" class="block text-xs md:text-sm font-semibold text-on-surface mb-2">
                                    Kecamatan & Kelurahan / Desa <span class="text-error">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="village" 
                                    id="village"
                                    value="{{ old('village') }}"
                                    required
                                    placeholder="Contoh: Bojongsoang, Buahbatu"
                                    class="w-full rounded-xl border-outline-variant/40 bg-surface-container-lowest text-on-surface text-sm py-3 px-4 focus:ring-primary focus:border-primary transition"
                                >
                            </div>
                        </div>

                        {{-- Alamat Lengkap Detail --}}
                        <div>
                            <label for="address" class="block text-xs md:text-sm font-semibold text-on-surface mb-2">
                                Alamat Lengkap (Jalan, RT/RW, No. Rumah, Patokan) <span class="text-error">*</span>
                            </label>
                            <textarea 
                                name="address" 
                                id="address" 
                                rows="3"
                                required
                                placeholder="Contoh: Komplek Griya Bandung Indah Blok F19 No 10 RT 08 RW 08..."
                                class="w-full rounded-xl border-outline-variant/40 bg-surface-container-lowest text-on-surface text-sm py-3 px-4 focus:ring-primary focus:border-primary transition leading-relaxed"
                            >{{ old('address') }}</textarea>
                        </div>
                    </div>

                    {{-- 4. Kebutuhan Bantuan & Rincian Rekening --}}
                    <div>
                        <div class="flex items-center gap-2 text-primary font-bold text-base mb-4 pb-2 border-b border-outline-variant/20">
                            <span class="material-symbols-outlined">payments</span>
                            <span>4. Kebutuhan Biaya & Rincian Rekening</span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            {{-- Nominal Kebutuhan Biaya --}}
                            <div>
                                <label for="fund_needed" class="block text-xs md:text-sm font-semibold text-on-surface mb-2">
                                    Nominal Kebutuhan Bantuan (Rp) <span class="text-error">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm font-bold text-on-surface-variant">Rp</span>
                                    <input 
                                        type="number" 
                                        name="fund_needed" 
                                        id="fund_needed"
                                        min="10000"
                                        step="1000"
                                        value="{{ old('fund_needed') }}"
                                        required
                                        placeholder="5000000"
                                        class="w-full rounded-xl border-outline-variant/40 bg-surface-container-lowest text-on-surface text-sm py-3 pl-12 pr-4 focus:ring-primary focus:border-primary transition font-medium"
                                    >
                                </div>
                            </div>

                            {{-- Nama Bank --}}
                            <div>
                                <label for="bank_name" class="block text-xs md:text-sm font-semibold text-on-surface mb-2">
                                    Nama Bank / E-Wallet <span class="text-error">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="bank_name" 
                                    id="bank_name"
                                    value="{{ old('bank_name') }}"
                                    required
                                    placeholder="Contoh: Bank Syariah Indonesia (BSI) / BCA / Mandiri / BRI"
                                    class="w-full rounded-xl border-outline-variant/40 bg-surface-container-lowest text-on-surface text-sm py-3 px-4 focus:ring-primary focus:border-primary transition"
                                >
                            </div>

                            {{-- Nomor Rekening --}}
                            <div>
                                <label for="bank_account_number" class="block text-xs md:text-sm font-semibold text-on-surface mb-2">
                                    Nomor Rekening <span class="text-error">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="bank_account_number" 
                                    id="bank_account_number"
                                    value="{{ old('bank_account_number') }}"
                                    required
                                    placeholder="Contoh: 7123456789"
                                    class="w-full rounded-xl border-outline-variant/40 bg-surface-container-lowest text-on-surface text-sm py-3 px-4 focus:ring-primary focus:border-primary transition"
                                >
                            </div>

                            {{-- Atas Nama Rekening --}}
                            <div>
                                <label for="bank_account_holder" class="block text-xs md:text-sm font-semibold text-on-surface mb-2">
                                    Nama Pemilik Rekening <span class="text-error">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    name="bank_account_holder" 
                                    id="bank_account_holder"
                                    value="{{ old('bank_account_holder') }}"
                                    required
                                    placeholder="Sesuai buku tabungan pemohon"
                                    class="w-full rounded-xl border-outline-variant/40 bg-surface-container-lowest text-on-surface text-sm py-3 px-4 focus:ring-primary focus:border-primary transition"
                                >
                            </div>
                        </div>

                        {{-- Deskripsi / Cerita Kebutuhan --}}
                        <div>
                            <label for="description" class="block text-xs md:text-sm font-semibold text-on-surface mb-2">
                                Detail Kondisi & Alasan Pengajuan Bantuan <span class="text-error">*</span>
                            </label>
                            <textarea 
                                name="description" 
                                id="description" 
                                rows="4"
                                required
                                placeholder="Ceritakan riwayat penyakit, situasi ekonomi keluarga, atau rincian penggunaan biaya yang dibutuhkan secara transparan..."
                                class="w-full rounded-xl border-outline-variant/40 bg-surface-container-lowest text-on-surface text-sm py-3 px-4 focus:ring-primary focus:border-primary transition leading-relaxed"
                            >{{ old('description') }}</textarea>
                        </div>
                    </div>

                    {{-- 5. Berkas & Dokumen Pendukung --}}
                    <div>
                        <div class="flex items-center gap-2 text-primary font-bold text-base mb-4 pb-2 border-b border-outline-variant/20">
                            <span class="material-symbols-outlined">attach_file</span>
                            <span>5. Berkas & Dokumen Pendukung</span>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Foto Pendukung --}}
                            <div>
                                <label class="block text-xs md:text-sm font-semibold text-on-surface mb-1.5">
                                    Upload Foto Pendukung <span class="text-on-surface-variant font-normal">(KTP / KK / Surat Keterangan / Foto Kondisi)</span>
                                </label>
                                <p class="text-xs text-on-surface-variant mb-2.5">
                                    Bisa pilih beberapa foto sekaligus (Format: JPG, PNG, WEBP. Maks 5MB per berkas).
                                </p>
                                <input 
                                    type="file" 
                                    name="photos[]" 
                                    id="photos"
                                    multiple
                                    accept="image/jpeg,image/png,image/jpg,image/webp"
                                    class="block w-full text-xs text-on-surface-variant
                                        file:mr-4 file:py-2.5 file:px-4
                                        file:rounded-xl file:border-0
                                        file:text-xs file:font-semibold
                                        file:bg-primary/10 file:text-primary
                                        hover:file:bg-primary/20
                                        cursor-pointer"
                                >
                            </div>

                            {{-- Video Pendukung --}}
                            <div>
                                <label class="block text-xs md:text-sm font-semibold text-on-surface mb-1.5">
                                    Upload Video Pendukung <span class="text-on-surface-variant font-normal">(Opsional)</span>
                                </label>
                                <p class="text-xs text-on-surface-variant mb-2.5">
                                    Format: MP4, MOV. Maksimal 20MB.
                                </p>
                                <input 
                                    type="file" 
                                    name="videos[]" 
                                    id="videos"
                                    multiple
                                    accept="video/mp4,video/quicktime"
                                    class="block w-full text-xs text-on-surface-variant
                                        file:mr-4 file:py-2.5 file:px-4
                                        file:rounded-xl file:border-0
                                        file:text-xs file:font-semibold
                                        file:bg-primary/10 file:text-primary
                                        hover:file:bg-primary/20
                                        cursor-pointer"
                                >
                            </div>
                        </div>
                    </div>

                    {{-- Submit Button & Notes --}}
                    <div class="pt-6 border-t border-outline-variant/30 flex flex-col md:flex-row items-center justify-between gap-4">
                        <p class="text-xs text-on-surface-variant text-center md:text-left leading-relaxed">
                            <span class="material-symbols-outlined text-sm align-middle text-primary">verified_user</span>
                            Data Anda dijamin kerahasiaannya dan hanya digunakan untuk keperluan verifikasi penyaluran bantuan.
                        </p>

                        <button 
                            type="submit" 
                            id="submitBtn"
                            class="w-full md:w-auto inline-flex items-center justify-center gap-2 bg-primary text-white font-semibold text-sm md:text-base px-8 py-3.5 rounded-xl hover:bg-primary-container transition-all duration-200 shadow-md active:scale-95 shrink-0"
                        >
                            <span class="material-symbols-outlined">send</span>
                            <span>Kirim Pengajuan Bantuan</span>
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const termsCheckbox = document.getElementById('termsCheckbox');
        const proceedBtn = document.getElementById('proceedBtn');
        const formSection = document.getElementById('formSection');

        if (termsCheckbox && proceedBtn && formSection) {
            termsCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    proceedBtn.disabled = false;
                    proceedBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                } else {
                    proceedBtn.disabled = true;
                    proceedBtn.classList.add('opacity-50', 'cursor-not-allowed');
                }
            });

            proceedBtn.addEventListener('click', function() {
                if (!proceedBtn.disabled) {
                    formSection.scrollIntoView({ behavior: 'smooth' });
                    // Focus on first input
                    const firstInput = document.getElementById('campaign_id');
                    if (firstInput) {
                        setTimeout(() => firstInput.focus(), 600);
                    }
                }
            });
        }

        // Handle submit button loading state
        const form = document.getElementById('aidRequestForm');
        const submitBtn = document.getElementById('submitBtn');
        if (form && submitBtn) {
            form.addEventListener('submit', function() {
                submitBtn.disabled = true;
                submitBtn.classList.add('opacity-70', 'cursor-wait');
                submitBtn.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span>Memproses Pengajuan...</span>
                `;
            });
        }
    });
</script>
@endpush
