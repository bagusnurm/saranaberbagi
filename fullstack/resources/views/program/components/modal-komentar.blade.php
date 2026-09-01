<!-- Modal Komentar Program -->
<div id="commentModal"
    class="fixed inset-0 z-[100] items-center justify-center p-4 md:p-8 hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-on-background/60 backdrop-blur-sm" data-close-comment></div>
    <div id="commentModalPanel"
        class="relative bg-surface rounded-2xl shadow-2xl w-full max-w-2xl max-h-[85vh] flex flex-col scale-95 transition-transform duration-300">
        <!-- Header -->
        <div class="flex items-start justify-between gap-4 p-6 border-b border-outline-variant/30">
            <div>
                <h3 class="font-h3 text-h3 text-on-surface leading-snug" id="commentProgramTitle">Komentar Program</h3>
                <p class="font-body-md text-sm text-on-surface-variant mt-1" id="commentProgramSubtitle">
                    Bagikan dukungan Anda untuk program ini
                </p>
            </div>
            <button type="button"
                class="shrink-0 w-10 h-10 rounded-full bg-surface-container-low hover:bg-surface-variant flex items-center justify-center text-on-surface-variant hover:text-on-surface transition-colors"
                data-close-comment>
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>

        <!-- Form -->
        <form id="commentForm" class="p-6 border-b border-outline-variant/30 flex flex-col gap-4" data-program="">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="commentName" class="block font-label-sm text-label-sm text-on-surface mb-2">
                        Nama <span class="text-error">*</span>
                    </label>
                    <input id="commentName" name="name" type="text" required maxlength="100"
                        placeholder="Nama Anda"
                        class="w-full rounded-lg border border-outline-variant bg-surface-container-lowest px-4 py-3 font-body-md text-body-md text-on-surface placeholder:text-outline-variant focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                </div>
                <div>
                    <label for="commentEmail" class="block font-label-sm text-label-sm text-on-surface mb-2">
                        Email <span class="text-outline text-xs">(opsional)</span>
                    </label>
                    <input id="commentEmail" name="email" type="email" maxlength="191" placeholder="email@contoh.com"
                        class="w-full rounded-lg border border-outline-variant bg-surface-container-lowest px-4 py-3 font-body-md text-body-md text-on-surface placeholder:text-outline-variant focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all">
                </div>
            </div>
            <div>
                <label for="commentContent" class="block font-label-sm text-label-sm text-on-surface mb-2">
                    Komentar <span class="text-error">*</span>
                </label>
                <textarea id="commentContent" name="content" rows="3" required minlength="3" maxlength="1000"
                    placeholder="Tulis komentar, doa, atau dukungan Anda..."
                    class="w-full rounded-lg border border-outline-variant bg-surface-container-lowest px-4 py-3 font-body-md text-body-md text-on-surface placeholder:text-outline-variant focus:outline-none focus:border-primary focus:ring-2 focus:ring-primary/20 transition-all resize-none"></textarea>
                <div class="flex justify-between mt-2">
                    <p id="commentError" class="text-error font-body-md text-sm hidden"></p>
                    <p class="font-body-md text-xs text-outline ml-auto"><span id="commentCharCount">0</span>/1000</p>
                </div>
            </div>
            <button type="submit" id="commentSubmitBtn"
                class="self-start bg-primary text-white font-label-sm text-label-sm px-8 py-3 rounded-lg hover:opacity-90 transition-opacity shadow-sm active:scale-95 flex items-center gap-2 font-semibold">
                <span class="material-symbols-outlined text-[18px]">send</span>
                <span>Kirim Komentar</span>
            </button>
        </form>

        <!-- Daftar Komentar -->
        <div id="commentList" class="flex-1 overflow-y-auto p-6 flex flex-col gap-4 bg-surface-container-low/50">
            <!-- Diisi lewat JS -->
        </div>
    </div>
</div>

<!-- Toast -->
<div id="commentToast"
    class="fixed bottom-6 right-6 z-[110] bg-on-surface text-surface font-label-sm text-label-sm px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3 opacity-0 translate-y-4 pointer-events-none transition-all duration-300">
    <span class="material-symbols-outlined text-primary-fixed">check_circle</span>
    <span id="commentToastText">Komentar terkirim!</span>
</div>

