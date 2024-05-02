@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Petugas</h3>
                    <div class="d-flex">
                        <p class="breadcrumb-item"><a href="#">Home</a></p>
                        <p class="breadcrumb-item active " aria-current="page">Petugas</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-primary text-light mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Tambah Petugas
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Jenis petugas</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('petugas.store') }}" method="POST" id="petugasForm">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div id="alertNama" class="alert alert-danger d-none" role="alert">
                                                        Nama tidak boleh kosong.
                                                    </div>
                                                    <div id="alertEmail" class="alert alert-danger d-none" role="alert">
                                                        Email tidak boleh kosong.
                                                    </div>
                                                    <div id="alertPassword" class="alert alert-danger d-none" role="alert">
                                                        Password tidak boleh kosong.
                                                    </div>
                                                    <div id="alertSuccess" class="alert alert-success d-none" role="alert">
                                                        Data berhasil dibuat.
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <input type="text" class="form-control" name="name" id="name" placeholder="" >
                                                            <label for="nama">Nama Petugas</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <input type="email" class="form-control" name="email" id="email" placeholder="" >
                                                            <label for="email">Email</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3">
                                                            <input type="password" class="form-control" name="password" id="password" placeholder="" >
                                                            <label for="password">Password</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary text-light" onclick="validateForm()">Tambah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($petugas->isEmpty())
                                    <tr>
                                        <td colspan="9" class="text-center">Data Kosong</td>
                                    </tr>
                                    @else
                                    @foreach ($petugas as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center">
                                                <button type="button" class="btn btn-primary text-light btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                                    Edit
                                                </button>
                                                <form action="{{ route('petugas.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger text-light" onclick="confirmDelete()">Delete</button>
                                                </form>
                                            </div>
                                            <!-- Modal Edit-->
                                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Jenis petugas</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('petugas.update', $item->id) }}" method="POST" >
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-floating mb-3">
                                                                            <input type="text" class="form-control" value="{{ $item->name }}" name="name" id="name" placeholder="" >
                                                                            <label for="nama">Nama Petugas</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-floating mb-3">
                                                                            <input type="email" class="form-control" value="{{ $item->email }}"  name="email" id="email" placeholder="" >
                                                                            <label for="email">Email</label>
                                                                        </div>
                                                                    </div>
                                                                    {{-- <div class="col-md-6">
                                                                        <div class="form-floating mb-3">
                                                                            <input type="password" class="form-control" value="{{ $item->password }}" name="password" id="password" placeholder="" >
                                                                            <label for="password">Password</label>
                                                                        </div>
                                                                    </div> --}}
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary text-light">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
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

        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        var valid = true;

        if (name.trim() === '') {
            document.getElementById('alertNama').classList.remove('d-none');
            valid = false;
        } else {
            document.getElementById('alertNama').classList.add('d-none');
        }

        // Validasi No HP
        if (email.trim() === '') {
            document.getElementById('alertEmail').classList.remove('d-none');
            valid = false;
        } else {
            document.getElementById('alertEmail').classList.add('d-none');
        }

        // Validasi Alamat
        if (password.trim() === '') {
            document.getElementById('alertPassword').classList.remove('d-none');
            valid = false;
        } else {
            document.getElementById('alertPassword').classList.add('d-none');
        }

        if (valid) {
            document.getElementById('alertSuccess').classList.remove('d-none');
            setTimeout(function() {
                document.getElementById('alertSuccess').classList.add('d-none');
                document.getElementById('petugasForm').submit();
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
