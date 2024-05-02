@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Layanan</h3>
                    <div class="d-flex">
                        <p class="breadcrumb-item"><a href="#">Home</a></p>
                        <p class="breadcrumb-item active " aria-current="page">Layanan</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-end">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Tambah Layanan
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('layanan.store') }}" method="post" id="layananForm">
                                            @csrf
                                            <div class="modal-body">
                                                <div id="alertLayanan" class="alert alert-danger d-none" role="alert">
                                                    Nama Layanan tidak boleh kosong.
                                                </div>
                                                <div id="alertHarga" class="alert alert-danger d-none" role="alert">
                                                    Harga tidak boleh kosong.
                                                </div>
                                                <div id="alertSuccess" class="alert alert-success d-none" role="alert">
                                                    Data berhasil dibuat.
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" type="text" name="nama" id="nama" placeholder="">
                                                    <label for="nama">Nama</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" type="text" name="harga" id="harga" placeholder="">
                                                    <label for="harga">Harga</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary text-light" onclick="validateForm()">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($layanan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->harga }}</td>
                                        <td> 
                                            <div class="d-flex">
                                                <button type="button" class="btn btn-primary text-light  me-1 btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                                    Edit
                                                </button>
                                                <form action="{{ route('layanan.destroy', $item->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger text-light" onclick="confirmDelete()">Delete</button>
                                                </form>
                                            </div>
                                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('layanan.update', $item->id) }}" method="POST">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-floating mb-3">
                                                                    <input class="form-control" type="text" value="{{ $item->nama }}" name="nama" id="nama" placeholder="">
                                                                    <label for="nama">Nama</label>
                                                                </div>
                                                                <div class="form-floating mb-3">
                                                                    <input class="form-control" type="text" value="{{ $item->harga }}" name="harga" id="harga" placeholder="">
                                                                    <label for="harga">Harga</label>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary text-light">Save changes</button>
                                                            </div>
                                                        </form>
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
<script>
    function validateForm() {
        
        var nama = document.getElementById('nama').value;
        var harga = document.getElementById('harga').value;
        
        var valid = true;
        
        if (nama.trim() === '') {
            document.getElementById('alertLayanan').classList.remove('d-none');
            valid = false;
        } else {
            document.getElementById('alertLayanan').classList.add('d-none');
        }
        
        // Validasi No HP
        if (harga.trim() === '') {
            document.getElementById('alertHarga').classList.remove('d-none');
            valid = false;
        } else {
            document.getElementById('alertHarga').classList.add('d-none');
        }
        
        if (valid) {
            document.getElementById('alertSuccess').classList.remove('d-none');
            setTimeout(function() {
                document.getElementById('alertSuccess').classList.add('d-none');
                document.getElementById('layananForm').submit();
            }, 1500); // tampilkan alert selama 3 detik sebelum form disubmit
        }
        
    }
    
    function confirmDelete() {
        if (confirm("Kamu yakin akan menghapus data ini?")) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>
@endsection