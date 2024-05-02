<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
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
    </style>
</head>
<body>
    <h2>Order Details</h2>
    <table>
        <tr>
            <th>Kode Order</th>
            <td>{{ $order->kode }}</td>
        </tr>
        <tr>
            <th>Nama Pelanggan</th>
            <td>{{ $order->konsumen->nama }}</td>
        </tr>
        <tr>
            <th>Jenis Layanan</th>
            <td>{{ $order->layanan->nama }}</td>
        </tr>
        <tr>
            <th>Jenis Pembayaran</th>
            <td>{{ $order->pembayaran->nama }}</td>
        </tr>
        <tr>
            <th>Harga</th>
            <td>{{ $order->layanan->harga }}</td>
        </tr>
        <tr>
            <th>Jumlah</th>
            <td>{{ $order->jumlah }}</td>
        </tr>
        <tr>
            <th>Total Harga</th>
            <td>{{ $order->total_harga }}</td>
        </tr>
        <tr>
            <th>Uang Bayar</th>
            <td>{{ $order->uang_bayar }}</td>
        </tr>
        <tr>
            <th>Uang Kembalian</th>
            <td>{{ $order->uang_kembalian }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $order->status }}</td>
        </tr>
    </table>
</body>
</html>
