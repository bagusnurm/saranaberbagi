@php
    $navLinks = [
        ['url' => '/', 'label' => 'Tentang Kami', 'pattern' => '/'],
        ['url' => '/program', 'label' => 'Program', 'pattern' => 'program*'],
        ['url' => '/kabar', 'label' => 'Kabar', 'pattern' => 'kabar*'],
        ['url' => '/berita', 'label' => 'Berita', 'pattern' => 'berita*'],
        ['url' => '/karir', 'label' => 'Karir', 'pattern' => 'karir*'],
        ['url' => '/kolaborasi', 'label' => 'Kolaborasi', 'pattern' => 'kolaborasi*'],
    ];
@endphp

<nav class="fixed top-0 w-full z-50 bg-surface/95 backdrop-blur-md border-b border-outline-variant/30 shadow-sm transition-all duration-300">
    <div class="max-w-container-max mx-auto px-margin-desktop flex justify-between items-center h-20">
        {{-- Logo --}}
        <div class="flex items-center gap-4">
            <a class="flex items-center" href="{{ url('/') }}">
                <img alt="Sarana Berbagi Logo" class="h-28 w-auto object-contain"
                    src="{{ asset('img/logo-sarana-berbagi.png') }}">
            </a>
        </div>

        {{-- Desktop Navigation Links --}}
        <div class="hidden lg:flex items-center gap-6">
            @foreach ($navLinks as $item)
                @php
                    $isActive = ($item['pattern'] === '/') ? Request::is('/') : Request::is($item['pattern']);
                @endphp
                <a class="{{ $isActive ? 'text-primary font-semibold border-b-2 border-primary pb-1' : 'text-on-surface-variant hover:text-primary' }} transition-colors hover:bg-surface-container-low rounded-lg px-3 py-2 active:scale-95 duration-200 font-body-md text-body-md"
                    href="{{ url($item['url']) }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </div>

        {{-- Action Buttons: Login / Dashboard & Donasi --}}
        <div class="flex items-center gap-3">
            @guest
                {{-- Tombol Masuk / Login --}}
                <a href="{{ url('/auth/login') }}"
                    class="inline-flex items-center gap-1.5 text-primary border border-primary/40 hover:bg-primary hover:text-white font-label-sm text-label-sm px-4 py-2.5 rounded-lg transition-all active:scale-95 font-semibold">
                    <span class="material-symbols-outlined text-[18px]">login</span>
                    <span>Masuk</span>
                </a>
            @else
                {{-- Dropdown / Dashboard Info --}}
                <div class="relative" id="userMenuContainer">
                    <button type="button" id="userMenuBtn"
                        aria-haspopup="true" aria-expanded="false" aria-controls="userDropdown"
                        class="flex items-center gap-2 bg-surface-container-low hover:bg-surface-container border border-outline-variant/40 px-3 py-2 rounded-lg text-left transition-colors">
                        <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-xs uppercase">
                            {{ mb_substr(auth()->user()->name, 0, 1) }}
                        </div>
                        <div class="hidden sm:block text-xs">
                            <p class="font-semibold text-on-surface leading-tight truncate max-w-[120px]">{{ auth()->user()->name }}</p>
                        </div>
                        <span class="material-symbols-outlined text-base text-on-surface-variant">arrow_drop_down</span>
                    </button>

                    {{-- User Dropdown Menu --}}
                    <div id="userDropdown"
                        class="hidden absolute right-0 mt-2 w-52 bg-surface-container-lowest rounded-xl shadow-xl border border-outline-variant/30 py-2 z-50 animate-fadeIn">
                        <div class="px-4 py-2 border-b border-outline-variant/20">
                            <p class="text-sm font-semibold text-on-surface truncate">{{ auth()->user()->name }}</p>
                            <p class="text-xs text-on-surface-variant truncate">{{ auth()->user()->email }}</p>
                        </div>

                        {{-- Link ke Dashboard Panel jika memiliki role yang diizinkan --}}
                        @if (auth()->user()->canAccessAdminPanel())
                            <a href="{{ url('/berbagi') }}"
                                class="flex items-center gap-2 px-4 py-2.5 text-sm text-on-surface hover:bg-surface-container-low hover:text-primary transition-colors">
                                <span class="material-symbols-outlined text-[18px]">dashboard</span>
                                <span>Dashboard Panel</span>
                            </a>
                        @endif

                        {{-- Form Logout --}}
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit"
                                class="w-full flex items-center gap-2 px-4 py-2.5 text-sm text-error hover:bg-error-container/20 transition-colors text-left font-medium">
                                <span class="material-symbols-outlined text-[18px]">logout</span>
                                <span>Keluar</span>
                            </button>
                        </form>
                    </div>
                </div>
            @endguest

            {{-- Tombol Donasi --}}
            <a class="bg-accent text-on-accent font-label-sm text-label-sm px-5 py-2.5 rounded-lg hover:bg-accent-hover transition-colors shadow-sm active:scale-95 font-semibold shrink-0"
                href="{{ url('/donasi') }}">
                Donasi
            </a>

            {{-- Mobile hamburger button --}}
            <button type="button" id="mobile-menu-btn"
                aria-haspopup="true" aria-expanded="false" aria-controls="mobile-menu"
                class="lg:hidden text-on-surface-variant hover:text-primary p-2 focus:outline-none"
                aria-label="Toggle menu">
                <span class="material-symbols-outlined text-2xl">menu</span>
            </button>
        </div>
    </div>

    {{-- Mobile Menu Dropdown --}}
    <div id="mobile-menu" class="hidden lg:hidden bg-surface border-t border-outline-variant/30 px-6 py-4 space-y-3">
        @foreach ($navLinks as $item)
            @php
                $isActive = ($item['pattern'] === '/') ? Request::is('/') : Request::is($item['pattern']);
            @endphp
            <a class="block py-2 text-on-surface-variant hover:text-primary {{ $isActive ? 'font-bold text-primary' : '' }}"
                href="{{ url($item['url']) }}">
                {{ $item['label'] }}
            </a>
        @endforeach

        <div class="pt-3 border-t border-outline-variant/20 flex flex-col gap-2">
            @guest
                <a href="{{ url('/auth/login') }}"
                    class="flex items-center justify-center gap-2 w-full py-2.5 text-center text-primary border border-primary/40 rounded-lg font-semibold text-sm">
                    <span class="material-symbols-outlined text-[18px]">login</span>
                    <span>Masuk ke Akun</span>
                </a>
            @else
                <div class="flex items-center gap-2 py-2">
                    <div class="w-8 h-8 rounded-full bg-primary text-white flex items-center justify-center font-bold text-xs uppercase">
                        {{ mb_substr(auth()->user()->name, 0, 1) }}
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-on-surface">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-on-surface-variant truncate">{{ auth()->user()->email }}</p>
                    </div>
                </div>

                @if (auth()->user()->canAccessAdminPanel())
                    <a href="{{ url('/berbagi') }}"
                        class="flex items-center gap-2 py-2 text-primary font-semibold text-sm">
                        <span class="material-symbols-outlined text-[18px]">dashboard</span>
                        <span>Buka Dashboard Panel</span>
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit"
                        class="flex items-center gap-2 text-error font-medium text-sm py-1.5">
                        <span class="material-symbols-outlined text-[18px]">logout</span>
                        <span>Keluar (Logout)</span>
                    </button>
                </form>
            @endguest
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileBtn && mobileMenu) {
            mobileBtn.addEventListener('click', function() {
                const isHidden = mobileMenu.classList.toggle('hidden');
                mobileBtn.setAttribute('aria-expanded', (!isHidden).toString());
            });
        }

        const userBtn = document.getElementById('userMenuBtn');
        const userDropdown = document.getElementById('userDropdown');
        if (userBtn && userDropdown) {
            userBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                const isHidden = userDropdown.classList.toggle('hidden');
                userBtn.setAttribute('aria-expanded', (!isHidden).toString());
            });

            document.addEventListener('click', function(e) {
                if (!userDropdown.contains(e.target) && !userBtn.contains(e.target)) {
                    userDropdown.classList.add('hidden');
                    userBtn.setAttribute('aria-expanded', 'false');
                }
            });
        }
    });
</script>
