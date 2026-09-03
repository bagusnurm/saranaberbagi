<footer class="bg-primary text-white w-full">
    {{-- Striped pattern accent --}}
    <div class="h-6 w-full opacity-20"
        style="background-image: repeating-linear-gradient(45deg, transparent, transparent 10px, #ffffff 10px, #ffffff 20px);">
    </div>

    <div class="px-margin-desktop py-12 max-w-container-max mx-auto">
        {{-- Top Info Row --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-12 border-b border-white/20 pb-8">
            <div class="flex flex-col gap-2">
                <p class="font-bold text-sm tracking-wider uppercase">SK KEMENKUMHAM : AHU-0000643.AH.01.05. Tahun 2016</p>
                <p class="font-bold text-sm tracking-wider uppercase">SK DINAS SOSIAL : 400.3.6.6 / 5212 / Daysos</p>
            </div>
            <div class="flex items-center gap-3">
                <img alt="Sarana Berbagi Logo" class="h-28 w-auto object-contain"
                    src="{{ asset('img/logo-sarana-berbagi.png') }}"
                    loading="lazy" />
                <span class="font-h2 text-xl font-bold tracking-tight uppercase leading-tight">SARANA<br>BERBAGI</span>
            </div>
        </div>

        {{-- Main Footer Content --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 md:gap-8">
            {{-- Tentang Kami Column --}}
            <div class="flex flex-col gap-4 text-center md:text-left items-center md:items-start">
                <h3 class="font-h2 text-2xl font-bold mb-2">Tentang Kami</h3>
                <p class="font-body-md text-sm leading-relaxed text-white/90">
                    saranaberbagi.or.id merupakan platform website donasi online yang dikelola langsung di bawah
                    naungan Yayasan Sarana Berbagi yang bergerak di Bidang Sosial, Pendidikan, Kemanusiaan, dan Keagamaan. 
                    Berdiri semenjak tahun 2016, Yayasan Sarana Berbagi telah berkontribusi dalam program-program sosial 
                    untuk menjembatani sekaligus berkontribusi pada kemaslahatan umat.
                </p>
            </div>

            {{-- Disclaimer Column --}}
            <div class="flex flex-col gap-8 text-center items-center">
                <div class="flex flex-col gap-3 items-center">
                    <p class="font-body-md text-sm leading-relaxed text-white/90 max-w-xs">
                        Sarana Berbagi adalah lembaga profesional berlokasi di Kota Bandung yang bergerak di bidang
                        sosial dan pendidikan.
                    </p>
                </div>
                <div class="flex flex-col gap-4 items-center">
                    <h3 class="font-h2 text-2xl font-bold">Disclaimer</h3>
                    <p class="font-body-md text-sm leading-relaxed text-white/90 max-w-xs">
                        Dana yang didonasikan melalui Yayasan Sarana Berbagi bukan bersumber dan bukan untuk tujuan
                        pencucian uang (Money Laundering), termasuk terorisme maupun kejahatan lainnya.
                    </p>
                </div>
            </div>

            {{-- Alamat & Kontak Column --}}
            <div class="flex flex-col gap-6">
                <h3 class="font-h2 text-2xl font-bold">Alamat & Kontak</h3>
                <div class="flex flex-col gap-4">
                    <div class="flex items-center gap-3 text-sm">
                        <span class="material-symbols-outlined text-white">chat</span>
                        <span>0818-0953-1647</span>
                    </div>
                    <div class="flex items-center gap-3 text-sm">
                        <span class="material-symbols-outlined text-white">mail</span>
                        <span>yayasansaranaberbagi@gmail.com</span>
                    </div>
                    <div class="flex items-start gap-3 text-sm">
                        <span class="material-symbols-outlined text-white shrink-0 mt-1">location_on</span>
                        <p class="leading-relaxed">
                            Komplek Griya Bandung Indah Blok F 19 No 10 RT 08 RW 08 Desa Buahbatu Kecamatan Bojongsoang<br>
                            Kabupaten Bandung, Jawa Barat<br>
                            40287, Indonesia
                        </p>
                    </div>
                </div>

                {{-- Map Location Embed / Preview --}}
                <div class="w-full h-32 bg-gray-200 rounded overflow-hidden mt-2 relative">
                    <img alt="Map Location"
                        class="w-full h-full object-cover grayscale opacity-80 mix-blend-multiply"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDwbSQ6aKCbEBC-2X0avJDgu_xHWPfpejdw63Vq29Ju1OnI9kQ7sdNeVM0QhAWMPZxAI7Q9c85Bibj3m43pJGdiHRLeh8zOwx0eCI9OEWvAngbnFxy13LUrWGztCteJaNjS-kMLtQcoVeQqMBHecOSdYd9uHJoh18xyFL6l-kj9-SRRjOVH5p4O_k62Oq8Jy2Dyt5tCFQx4xN5F-UlRTRV2ZO-BS-wafarPP5HzQ6lgfI3iQg0UmZoVrw"
                        loading="lazy">
                    <a href="https://maps.google.com/?q=Komplek+Griya+Bandung+Indah+Blok+F+19+No+10+Bojongsoang+Bandung" 
                       target="_blank" rel="noopener noreferrer" 
                       class="absolute inset-0 flex items-center justify-center bg-black/30 hover:bg-black/40 text-white text-xs font-semibold uppercase tracking-wider transition-colors">
                        Buka di Google Maps
                    </a>
                </div>
            </div>
        </div>

        {{-- Bottom Copyright Row --}}
        <div class="mt-12 pt-6 border-t border-white/10 text-center text-xs text-white/70">
            &copy; {{ date('Y') }} Wakaf Al-Qur’an: Satu Mushaf, Sejuta Pahala Tanpa Putus.
        </div>
    </div>
</footer>
