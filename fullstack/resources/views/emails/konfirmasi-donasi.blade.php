<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Konfirmasi Donasi - Sarana Berbagi</title>
    <style>
        body {
            font-family: 'Inter', Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #005c55;
            color: #ffffff;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }

        .header p {
            margin: 10px 0 0;
            opacity: 0.9;
        }

        .content {
            padding: 30px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        .info-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #e9ecef;
        }

        .info-table td:first-child {
            font-weight: 600;
            color: #495057;
            width: 40%;
        }

        .info-table td:last-child {
            color: #212529;
        }

        .nominal {
            font-size: 28px;
            font-weight: 700;
            color: #005c55;
            text-align: center;
            padding: 20px;
            background-color: #f2f3ff;
            border-radius: 8px;
            margin: 20px 0;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #6c757d;
            font-size: 14px;
        }

        .btn {
            display: inline-block;
            background-color: #005c55;
            color: #ffffff;
            padding: 12px 30px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Terima Kasih atas Donasi Anda!</h1>
            <p>Kebaikan Anda membawa perubahan nyata</p>
        </div>
        <div class="content">
            <p>Halo <strong>{{ $data['nama'] }}</strong>,</p>
            <p>Donasi Anda telah berhasil kami terima. Berikut detail donasi Anda:</p>

            <table class="info-table">
                <tr>
                    <td>Nama Donatur</td>
                    <td>{{ $data['nama'] }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $data['email'] }}</td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td>{{ $data['telepon'] }}</td>
                </tr>
                <tr>
                    <td>Metode Pembayaran</td>
                    <td>{{ $data['metode'] }}</td>
                </tr>
                @if (!empty($data['pesan']))
                    <tr>
                        <td>Pesan/Catatan</td>
                        <td>{{ $data['pesan'] }}</td>
                    </tr>
                @endif
            </table>

            <div class="nominal">
                Rp {{ number_format($data['nominal'], 0, ',', '.') }}
            </div>

            <p>Tim kami akan segera menghubungi Anda untuk konfirmasi pembayaran melalui metode yang Anda pilih.</p>
            <p>Jika ada pertanyaan, hubungi kami di <strong>0818-0953-1647</strong> atau email
                <strong>yayasansaranaberbagi@gmail.com</strong>.</p>

            <p>Semoga Allah membalas kebaikan Anda. <strong>Lillahita'ala</strong></p>
        </div>
        <div class="footer">
            <p>Email ini dikirim secara otomatis dari sistem Sarana Berbagi</p>
            <p>&copy; {{ date('Y') }} Yayasan Sarana Berbagi</p>
            <p style="font-size: 12px; color: #999;">Komplek Griya Bandung Indah Blok F 19 No 10, Bandung, Jawa Barat
                40287</p>
        </div>
    </div>
</body>

</html>
