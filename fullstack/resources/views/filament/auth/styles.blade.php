<style>
    /* Link "buat akun baru" / "masuk ke akun yang sudah ada" — garis bawah aja */
    .fi-simple-header-subheading a.fi-link {
        font-weight: 600;
        text-decoration: underline;
        text-underline-offset: 3px;
        transition: color 0.15s ease;
    }

    .fi-simple-header-subheading a.fi-link:hover {
        color: rgb(13 148 136);
    }

    /* Card login/register */
    .fi-simple-layout .fi-simple-main {
        border-radius: 1rem;
        box-shadow: 0 10px 30px -10px rgb(0 0 0 / 0.08);
        border: 1px solid rgb(0 0 0 / 0.05);
    }

    /* Label field */
    .fi-fo-field-label {
        font-weight: 600;
        font-size: 0.875rem;
        margin-bottom: 0.375rem;
    }

    /* Input text & password */
    .fi-simple-main .fi-input {
        border-radius: 0.65rem;
        border-color: rgb(0 0 0 / 0.1);
        padding-top: 0.65rem;
        padding-bottom: 0.65rem;
        transition: border-color 0.15s ease, box-shadow 0.15s ease;
    }

    .fi-simple-main .fi-input:focus {
        border-color: rgb(20 184 166);
        box-shadow: 0 0 0 3px rgb(20 184 166 / 0.15);
    }

    /* Wrapper input (biar shadow fokus ikut ke wrapper, bukan cuma input) */
    .fi-simple-main .fi-input-wrp {
        border-radius: 0.65rem;
    }

    .fi-simple-main .fi-input-wrp:focus-within {
        box-shadow: 0 0 0 3px rgb(20 184 166 / 0.15);
        border-color: rgb(20 184 166) !important;
    }

    /* Checkbox "Ingat saya" */
    .fi-checkbox-input:checked {
        background-color: rgb(20 184 166);
        border-color: rgb(20 184 166);
    }

    /* Tombol submit */
    .fi-simple-main .fi-btn {
        border-radius: 0.65rem;
        padding-top: 0.7rem;
        padding-bottom: 0.7rem;
        font-weight: 600;
        transition: transform 0.1s ease, box-shadow 0.15s ease;
    }

    .fi-simple-main .fi-btn:hover {
        box-shadow: 0 6px 16px -4px rgb(20 184 166 / 0.4);
    }

    .fi-simple-main .fi-btn:active {
        transform: scale(0.98);
    }

    /* Spasi antar field lebih lega */
    .fi-simple-main .fi-fo-field-wrp {
        margin-bottom: 0.25rem;
    }
</style>
