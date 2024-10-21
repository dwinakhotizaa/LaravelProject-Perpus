<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Peminjaman Buku</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 0.9em;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Peminjaman Buku</h1>
        <table>
            <tbody>
                <tr>
                    <th>Nama Peminjam</th>
                    <td>{{ $loan->borrower_name }}</td>
                </tr>
                <tr>
                    <th>Buku</th>
                    <td>{{ $loan->book ? $loan->book->judul : 'Tidak ada buku' }}</td>
                </tr>
                <tr>
                    <th>Tanggal Peminjaman</th>
                    <td>{{ \Carbon\Carbon::parse($loan->borrowed_at)->format('d-m-Y') }}</td>
                </tr>
                <tr>
                    <th>Tanggal Pengembalian</th>
                    <td>{{ $loan->return_at ? \Carbon\Carbon::parse($loan->return_at)->format('d-m-Y') : 'Belum Dikembalikan' }}</td>
                </tr>
            </tbody>
        </table>
        <div class="footer">
            <p>Terima kasih telah menggunakan sistem kami.</p>
        </div>
    </div>
</body>
</html>
