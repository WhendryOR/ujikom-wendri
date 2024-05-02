<!DOCTYPE html>
<html>
<head>
    <title>All Orders</title>
    <style>
        /* CSS styling for the PDF layout */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        @page {
            size: landscape;
        }
    </style>
</head>
<body>
    <h2>Laporan Bulan {{ \Carbon\Carbon::parse($order->first()->created_at)->format('F') }}, Tahun {{ \Carbon\Carbon::parse($order->first()->created_at)->format('Y') }}</h2>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kode Order</th>
                <th>Nama Pelanggan</th>
                <th>Jenis Layanan</th>
                <th>Jenis Pembayaran</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order as $item)
            <tr>
                <td>{{ Carbon\Carbon::parse($item->tanggal)->format('d-M-Y') }}</td>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->konsumen->nama }}</td>
                <td>{{ $item->layanan->nama }}</td>
                <td>{{ $item->pembayaran->nama }}</td>
                <td>{{ $item->layanan->harga }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->total_harga }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
