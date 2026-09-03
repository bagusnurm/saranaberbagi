{{-- Grid Daftar Program (Dinamis dari database) --}}
@forelse ($campaigns as $campaign)
    @php
        $badgeColors = [
            'bg-primary-container text-on-primary-container',
            'bg-secondary-container text-on-secondary-container',
            'bg-tertiary-container text-on-tertiary-container',
            'bg-error-container text-on-error-container',
        ];
        $badgeColor = $badgeColors[$loop->index % count($badgeColors)];
    @endphp

    <x-post-card :item="$campaign" route="program.show" :badgeColor="$badgeColor" />
@empty
    {{-- Empty State --}}
    <div class="col-span-full flex flex-col items-center justify-center py-20 text-center">
        <span class="material-symbols-outlined text-6xl text-outline-variant mb-4">volunteer_activism</span>
        <h3 class="font-h3 text-h3 text-on-surface mb-2">Belum Ada Program Aktif</h3>
        <p class="font-body-md text-body-md text-on-surface-variant max-w-md">
            Saat ini belum ada program yang tersedia. Silakan cek kembali nanti atau hubungi kami untuk informasi lebih lanjut.
        </p>
    </div>
@endforelse
