@php
    // Layout split-screen khusus Login & Register.
    // Dibungkus <x-filament-panels::layout.base> supaya tetap dapat semua
    // asset/dark-mode/notifikasi bawaan Filament — cuma strukturnya yang
    // diganti dari "card di tengah" jadi 2 kolom.
    // Catatan: {{ $slot }} di bawah SUDAH termasuk logo + heading +
    // subheading bawaan (dirender oleh view Login/Register aslinya), jadi
    // di sini kita TIDAK perlu render logo lagi di sisi kanan — cukup di
    // sisi kiri (branding) pakai logo putih.
    $livewire ??= null;
@endphp

<x-filament-panels::layout.base :livewire="$livewire">
    <div class="fi-split-auth-layout">

        {{-- Kolom kiri: branding SaranaBerbagi — disembunyikan di layar kecil --}}
        <div class="fi-split-auth-branding">
            <div class="fi-split-auth-blob fi-split-auth-blob-1" aria-hidden="true"></div>
            <div class="fi-split-auth-blob fi-split-auth-blob-2" aria-hidden="true"></div>

            <div class="fi-split-auth-logo">
                {{-- Logo putih khusus dipakai di sini karena background gradient
                     teal — logo brand default (teal) kontrasnya rendah. Sesuaikan
                     path kalau lokasi file gambar kamu bukan public/images/. --}}
                <img src="{{ asset('images/LogoPutih.png') }}" alt="SaranaBerbagi" class="fi-split-auth-logo-img">
            </div>

            <div class="fi-split-auth-copy">
                <h2 class="fi-split-auth-heading">
                    {{ __('Satu langkah kecil darimu, berarti besar bagi mereka yang membutuhkan.') }}
                </h2>
                <p class="fi-split-auth-subheading">
                    {{ __('Bergabunglah bersama SaranaBerbagi dan jadilah bagian dari gerakan kebaikan yang sedang berjalan.') }}
                </p>
            </div>

            <p class="fi-split-auth-footer">
                &copy; {{ now()->year }} SaranaBerbagi
            </p>
        </div>

        {{-- Kolom kanan: form Login / Register, dibungkus card --}}
        <div class="fi-split-auth-panel">
            <div class="fi-split-auth-panel-inner">
                {{-- Tombol Kembali ke Beranda --}}
                <a href="{{ url('/') }}" class="fi-split-auth-back-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
                    <span>Kembali ke Beranda</span>
                </a>

                <div class="fi-split-auth-card">
                    {{ $slot }}
                </div>
            </div>
        </div>

    </div>

    <style>
        /* ==================================================================
           Struktur layout split-screen (Login & Register)
           ================================================================== */
        .fi-split-auth-layout {
            display: grid;
            min-height: 100vh;
            grid-template-columns: 1fr;
        }

        @media (min-width: 1024px) {
            .fi-split-auth-layout {
                grid-template-columns: 1fr 1fr;
            }
        }

        .fi-split-auth-branding {
            display: none;
            position: relative;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
            padding: 3rem;
            background: linear-gradient(160deg, rgb(20 184 166) 0%, rgb(13 148 136) 100%);
            color: #fff;
        }

        @media (min-width: 1024px) {
            .fi-split-auth-branding {
                display: flex;
            }
        }

        .fi-split-auth-blob {
            position: absolute;
            border-radius: 9999px;
            background: rgb(255 255 255 / 0.1);
            filter: blur(60px);
            pointer-events: none;
        }

        .fi-split-auth-blob-1 {
            width: 18rem;
            height: 18rem;
            top: -5rem;
            left: -5rem;
        }

        .fi-split-auth-blob-2 {
            width: 20rem;
            height: 20rem;
            bottom: -6rem;
            right: -3rem;
        }

        .fi-split-auth-logo {
            position: relative;
            z-index: 1;
            width: fit-content;
        }

        .fi-split-auth-logo-img {
            height: 2.5rem;
            width: auto;
        }

        .fi-split-auth-copy {
            position: relative;
            z-index: 1;
            max-width: 26rem;
        }

        .fi-split-auth-heading {
            font-size: 1.75rem;
            font-weight: 600;
            line-height: 1.35;
        }

        .fi-split-auth-subheading {
            margin-top: 1rem;
            color: rgb(255 255 255 / 0.85);
        }

        .fi-split-auth-footer {
            position: relative;
            z-index: 1;
            font-size: 0.875rem;
            color: rgb(255 255 255 / 0.7);
        }

        .fi-split-auth-panel {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1.5rem;
            background: rgb(249 250 251);
        }

        .fi-split-auth-panel-inner {
            width: 100%;
            max-width: 26rem;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .fi-split-auth-back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.875rem;
            font-weight: 500;
            color: rgb(107 114 128);
            text-decoration: none;
            transition: color 0.15s ease;
            width: fit-content;
        }

        .fi-split-auth-back-link:hover {
            color: rgb(13 148 136);
        }

        .dark .fi-split-auth-panel {
            background: rgb(3 7 18);
        }

        /* Box/card form-nya — ini yang sebelumnya kelewat */
        .fi-split-auth-card {
            width: 100%;
            max-width: 26rem;
            border-radius: 1rem;
            border: 1px solid rgb(0 0 0 / 0.05);
            box-shadow: 0 10px 30px -10px rgb(0 0 0 / 0.08);
            background: #fff;
            padding: 3rem 2rem;
        }

        .dark .fi-split-auth-card {
            background: rgb(17 24 39);
            border-color: rgb(255 255 255 / 0.1);
        }

        /* ==================================================================
           Tema teal untuk halaman auth — berlaku di:
           1. .fi-simple-layout .fi-simple-main   → halaman auth lain yang
              masih pakai layout bawaan (Lupa Password, Verifikasi Email)
           2. .fi-split-auth-panel                → Login & Register
           ================================================================== */
        .fi-simple-header-subheading a.fi-link {
            font-weight: 600;
            text-decoration: underline;
            text-underline-offset: 3px;
            transition: color 0.15s ease;
        }

        .fi-simple-header-subheading a.fi-link:hover {
            color: rgb(13 148 136);
        }

        .fi-simple-layout .fi-simple-main {
            border-radius: 1rem;
            box-shadow: 0 10px 30px -10px rgb(0 0 0 / 0.08);
            border: 1px solid rgb(0 0 0 / 0.05);
        }

        .fi-simple-layout .fi-simple-main .fi-fo-field-label,
        .fi-split-auth-panel .fi-fo-field-label {
            font-weight: 600;
            font-size: 0.875rem;
            margin-bottom: 0.375rem;
        }

        .fi-simple-layout .fi-simple-main .fi-input,
        .fi-split-auth-panel .fi-input {
            border-radius: 0.65rem;
            border-color: rgb(0 0 0 / 0.1);
            padding-top: 0.65rem;
            padding-bottom: 0.65rem;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        .fi-simple-layout .fi-simple-main .fi-input:focus,
        .fi-split-auth-panel .fi-input:focus {
            border-color: rgb(20 184 166);
            box-shadow: 0 0 0 3px rgb(20 184 166 / 0.15);
        }

        .fi-simple-layout .fi-simple-main .fi-input-wrp,
        .fi-split-auth-panel .fi-input-wrp {
            border-radius: 0.65rem;
        }

        .fi-simple-layout .fi-simple-main .fi-input-wrp:focus-within,
        .fi-split-auth-panel .fi-input-wrp:focus-within {
            box-shadow: 0 0 0 3px rgb(20 184 166 / 0.15);
            border-color: rgb(20 184 166) !important;
        }

        .fi-checkbox-input:checked {
            background-color: rgb(20 184 166);
            border-color: rgb(20 184 166);
        }

        .fi-simple-layout .fi-simple-main .fi-btn,
        .fi-split-auth-panel .fi-btn {
            border-radius: 0.65rem;
            padding-top: 0.7rem;
            padding-bottom: 0.7rem;
            font-weight: 600;
            transition: transform 0.1s ease, box-shadow 0.15s ease;
        }

        .fi-simple-layout .fi-simple-main .fi-btn:hover,
        .fi-split-auth-panel .fi-btn:hover {
            box-shadow: 0 6px 16px -4px rgb(20 184 166 / 0.4);
        }

        .fi-simple-layout .fi-simple-main .fi-btn:active,
        .fi-split-auth-panel .fi-btn:active {
            transform: scale(0.98);
        }

        .fi-simple-layout .fi-simple-main .fi-fo-field-wrp,
        .fi-split-auth-panel .fi-fo-field-wrp {
            margin-bottom: 0.25rem;
        }
    </style>
</x-filament-panels::layout.base>
