<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="color-scheme" content="light">
<title>Atur Ulang Kata Sandi</title>
<!-- Font display via web-safe fallback dulu; Google Fonts hanya progressive enhancement -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">
<style>
    body, table, td { margin: 0; padding: 0; }
    img { border: 0; outline: none; }
    body { background-color: #F4FAF9; -webkit-text-size-adjust: 100%; }

    @media only screen and (max-width: 600px) {
        .email-container { width: 100% !important; }
        .email-padding { padding-left: 24px !important; padding-right: 24px !important; }
        .email-heading { font-size: 22px !important; }
    }
</style>
</head>
<body style="background-color:#F4FAF9;">
<table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="background-color:#F4FAF9;">
    <tr>
        <td align="center" style="padding: 40px 16px;">

            <table role="presentation" class="email-container" width="600" cellpadding="0" cellspacing="0"
                   style="width:600px; max-width:600px; background-color:#FFFFFF; border-radius:20px; border:1px solid #E3EFEC; overflow:hidden;">

                <!-- Aksen teal tipis di atas -->
                <tr>
                    <td style="height:4px; background-color:#0F9E97; line-height:4px; font-size:0;">&nbsp;</td>
                </tr>

                <!-- Logo di dalam badge lingkaran mint lembut, gema bentuk lingkaran di logo.
                     $message->embed() -> logo ditempel sebagai inline attachment (CID),
                     jadi tetap muncul walau APP_URL belum publik. -->
                <tr>
                    <td align="center" class="email-padding" style="padding: 40px 40px 16px;">
                        <table role="presentation" cellpadding="0" cellspacing="0">
                            <tr>
                                <td align="center" valign="middle"
                                    style="width:104px; height:104px; border-radius:52px; background-color:#E6F5F3;">
                                    <img src="{{ $message->embed(public_path('images/brandlogo-teal (1).png')) }}"
                                         width="72" alt="Sarana Berbagi"
                                         style="display:block; margin:0 auto;">
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Heading -->
                <tr>
                    <td align="center" class="email-padding" style="padding: 8px 40px 0;">
                        <h1 class="email-heading" style="margin:0; font-family:'Poppins','Segoe UI',Helvetica,Arial,sans-serif; font-size:26px; font-weight:700; color:#0B6E69;">
                            Atur Ulang Kata Sandi
                        </h1>
                    </td>
                </tr>

                <!-- Body copy -->
                <tr>
                    <td class="email-padding" style="padding: 20px 48px 0; font-family:'Inter','Segoe UI',Helvetica,Arial,sans-serif; font-size:15px; line-height:24px; color:#1F2937;">
                        <p style="margin:0 0 16px;">Halo, <strong>{{ $name }}</strong></p>
                        <p style="margin:0;">Kami menerima permintaan untuk mengatur ulang kata sandi akun Sarana Berbagi Anda. Klik tombol di bawah untuk melanjutkan.</p>
                    </td>
                </tr>

                <!-- CTA pill button -->
                <tr>
                    <td align="center" style="padding: 32px 40px;">
                        <table role="presentation" cellpadding="0" cellspacing="0">
                            <tr>
                                <td align="center" style="border-radius:999px; background-color:#0F9E97;">
                                    <a href="{{ $url }}" target="_blank"
                                       style="display:inline-block; padding:14px 40px; font-family:'Inter','Segoe UI',Helvetica,Arial,sans-serif; font-size:15px; font-weight:500; color:#FFFFFF; text-decoration:none; border-radius:999px;">
                                        Atur Ulang Kata Sandi
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Info kedaluwarsa -->
                <tr>
                    <td align="center" style="padding: 0 40px 32px; font-family:'Inter','Segoe UI',Helvetica,Arial,sans-serif; font-size:13px; color:#6B7280;">
                        Link ini berlaku selama {{ $expireMinutes }} menit.
                    </td>
                </tr>

                <!-- Divider -->
                <tr>
                    <td style="padding: 0 40px;">
                        <div style="border-top:1px solid #E3EFEC; line-height:1px; font-size:0;">&nbsp;</div>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td align="center" class="email-padding" style="padding: 28px 40px 36px; font-family:'Inter','Segoe UI',Helvetica,Arial,sans-serif; font-size:12px; line-height:18px; color:#9CA3AF;">
                        Jika Anda tidak meminta ini, abaikan email ini — kata sandi Anda tetap aman.<br>
                        &copy; {{ date('Y') }} Sarana Berbagi.
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>
</body>
</html>