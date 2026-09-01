@extends('layouts.app')

@section('title', 'Karir & Relawan - Sarana Berbagi')

@section('content')
    {{-- Karir Hero / Banner Section --}}
    @include('karir.components.banner-section')

    <div class="py-section-padding px-margin-desktop max-w-container-max mx-auto w-full">
        {{-- Info Lokasi Kerja --}}
        @include('karir.components.lokasi-section')

        {{-- Daftar Lowongan Pekerjaan --}}
        @include('karir.components.daftar-lowongan', [
            'vacancies' => $vacancies,
            'selectedType' => $selectedType ?? null,
        ])

        {{-- Form Pengajuan Lamaran & Upload CV --}}
        @include('karir.components.form-lamaran', [
            'allOpenVacancies' => $allOpenVacancies,
        ])
    </div>
@endsection
