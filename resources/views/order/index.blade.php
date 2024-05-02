@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Order</h3>
                    <div class="d-flex">
                        <p class="breadcrumb-item"><a href="#">Home</a></p>
                        <p class="breadcrumb-item active " aria-current="page">Order</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-end">
                                <div class="row mb-3">
                                    <div class="col-lg-11">
                                        <input type="text" id="searchInput" class="form-control" placeholder="Cari...">
                                    </div>
                                </div> 
                                {{-- <button type="button" class="btn btn-primary mb-3 text-light btn-sm" id="exportAllBtn">
                                    Export All
                                </button> --}}
                                <button type="button" class="btn btn-primary mb-3 text-light btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Tambah Order
                                </button>
                            </div>
                            {{-- Modal Export --}}
                            {{-- <div class="modal fade" id="exportModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Export Laporan Bulanan</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('order.laporan') }}" method="GET">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="col-auto">
                                                    <select class="form-control" name="month" required>
                                                        <option value="" selected disabled>Pilih Bulan</option>
                                                        <option value="1">Januari</option>
                                                        <option value="2">Februari</option>
                                                        <option value="3">Maret</option>
                                                        <option value="4">April</option>
                                                        <option value="5">Mei</option>
                                                        <option value="6">Juni</option>
                                                        <option value="7">Juli</option>
                                                        <option value="8">Agustus</option>
                                                        <option value="9">September</option>
                                                        <option value="10">Oktober</option>
                                                        <option value="11">November</option>
                                                        <option value="12">Desember</option>
                                                    </select>
                                                </div>
                                                <div class="col-auto">
                                                    <input type="number" class="form-control mt-2" name="year" placeholder="Tahun" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary text-light">Export</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> --}}
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Order</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('order.store') }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="kode">Kode Orderan</label>777788888
                                                            <input type="text" class="form-control" value="{{$kode}}" name="kode" id="kode" readonly>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="nama">Nama Konsumen</label>
                                                            <select name="id_konsumen" id="id_konsumen" class="form-control" readonly>
                                                                <option value="">- Pilih -</option>
                                                                @foreach ($konsumen as $item)
                                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="nama">Jenis Layanan</label>
                                                            <select name="id_layanan" id="id_layanan" class="form-control">
                                                                <option value="">- Pilih -</option>
                                                                @foreach ($layanan as $item)
                                                                <option value="{{ $item->id }}" data-harga="{{ $item->harga }}">{{ $item->nama }}</option>
                                                                @endforeach
                                                            </select>                                                
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="nama">Jenis Pembayaran</label>
                                                            <select name="id_pembayaran" id="id_pembayaran" class="form-control">
                                                                <option value="">- Pilih -</option>
                                                                @foreach ($pembayaran as $item)
                                                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group mb-3">
                                                            <label for="harga">Harga</label>
                                                            <input type="number" class="form-control" name="harga" id="harga" placeholder="" readonly>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="jumlah">Jumlah</label>
                                                            <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="" min="0" max="100" oninput="validity.valid || (value = '' );">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="total_harga">Total Harga</label>
                                                            <input type="number" class="form-control" name="total_harga" id="total_harga" placeholder="" readonly>
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="uang_bayar">Uang Bayar</label>
                                                            <input type="number" class="form-control" name="uang_bayar" id="uang_bayar" placeholder="">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label for="uang_kembalian">Kembalian</label>
                                                            <input type="text" class="form-control" name="uang_kembalian" id="uang_kembalian" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary text-light">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Tanggal</td>
                                            <td>Nama</td>
                                            <td>Kode Orderan</td>
                                            <td>Layanan</td>
                                            <td>Jumlah</td>
                                            <td>Total</td>
                                            <td>Status</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($order->isEmpty())
                                        <tr>
                                            <td colspan="9" class="text-center">Data Kosong</td>
                                        </tr>
                                        @else
                                        @endif
                                        @foreach ($order as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ Carbon\Carbon::parse($item->tanggal)->format('d-M-Y') }}</td>
                                            <td>{{ $item->konsumen->nama ?? ''}}</td>
                                            <td>{{ $item->kode }}</td>
                                            <td>{{ $item->layanan->nama ?? ''}}</td>
                                            <td>{{ $item->jumlah }}</td>
                                            <td>Rp. {{ $item->total_harga}}</td>
                                            <td class="text-center">
                                                <span class="badge
                                                @if ($item->status == 'baru') bg-warning
                                                @elseif ($item->status == 'proses') bg-info
                                                @elseif ($item->status == 'selesai') bg-primary
                                                @elseif ($item->status == 'diambil') bg-success
                                                @endif">
                                                {{ ucfirst($item->status)}}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group" role="grup" aria-label="Basic Example">
                                                <div class="d-flex justify-content-center">
                                                    <!-- Tampilkan detail order -->
                                                    {{-- <a href="{{ route('order.print', ['id' => $item->id]) }}" target="_blank" class="btn btn-primary btn-sm text-light">Print Order</a> --}}
                                                    <button type="button" class="btn btn-info btn-sm text-light" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $item->id }}">
                                                        Edit
                                                    </button>
                                                    <form action="{{ route('order.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <button class="btn btn-sm btn-danger text-light" onclick="confirmDelete()"></i> Delete</button>
                                                    </form>
                                                </div>
                                                <!-- Modal Edit-->
                                                <div class="modal fade" id="modalEdit{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form action="{{ route('order.update', $item->id) }}" method="POST">
                                                                @method('PUT');
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <select name="status" class="form-control">
                                                                            <option value="baru" {{ $item->status == 'baru' ? 'selected' : '' }} {{ $item->status == 'diambil' ? 'disabled' : '' }}>Baru</option>
                                                                            <option value="proses" {{ $item->status == 'proses' ? 'selected' : '' }} {{ $item->status == 'diambil' ? 'disabled' : '' }}>Diproses</option>
                                                                            <option value="selesai" {{ $item->status == 'selesai' ? 'selected' : '' }} {{ $item->status == 'diambil' ? 'disabled' : '' }}>Selesai</option>
                                                                            <option value="diambil" {{ $item->status == 'diambil' ? 'selected' : '' }} {{ $item->status == 'diambil' ? 'disabled' : '' }}>Diambil</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary text-light">Simpan</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script>
    function confirmDelete() {
        if (confirm("Kamu yakin akan menghapus data ini?")) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>

{{-- <script>
    document.getElementById('layanan').addEventListener('uang_kembalian', function(){
        updateTotalprice();
        updateQuantityLabel();
        updatePaymentStatusOption();
    });
    
    document.getElementById('jumlah').addEventListener('input', function(){
        updateTotalprice();
    });
    
    document.getElementById('harga').addEventListener('input', function(){
        updatePaymentStatusOption();
        updateChange();
    });
    
    function updateTotalPrice(){
        var selectedServiceId = document.getElementById('layanan').value;
        var quantity = parseInt(document.getElementById('jumlah').value);
        var serviceOptions = ;
        var totalPrice = 0;
        
        for(var i = 0; i< serviceOptions.length; i++){
            if(serviceOptions[i].id == selectedServiceId) {
                totalPrice = serviceOptions[i].price * quantity;
                break;
            }
        }
        document.getElementById('total_harga').value = totalPrice;
    }
    
</script> --}}
<script>
    document.getElementById('id_layanan').addEventListener('change', function(){
        updatePrice();
        updateTotalPrice();
    });
    
    document.getElementById('jumlah').addEventListener('input', function(){
        updateTotalPrice();
    });
    
    function updatePrice(){
        var selectedServiceId = document.getElementById('id_layanan').value;
        var selectedOption = document.getElementById('id_layanan').options[document.getElementById('id_layanan').selectedIndex];
        var harga = parseFloat(selectedOption.getAttribute('data-harga'));
        
        document.getElementById('harga').value = isNaN(harga) ? '' : harga;
    }
    
    function updateTotalPrice() {
        var quantity = parseInt(document.getElementById('jumlah').value);
        var harga = parseFloat(document.getElementById('harga').value);
        var totalHarga = harga * quantity;
        var uangDibayar = parseFloat(document.getElementById('uang_bayar').value); // Ambil nilai uang yang dibayarkan
        
        document.getElementById('total_harga').value = isNaN(totalHarga) ? '' : totalHarga;
        
        // Hitung uang kembalian
        var uangKembalian = uangDibayar - totalHarga;
        
        // Tampilkan uang kembalian
        document.getElementById('uang_kembalian').value = isNaN(uangKembalian) ? '' : uangKembalian;
        document.getElementById('uang_bayar').addEventListener('input', function(){
            updateTotalPrice();
        });
        
    }
    
    // Fungsi untuk melakukan pencarian
    function search() {
        // Ambil nilai input pencarian
        var input = document.getElementById('searchInput').value.toUpperCase();
        
        // Ambil semua baris data dari tabel
        var rows = document.querySelectorAll("table tbody tr");
        
        // Loop melalui setiap baris data
        rows.forEach(function(row) {
            // Ambil sel data dari setiap baris
            var cells = row.querySelectorAll("td");
            var found = false;
            
            // Loop melalui setiap sel data
            cells.forEach(function(cell) {
                // Jika ada teks yang cocok dengan input pencarian, tampilkan barisnya
                if (cell.textContent.toUpperCase().indexOf(input) > -1) {
                    found = true;
                }
            });
            
            // Tampilkan atau sembunyikan baris berdasarkan hasil pencarian
            if (found) {
                row.style.display = "";
            } else {
                row.style.display = "none";
            }
        });
    }
    
    // Tambahkan event listener untuk memanggil fungsi pencarian saat nilai input berubah
    document.getElementById('searchInput').addEventListener('input', search);
    
    function printPage() {
        window.print();
    }

    // Menampilkan modal saat tombol "Export All" ditekan
    document.getElementById('exportAllBtn').addEventListener('click', function() {
        var exportModal = new bootstrap.Modal(document.getElementById('exportModal'));
        exportModal.show();
    });
    
</script>

@endsection
