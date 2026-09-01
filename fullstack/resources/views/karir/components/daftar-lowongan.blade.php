<!-- Lowongan Terbuka Section -->
<div class="mb-16" id="daftar-lowongan">
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="font-h2 text-h2 text-on-surface flex items-center gap-3">
                <span class="material-symbols-outlined text-primary text-3xl">work</span>
                Lowongan Terbuka
            </h2>
            <p class="text-sm text-on-surface-variant mt-1">
                Temukan peran yang tepat untuk berkontribusi bersama kami
            </p>
        </div>

        {{-- Filter Tipe Pekerjaan --}}
        <div class="flex flex-wrap items-center gap-2">
            <a href="{{ url('/karir#daftar-lowongan') }}"
                class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ empty($selectedType) ? 'bg-primary text-white shadow-sm' : 'bg-surface-container hover:bg-surface-container-high text-on-surface' }}">
                Semua
            </a>
            <a href="{{ url('/karir?type=fulltime#daftar-lowongan') }}"
                class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $selectedType === 'fulltime' ? 'bg-primary text-white shadow-sm' : 'bg-surface-container hover:bg-surface-container-high text-on-surface' }}">
                Full-time
            </a>
            <a href="{{ url('/karir?type=parttime#daftar-lowongan') }}"
                class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $selectedType === 'parttime' ? 'bg-primary text-white shadow-sm' : 'bg-surface-container hover:bg-surface-container-high text-on-surface' }}">
                Part-time
            </a>
            <a href="{{ url('/karir?type=volunteer#daftar-lowongan') }}"
                class="px-4 py-2 rounded-xl text-xs font-bold transition-all {{ $selectedType === 'volunteer' ? 'bg-primary text-white shadow-sm' : 'bg-surface-container hover:bg-surface-container-high text-on-surface' }}">
                Relawan / Volunteer
            </a>
        </div>
    </div>

    {{-- Grid Lowongan --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($vacancies as $vacancy)
            @php
                $typeBadge = match ($vacancy->employment_type) {
                    'fulltime' => ['label' => 'Full-time', 'class' => 'bg-primary-container text-on-primary-container'],
                    'parttime' => ['label' => 'Part-time', 'class' => 'bg-secondary-container text-on-secondary-container'],
                    'volunteer' => ['label' => 'Volunteer', 'class' => 'bg-tertiary-container text-on-tertiary-container'],
                    default => ['label' => ucfirst($vacancy->employment_type), 'class' => 'bg-surface-container text-on-surface'],
                };

                $icon = match (true) {
                    str_contains(strtolower($vacancy->title), 'developer') || str_contains(strtolower($vacancy->title), 'tech') || str_contains(strtolower($vacancy->title), 'it') => 'code',
                    str_contains(strtolower($vacancy->title), 'design') || str_contains(strtolower($vacancy->title), 'content') || str_contains(strtolower($vacancy->title), 'creator') => 'palette',
                    str_contains(strtolower($vacancy->title), 'marketing') || str_contains(strtolower($vacancy->title), 'fundraising') => 'campaign',
                    str_contains(strtolower($vacancy->title), 'admin') || str_contains(strtolower($vacancy->title), 'finance') => 'account_balance',
                    str_contains(strtolower($vacancy->title), 'relawan') || str_contains(strtolower($vacancy->title), 'logistik') => 'volunteer_activism',
                    default => 'work',
                };
            @endphp

            <div class="bg-surface-container-lowest rounded-3xl p-6 md:p-8 shadow-[0_4px_20px_rgba(15,23,42,0.05)] hover:shadow-[0_12px_32px_rgba(15,23,42,0.08)] transition-all duration-300 border border-outline-variant/20 flex flex-col justify-between group">
                <div>
                    <div class="flex items-center justify-between mb-6">
                        <div class="w-12 h-12 bg-primary-container rounded-2xl flex items-center justify-center text-primary group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-2xl">{{ $icon }}</span>
                        </div>
                        <span class="inline-block {{ $typeBadge['class'] }} text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                            {{ $typeBadge['label'] }}
                        </span>
                    </div>

                    <a href="{{ route('karir.show', $vacancy->slug) }}" class="block group-hover:text-primary transition-colors">
                        <h3 class="font-h3 text-xl font-bold text-on-surface mb-2 line-clamp-2 group-hover:text-primary transition-colors">
                            {{ $vacancy->title }}
                        </h3>
                    </a>

                    <div class="flex flex-wrap items-center gap-3 text-xs text-on-surface-variant mb-4">
                        <span class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-[15px] text-primary">location_on</span>
                            <span>{{ $vacancy->location ?? 'Indonesia' }}</span>
                        </span>
                        @if ($vacancy->deadline)
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-[15px] text-amber-600">event</span>
                                <span>Deadline: {{ $vacancy->deadline->locale('id')->isoFormat('D MMMM Y') }}</span>
                            </span>
                        @endif
                    </div>

                    <p class="font-body-md text-sm text-on-surface-variant mb-6 line-clamp-3 leading-relaxed">
                        {{ Str::limit(strip_tags($vacancy->description), 140) }}
                    </p>
                </div>

                <div class="space-y-2.5 pt-4 border-t border-outline-variant/20">
                    <a href="{{ route('karir.show', $vacancy->slug) }}"
                        class="block w-full border-2 border-primary text-primary hover:bg-primary hover:text-white font-label-sm text-xs py-3 rounded-xl transition-all font-bold text-center active:scale-95">
                        Lihat Detail Posisi
                    </a>
                    <button type="button"
                        onclick="document.getElementById('posisiSelect').value = '{{ $vacancy->id }}'; document.getElementById('form-lamaran').scrollIntoView({ behavior: 'smooth' });"
                        class="block w-full bg-[#F59E0B] hover:bg-[#D97706] text-white font-label-sm text-xs py-3 rounded-xl transition-all shadow-sm font-bold text-center active:scale-95">
                        Lamar Posisi Ini
                    </button>
                </div>
            </div>
        @empty
            <div class="col-span-full py-16 text-center bg-surface-container-lowest rounded-3xl border border-outline-variant/20">
                <span class="material-symbols-outlined text-5xl text-outline-variant mb-3">work_off</span>
                <h3 class="font-h3 text-xl text-on-surface mb-2 font-bold">Belum Ada Lowongan Terbuka</h3>
                <p class="text-sm text-on-surface-variant max-w-md mx-auto">
                    Saat ini belum ada posisi yang sesuai dengan filter yang Anda pilih. Silakan pantau kembali secara berkala.
                </p>
            </div>
        @endforelse
    </div>
</div>
