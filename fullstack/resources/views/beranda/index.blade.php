@extends('layouts.app')

@section('title', 'Tentang Kami - Sarana Berbagi')

@section('content')
    {{-- Hero Section --}}
    @include('beranda.components.hero-section')

    {{-- Visi & Misi Section --}}
    @include('beranda.components.visi-misi-section')

    {{-- Nilai Utama Section --}}
    @include('beranda.components.nilai-utama-section')

    {{-- Cerita / Sejarah Section --}}
    @include('beranda.components.cerita-section')

    {{-- Call To Action Section --}}
    @include('beranda.components.cta-section')
@endsection
