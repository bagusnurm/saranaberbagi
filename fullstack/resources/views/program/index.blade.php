@extends('layouts.app')

@section('title', 'Program Kebaikan Kami - Sarana Berbagi')

@section('content')
    <div class="pt-6 pb-section-padding px-margin-desktop max-w-container-max mx-auto w-full">
        {{-- Hero Header --}}
        @include('program.components.hero-section')

        {{-- Daftar Program Grid --}}
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
            @include('program.components.daftar-program', ['campaigns' => $campaigns])
        </section>
    </div>

    {{-- Modal Doa & Komentar Program --}}
    @include('program.components.modal-komentar')
@endsection
