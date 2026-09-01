@extends('layouts.app')

@section('title', $vacancy->title . ' - Karir Sarana Berbagi')

@section('content')
    @php
        $typeBadge = match ($vacancy->employment_type) {
            'fulltime' => ['label' => 'Full-time', 'class' => 'bg-primary-container text-on-primary-container'],
            'parttime' => ['label' => 'Part-time', 'class' => 'bg-secondary-container text-on-secondary-container'],
            'volunteer' => ['label' => 'Volunteer / Relawan', 'class' => 'bg-tertiary-container text-on-tertiary-container'],
            default => ['label' => ucfirst($vacancy->employment_type), 'class' => 'bg-surface-container text-on-surface'],
        };
    @endphp

    <div class="pt-6 pb-section-padding px-margin-desktop max-w-container-max mx-auto w-full">
        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-on-surface-variant mb-6" aria-label="Breadcrumb">
            <a href="{{ url('/') }}" class="hover:text-primary transition-colors">Beranda</a>
            <span class="text-outline-variant">/</span>
            <a href="{{ url('/karir') }}" class="hover:text-primary transition-colors">Karir</a>
            <span class="text-outline-variant">/</span>
            <span class="text-on-surface font-semibold truncate max-w-xs md:max-w-md">{{ $vacancy->title }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">
            {{-- Main Column (Left, 8 Cols) --}}
            <div class="lg:col-span-8 space-y-8">
                {{-- Job Header Card --}}
                <div class="bg-surface-container-lowest rounded-3xl p-6 md:p-10 border border-outline-variant/30 shadow-sm space-y-4">
                    <div class="flex flex-wrap items-center gap-2 mb-2">
                        <span class="inline-block {{ $typeBadge['class'] }} text-xs font-bold px-3.5 py-1 rounded-full uppercase tracking-wider">
                            {{ $typeBadge['label'] }}
                        </span>
                        <span class="bg-surface-container text-on-surface text-xs font-semibold px-3 py-1 rounded-full flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm text-primary">location_on</span>
                            {{ $vacancy->location ?? 'Indonesia' }}
                        </span>
                        @if ($vacancy->deadline)
                            <span class="bg-amber-50 text-amber-800 border border-amber-200 text-xs font-semibold px-3 py-1 rounded-full flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm text-amber-600">event</span>
                                Deadline: {{ $vacancy->deadline->locale('id')->isoFormat('D MMMM Y') }}
                            </span>
                        @endif
                    </div>

                    <h1 class="font-h1 text-h2 md:text-h1 text-on-surface leading-tight">
                        {{ $vacancy->title }}
                    </h1>

                    <p class="text-xs text-on-surface-variant">
                        Dipublikasikan pada {{ $vacancy->created_at->locale('id')->isoFormat('D MMMM Y') }}
                    </p>
                </div>

                {{-- Deskripsi Pekerjaan --}}
                <div class="bg-surface-container-lowest rounded-3xl p-6 md:p-10 border border-outline-variant/30 shadow-sm space-y-6">
                    <h2 class="font-h3 text-h3 text-on-surface flex items-center gap-2.5 pb-4 border-b border-outline-variant/20">
                        <span class="material-symbols-outlined text-primary text-2xl">description</span>
                        Deskripsi Pekerjaan & Tanggung Jawab
                    </h2>

                    <div class="prose max-w-none text-on-surface-variant font-body-md text-base leading-relaxed space-y-4">
                        {!! $vacancy->description !!}
                    </div>
                </div>

                {{-- Kualifikasi / Persyaratan --}}
                @if (!empty($vacancy->requirements))
                    <div class="bg-surface-container-lowest rounded-3xl p-6 md:p-10 border border-outline-variant/30 shadow-sm space-y-6">
                        <h2 class="font-h3 text-h3 text-on-surface flex items-center gap-2.5 pb-4 border-b border-outline-variant/20">
                            <span class="material-symbols-outlined text-primary text-2xl">checklist</span>
                            Kualifikasi & Persyaratan
                        </h2>

                        <div class="prose max-w-none text-on-surface-variant font-body-md text-base leading-relaxed space-y-4">
                            {!! $vacancy->requirements !!}
                        </div>
                    </div>
                @endif

                {{-- Formulir Aplikasi Langsung --}}
                <div id="form-lamaran" class="bg-surface-container-lowest rounded-3xl p-6 md:p-10 border border-outline-variant/30 shadow-sm space-y-6">
                    <div class="pb-4 border-b border-outline-variant/20">
                        <h2 class="font-h3 text-h3 text-on-surface flex items-center gap-2.5">
                            <span class="material-symbols-outlined text-primary text-2xl">send</span>
                            Lamar Posisi {{ $vacancy->title }}
                        </h2>
                        <p class="text-xs text-on-surface-variant mt-1">
                            Kirimkan informasi kontak dan resume CV Anda untuk posisi ini.
                        </p>
                    </div>

                    {{-- Flash Success Alert --}}
                    @if (session('success'))
                        <div class="p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-start gap-3 animate-fadeIn">
                            <span class="material-symbols-outlined text-emerald-600 text-2xl shrink-0">check_circle</span>
                            <div>
                                <p class="font-bold text-sm">Berhasil Dikirim!</p>
                                <p class="text-xs mt-0.5">{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    {{-- Validation Errors Alert --}}
                    @if ($errors->any())
                        <div class="p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-800 flex items-start gap-3">
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
                        <input type="hidden" name="job_vacancy_id" value="{{ $vacancy->id }}">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block font-label-sm text-label-sm text-on-surface mb-2 font-semibold">Nama Lengkap *</label>
                                <input type="text" name="nama" required
                                    value="{{ old('nama', auth()->user()?->name ?? '') }}"
                                    class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all text-sm"
                                    placeholder="Nama lengkap Anda">
                            </div>
                            <div>
                                <label class="block font-label-sm text-label-sm text-on-surface mb-2 font-semibold">Alamat Email *</label>
                                <input type="email" name="email" required
                                    value="{{ old('email', auth()->user()?->email ?? '') }}"
                                    class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all text-sm"
                                    placeholder="email@contoh.com">
                            </div>
                        </div>

                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface mb-2 font-semibold">Nomor WhatsApp / HP *</label>
                            <input type="tel" name="telepon" required
                                value="{{ old('telepon') }}"
                                class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all text-sm"
                                placeholder="08xxxxxxxxxx">
                        </div>

                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface mb-2 font-semibold">
                                Unggah CV / Resume (PDF, DOC, DOCX - Maks. 5MB) *
                            </label>
                            <input type="file" name="cv" accept=".pdf,.doc,.docx" required
                                class="w-full bg-surface border border-outline-variant rounded-xl py-2.5 px-4 font-body-md text-on-surface text-sm file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-primary-container file:text-on-primary-container hover:file:bg-primary-container/80 transition-all cursor-pointer">
                        </div>

                        <div>
                            <label class="block font-label-sm text-label-sm text-on-surface mb-2 font-semibold">Surat Pengantar / Catatan Singkat (Opsional)</label>
                            <textarea name="pesan" rows="4"
                                class="w-full bg-surface border border-outline-variant rounded-xl py-3 px-4 font-body-md text-on-surface focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all resize-none text-sm"
                                placeholder="Ceritakan keahlian relevan dan motivasi Anda melamar posisi ini...">{{ old('pesan') }}</textarea>
                        </div>

                        <button type="submit"
                            class="w-full bg-[#F59E0B] hover:bg-[#D97706] text-white font-label-sm text-base py-4 rounded-xl transition-all shadow-md active:scale-95 font-bold flex items-center justify-center gap-2">
                            <span class="material-symbols-outlined text-xl">send</span>
                            <span>Kirim Lamaran untuk Posisi Ini</span>
                        </button>
                    </form>
                </div>
            </div>

            {{-- Sidebar Column (Right, 4 Cols Sticky Desktop) --}}
            <div class="hidden lg:block lg:col-span-4 sticky top-28 space-y-6">
                <div class="bg-surface-container-lowest rounded-3xl p-6 md:p-8 border border-outline-variant/30 shadow-lg space-y-6">
                    <h3 class="font-h3 text-lg font-bold text-on-surface">Ringkasan Posisi</h3>

                    <div class="space-y-4 text-sm border-t border-b border-outline-variant/20 py-4">
                        <div class="flex justify-between items-center">
                            <span class="text-on-surface-variant">Tipe Pekerjaan</span>
                            <span class="font-bold text-on-surface">{{ $typeBadge['label'] }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-on-surface-variant">Lokasi</span>
                            <span class="font-bold text-on-surface">{{ $vacancy->location ?? 'Indonesia' }}</span>
                        </div>
                        @if ($vacancy->deadline)
                            <div class="flex justify-between items-center">
                                <span class="text-on-surface-variant">Batas Lamaran</span>
                                <span class="font-bold text-amber-700">{{ $vacancy->deadline->locale('id')->isoFormat('D MMMM Y') }}</span>
                            </div>
                        @endif
                    </div>

                    <a href="#form-lamaran"
                        class="block w-full bg-[#F59E0B] hover:bg-[#D97706] text-white font-label-sm text-base py-4 rounded-xl text-center font-bold shadow-md transition-all active:scale-95 flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined text-xl">send</span>
                        <span>Lamar Sekarang</span>
                    </a>

                    {{-- Share Karir --}}
                    <div class="pt-4 border-t border-outline-variant/20 text-center">
                        <p class="text-xs text-on-surface-variant mb-3">Bagikan info lowongan ini:</p>
                        <div class="flex items-center justify-center gap-3">
                            <a href="https://wa.me/?text={{ urlencode('Lowongan kerja ' . $vacancy->title . ' di Sarana Berbagi: ' . url()->current()) }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="w-10 h-10 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white flex items-center justify-center shadow transition-all hover:scale-105"
                                title="Bagikan ke WhatsApp">
                                <span class="material-symbols-outlined text-[18px]">chat</span>
                            </a>
                            <button type="button"
                                onclick="navigator.clipboard.writeText('{{ url()->current() }}'); alert('Tautan lowongan berhasil disalin!');"
                                class="w-10 h-10 rounded-full bg-surface-container hover:bg-surface-container-high text-on-surface flex items-center justify-center shadow border border-outline-variant/30 transition-all hover:scale-105"
                                title="Salin Tautan">
                                <span class="material-symbols-outlined text-[18px]">link</span>
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Other Vacancies Recommendation --}}
                @if ($otherVacancies->isNotEmpty())
                    <div class="bg-surface-container-lowest rounded-3xl p-6 border border-outline-variant/30 shadow-sm space-y-4">
                        <h3 class="font-h3 text-sm text-on-surface uppercase tracking-wider font-bold">Lowongan Lainnya</h3>
                        <div class="space-y-3">
                            @foreach ($otherVacancies as $other)
                                <a href="{{ route('karir.show', $other->slug) }}" class="block p-3.5 rounded-2xl bg-surface-container-low hover:bg-surface-container border border-outline-variant/20 transition-all group">
                                    <p class="text-xs font-bold text-on-surface group-hover:text-primary transition-colors line-clamp-2">{{ $other->title }}</p>
                                    <div class="flex items-center justify-between text-[11px] text-on-surface-variant mt-2 font-medium">
                                        <span class="capitalize">{{ $other->employment_type }}</span>
                                        <span>{{ $other->location ?? 'Indonesia' }}</span>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
