<!-- Form Lamaran Section -->
<section id="form-lamaran" class="pt-4">
    <div class="bg-surface-container-lowest rounded-3xl p-8 md:p-12 shadow-lg border border-outline-variant/20">
        <div class="max-w-2xl mx-auto">
            <div class="text-center mb-8">
                <span class="inline-flex items-center gap-1.5 bg-primary/10 text-primary font-bold text-xs px-3.5 py-1.5 rounded-full uppercase tracking-wider mb-3">
                    <span class="material-symbols-outlined text-sm">send</span> Formulir Aplikasi
                </span>
                <h2 class="font-h2 text-h2 text-on-surface mb-2">Kirim Lamaran Anda</h2>
                <p class="text-on-surface-variant text-sm">
                    Lengkapi data diri dan unggah resume/CV terbaik Anda untuk memulai perjalanan bersama Sarana Berbagi.
                </p>
            </div>

            {{-- Flash Success Alert --}}
            @if (session('success'))
                <div class="mb-8 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-start gap-3 animate-fadeIn">
                    <span class="material-symbols-outlined text-emerald-600 text-2xl shrink-0">check_circle</span>
                    <div>
                        <p class="font-bold text-sm">Berhasil Dikirim!</p>
                        <p class="text-xs mt-0.5">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            {{-- Validation Errors Alert --}}
            @if ($errors->any())
                <div class="mb-8 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 flex items-start gap-3">
                    <span class="material-symbols-outlined text-rose-600 text-2xl shrink-0">error</span>
                    <div>
                        <p class="font-bold text-sm">Mohon periksa kembali formulir Anda:</p>
                        <ul class="text-xs list-disc list-inside mt-1 space-y-0.5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="{{ route('karir.apply') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                {{-- Baris 1: Nama & Email --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface mb-2 font-semibold">Nama Lengkap *</label>
                        <input type="text" name="nama" required
                            value="{{ old('nama', auth()->user()?->name ?? '') }}"
                            class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all text-sm"
                            placeholder="Masukkan nama lengkap Anda">
                    </div>
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface mb-2 font-semibold">Alamat Email *</label>
                        <input type="email" name="email" required
                            value="{{ old('email', auth()->user()?->email ?? '') }}"
                            class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all text-sm"
                            placeholder="contoh@email.com">
                    </div>
                </div>

                {{-- Baris 2: Telepon & Posisi Lowongan --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface mb-2 font-semibold">Nomor WhatsApp / HP *</label>
                        <input type="tel" name="telepon" required
                            value="{{ old('telepon') }}"
                            class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all text-sm"
                            placeholder="08xxxxxxxxxx">
                    </div>
                    <div>
                        <label class="block font-label-sm text-label-sm text-on-surface mb-2 font-semibold">Posisi yang Dilamar *</label>
                        <select name="job_vacancy_id" id="posisiSelect" required
                            class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all text-sm">
                            <option value="">-- Pilih Posisi Lowongan --</option>
                            @foreach ($allOpenVacancies as $v)
                                <option value="{{ $v->id }}" {{ (old('job_vacancy_id', $preselectedVacancyId ?? '') == $v->id) ? 'selected' : '' }}>
                                    {{ $v->title }} ({{ ucfirst($v->employment_type) }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Upload CV / Resume --}}
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface mb-2 font-semibold">
                        Berkas CV / Resume (PDF, DOC, DOCX - Maks. 5MB) *
                    </label>
                    <input type="file" name="cv" accept=".pdf,.doc,.docx" required
                        class="w-full bg-surface border border-outline-variant rounded-xl py-2.5 px-4 font-body-md text-on-surface text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-primary-container file:text-on-primary-container hover:file:bg-primary-container/80 transition-all cursor-pointer">
                    <p class="text-xs text-on-surface-variant mt-1.5">Pastikan CV memuat informasi kontak dan pengalaman terkini Anda.</p>
                </div>

                {{-- Cover Letter / Pesan --}}
                <div>
                    <label class="block font-label-sm text-label-sm text-on-surface mb-2 font-semibold">Pesan / Surat Pengantar (Opsional)</label>
                    <textarea name="pesan" rows="4"
                        class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all resize-none text-sm"
                        placeholder="Ceritakan tentang diri Anda, motivasi, dan mengapa Anda tertarik bergabung bersama Sarana Berbagi...">{{ old('pesan') }}</textarea>
                </div>

                <button type="submit"
                    class="w-full bg-[#F59E0B] hover:bg-[#D97706] text-white font-label-sm text-base py-4 rounded-xl transition-all shadow-md active:scale-95 font-bold flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined text-xl">send</span>
                    <span>Kirim Berkas Lamaran</span>
                </button>
            </form>
        </div>
    </div>
</section>