@push('scripts')
<script>
    (function() {
        'use strict';

        const CSRF = '{{ csrf_token() }}';
        const modal = document.getElementById('commentModal');
        const panel = document.getElementById('commentModalPanel');
        const list = document.getElementById('commentList');
        const form = document.getElementById('commentForm');
        const errBox = document.getElementById('commentError');
        const charCount = document.getElementById('commentCharCount');
        const submitBtn = document.getElementById('commentSubmitBtn');
        const toast = document.getElementById('commentToast');
        const toastText = document.getElementById('commentToastText');

        let currentProgram = '';

        function slugToTitle(slug) {
            return slug.replace(/-/g, ' ').replace(/\b\w/g, c => c.toUpperCase());
        }

        function escapeHtml(str) {
            const div = document.createElement('div');
            div.textContent = str;
            return div.innerHTML;
        }

        // ---------- Modal ----------
        function openModal(card) {
            currentProgram = card.dataset.program;
            const title = card.querySelector('h3')?.textContent?.trim() || slugToTitle(currentProgram);
            document.getElementById('commentProgramTitle').textContent = title;
            form.dataset.program = currentProgram;
            errBox.classList.add('hidden');
            renderSkeleton();
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            requestAnimationFrame(() => {
                modal.classList.remove('opacity-0');
                panel.classList.remove('scale-95');
            });
            document.body.style.overflow = 'hidden';
            loadComments();
        }

        function closeModal() {
            modal.classList.add('opacity-0');
            panel.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                document.body.style.overflow = '';
            }, 250);
        }

        document.querySelectorAll('.comment-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const card = btn.closest('[data-program]');
                if (card) openModal(card);
            });
        });

        document.querySelectorAll('[data-close-comment]').forEach(function(el) {
            el.addEventListener('click', closeModal);
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) closeModal();
        });

        // ---------- Load & render komentar ----------
        function renderSkeleton() {
            list.innerHTML = Array(3).fill(
                '<div class="animate-pulse flex gap-3"><div class="w-10 h-10 rounded-full bg-surface-variant shrink-0"></div><div class="flex-1 space-y-2 py-1"><div class="h-3 bg-surface-variant rounded w-1/4"></div><div class="h-3 bg-surface-variant rounded w-3/4"></div></div></div>'
            ).join('');
        }

        function renderComments(data) {
            if (!data.comments.length) {
                list.innerHTML =
                    `<div class="text-center py-10"><span class="material-symbols-outlined text-5xl text-outline">forum</span><p class="font-body-md text-body-md text-on-surface-variant mt-4">Belum ada komentar. Jadilah yang pertama memberi dukungan!</p></div>`;
                return;
            }
            list.innerHTML = data.comments.map(c => `
                <div class="bg-surface-container-lowest rounded-xl border border-outline-variant/40 p-4 flex gap-3">
                    <div class="w-10 h-10 rounded-full bg-primary-container text-on-primary-container font-bold flex items-center justify-center shrink-0">${escapeHtml(c.initial)}</div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-baseline justify-between gap-2">
                            <p class="font-label-sm text-label-sm text-on-surface truncate font-semibold">${escapeHtml(c.name)}</p>
                            <span class="font-body-md text-xs text-outline shrink-0">${escapeHtml(c.time_ago)}</span>
                        </div>
                        <p class="font-body-md text-body-md text-on-surface-variant mt-1 break-words">${escapeHtml(c.content)}</p>
                    </div>
                </div>`).join('');
        }

        function loadComments() {
            renderSkeleton();
            fetch(`{{ url('/program/comments') }}?program=${encodeURIComponent(currentProgram)}`)
                .then(r => r.json())
                .then(renderComments)
                .catch(() => {
                    list.innerHTML =
                        '<p class="text-center font-body-md text-body-md text-error py-8">Gagal memuat komentar. Coba lagi.</p>';
                });
        }

        // ---------- Submit ----------
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            errBox.classList.add('hidden');
            const content = document.getElementById('commentContent').value.trim();
            const name = document.getElementById('commentName').value.trim();

            if (name.length < 2) {
                showError('Nama minimal 2 karakter.');
                return;
            }
            if (content.length < 3) {
                showError('Komentar minimal 3 karakter.');
                return;
            }

            submitBtn.disabled = true;
            submitBtn.style.opacity = '0.6';

            const body = new URLSearchParams({
                program: form.dataset.program,
                name: name,
                email: document.getElementById('commentEmail').value.trim(),
                content: content,
            });

            fetch('{{ url('/program/comments') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                        'X-CSRF-TOKEN': CSRF,
                        'Accept': 'application/json',
                    },
                    body: body,
                })
                .then(async r => {
                    const data = await r.json();
                    if (!r.ok) throw data;
                    return data;
                })
                .then(data => {
                    form.reset();
                    charCount.textContent = '0';
                    showToast(data.message || 'Komentar terkirim!');
                    loadComments();

                    // Update badge count di kartu
                    const card = document.querySelector(`[data-program="${form.dataset.program}"]`);
                    if (card) {
                        const badge = card.querySelector('[data-count-for]');
                        if (badge) {
                            badge.textContent = parseInt(badge.textContent || '0') + 1;
                        }
                    }
                })
                .catch(err => {
                    const msg = (err && err.errors) ?
                        Object.values(err.errors).flat().join(' ') :
                        (err && err.message) || 'Gagal mengirim komentar. Coba lagi.';
                    showError(msg);
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.style.opacity = '';
                });
        });

        function showError(msg) {
            errBox.textContent = msg;
            errBox.classList.remove('hidden');
        }

        // ---------- Char count ----------
        document.getElementById('commentContent').addEventListener('input', function() {
            charCount.textContent = this.value.length;
        });

        // ---------- Toast ----------
        let toastTimer;
        function showToast(msg) {
            toastText.textContent = msg;
            toast.classList.remove('opacity-0', 'translate-y-4');
            clearTimeout(toastTimer);
            toastTimer = setTimeout(() => toast.classList.add('opacity-0', 'translate-y-4'), 3500);
        }
    })();
</script>
@endpush
