<!-- Detail Popup Modal -->
<div class="kabar-popup fixed inset-0 z-[100] flex items-center justify-center p-4 md:p-8" id="kabarPopup"
    style="opacity:0; visibility:hidden; transition: opacity 0.3s ease, visibility 0.3s ease;">
    <div class="absolute inset-0 bg-on-background/60 backdrop-blur-sm" onclick="closeBeritaPopup()"></div>
    <div class="relative bg-surface rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-y-auto"
        style="transform: translateY(20px) scale(0.98); transition: transform 0.3s ease;">
        <button
            class="absolute top-4 right-4 z-10 w-10 h-10 rounded-full bg-surface-container-low hover:bg-surface-variant flex items-center justify-center text-on-surface-variant hover:text-on-surface transition-colors"
            onclick="closeBeritaPopup()">
            <span class="material-symbols-outlined">close</span>
        </button>
        <div id="kabarPopupBody">
            <!-- Konten di-inject lewat JS -->
        </div>
    </div>
</div>

@push('scripts')
<script>
    const popupData = @json($popupData ?? []);

    function openBeritaPopup(postId) {
        const data = popupData[postId];
        if (!data) return;

        const body = document.getElementById('kabarPopupBody');
        body.innerHTML = data.html;

        const popup = document.getElementById('kabarPopup');
        popup.style.opacity = '1';
        popup.style.visibility = 'visible';
        popup.querySelector('div.relative').style.transform = 'translateY(0) scale(1)';
        document.body.style.overflow = 'hidden';
    }

    function closeBeritaPopup() {
        const popup = document.getElementById('kabarPopup');
        popup.style.opacity = '0';
        popup.style.visibility = 'hidden';
        popup.querySelector('div.relative').style.transform = 'translateY(20px) scale(0.98)';
        document.body.style.overflow = '';
    }

    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('[data-post]').forEach(el => {
            el.addEventListener('click', (e) => {
                if (e.target.closest('a') && !e.target.closest('.kabar-detail-link')) return;
                const id = el.getAttribute('data-post');
                if (id) openBeritaPopup(id);
            });
        });

        // Tag filter logic
        const pills = document.querySelectorAll('.tag-pill');
        const cards = document.querySelectorAll('.blog-card');

        pills.forEach(pill => {
            pill.addEventListener('click', () => {
                const tag = pill.getAttribute('data-tag');
                pills.forEach(p => {
                    p.classList.remove('bg-primary', 'text-white');
                    p.classList.add('bg-surface-container-high', 'text-on-surface-variant');
                });
                pill.classList.remove('bg-surface-container-high', 'text-on-surface-variant');
                pill.classList.add('bg-primary', 'text-white');

                cards.forEach(card => {
                    if (!tag) {
                        card.style.display = '';
                        return;
                    }
                    const tags = (card.getAttribute('data-tags') || '').split(',');
                    card.style.display = tags.includes(tag) ? '' : 'none';
                });
            });
        });
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeBeritaPopup();
    });
</script>
@endpush
