@props(['step' => 1])

<!-- Progress Steps Component -->
<div class="flex items-center justify-center mb-12">
    {{-- Step 1 --}}
    <div class="flex items-center">
        <div class="w-10 h-10 rounded-full {{ $step >= 1 ? 'bg-primary text-white font-bold' : 'bg-outline-variant text-on-surface-variant' }} flex items-center justify-center">
            @if ($step > 1)
                <span class="material-symbols-outlined text-[20px]">check</span>
            @else
                1
            @endif
        </div>
        <span class="ml-2 {{ $step >= 1 ? 'text-primary font-semibold' : 'text-on-surface-variant' }}">Data Diri</span>
    </div>

    {{-- Line 1-2 --}}
    <div class="w-12 md:w-16 h-1 {{ $step >= 2 ? 'bg-primary' : 'bg-outline-variant' }} mx-2 md:mx-4"></div>

    {{-- Step 2 --}}
    <div class="flex items-center">
        <div class="w-10 h-10 rounded-full {{ $step >= 2 ? 'bg-primary text-white font-bold' : 'bg-outline-variant text-on-surface-variant font-bold' }} flex items-center justify-center">
            @if ($step > 2)
                <span class="material-symbols-outlined text-[20px]">check</span>
            @else
                2
            @endif
        </div>
        <span class="ml-2 {{ $step >= 2 ? 'text-primary font-semibold' : 'text-on-surface-variant' }}">Pembayaran</span>
    </div>

    {{-- Line 2-3 --}}
    <div class="w-12 md:w-16 h-1 {{ $step >= 3 ? 'bg-primary' : 'bg-outline-variant' }} mx-2 md:mx-4"></div>

    {{-- Step 3 --}}
    <div class="flex items-center">
        <div class="w-10 h-10 rounded-full {{ $step >= 3 ? 'bg-primary text-white font-bold' : 'bg-outline-variant text-on-surface-variant font-bold' }} flex items-center justify-center">
            3
        </div>
        <span class="ml-2 {{ $step >= 3 ? 'text-primary font-semibold' : 'text-on-surface-variant' }}">Konfirmasi</span>
    </div>
</div>
