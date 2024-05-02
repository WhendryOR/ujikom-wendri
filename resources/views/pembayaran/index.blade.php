@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Pembayaran</h3>
                    <div class="d-flex">
                        <p class="breadcrumb-item"><a href="#">Home</a></p>
                        <p class="breadcrumb-item active " aria-current="page">Pembayaran</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-end">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Tambah Pembayaran
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
                                    <form action="{{ route('pembayaran.store') }}" method="post" id="pembayaranForm">
                                        @csrf
                                        <div class="modal-body">
                                            <div id="alertPembayaran" class="alert alert-danger d-none" role="alert">
                                                Nama Pembayaran tidak boleh kosong.
                                            </div>
                                            <div id="alertSuccess" class="alert alert-success d-none" role="alert">
                                                Data berhasil dibuat.
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" name="nama" id="nama" placeholder="">
                                                <label for="nama">Nama</label>
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
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pembayaran as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td> 
                                        <div class="d-flex">
                                            <button type="button" class="btn btn-primary text-light me-1 btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                                Edit
                                            </button>
                                            <form action="{{ route('pembayaran.destroy', $item->id) }}" method="post">
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
                                                    <form action="{{ route('pembayaran.update', $item->id) }}" method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-floating mb-3">
                                                                <input class="form-control" type="text" value="{{ $item->nama }}" name="nama" id="nama" placeholder="">
                                                                <label for="nama">Nama</label>
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
        
        var valid = true;
        
        if (nama.trim() === '') {
            document.getElementById('alertPembayaran').classList.remove('d-none');
            valid = false;
        } else {
            document.getElementById('alertPembayaran').classList.add('d-none');
        }
        
        if (valid) {
            document.getElementById('alertSuccess').classList.remove('d-none');
            setTimeout(function() {
                document.getElementById('alertSuccess').classList.add('d-none');
                document.getElementById('pembayaranForm').submit();
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