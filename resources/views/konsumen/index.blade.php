@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Konsumen</h3>
                    <div class="d-flex">
                        <p class="breadcrumb-item"><a href="#">Home</a></p>
                        <p class="breadcrumb-item active " aria-current="page">Konsumen</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="cols-lg-12">
                            <div class="d-flex justify-content-end">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Tambah Konsumen
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
                                    <form action="{{ route('konsumen.store') }}" method="post" id="konsumenForm">
                                        @csrf
                                        <div class="modal-body">
                                            {{-- Alert --}}
                                            <div id="alertNama" class="alert alert-danger d-none" role="alert">
                                                Nama tidak boleh kosong.
                                            </div>
                                            <div id="alertNoHP" class="alert alert-danger d-none" role="alert">
                                                No HP tidak boleh kosong.
                                            </div>
                                            <div id="alertAlamat" class="alert alert-danger d-none" role="alert">
                                                Alamat tidak boleh kosong.
                                            </div>
                                            <div id="alertSuccess" class="alert alert-success d-none" role="alert">
                                                Data berhasil dibuat.
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" name="nama" id="nama" placeholder="">
                                                <label for="nama">Nama</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" name="no_hp" id="no_hp" placeholder="">
                                                <label for="no_hp">No HP</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" type="text" name="alamat" id="alamat" placeholder="">
                                                <label for="alamat">Alamat</label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary text-light" onclick="validateForm()">Save changes</button>
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
                                        <th>No HP</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($konsumen->isEmpty())
                                    <tr>
                                        <td colspan="6" class="text-center">Data Kosong</td>
                                    </tr>
                                    @else
                                    @foreach ($konsumen as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->no_hp }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td> 
                                        <div class="d-flex">
                                            <button type="button" class="btn btn-primary text-light btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                                Edit
                                            </button>
                                            <form action="{{ route('konsumen.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger text-light" onclick="confirmDelete()">Delete</button>
                                            </form>                                        </div>
                                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                    <form action="{{ route('konsumen.update', $item->id) }}" method="POST" id="konsumenFormEdit">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div id="alertNamaEdit" class="alert alert-danger d-none" role="alert">
                                                                Nama tidak boleh kosong.
                                                            </div>
                                                            <div id="alertNoHPEdit" class="alert alert-danger d-none" role="alert">
                                                                No HP tidak boleh kosong.
                                                            </div>
                                                            <div id="alertAlamatEdit" class="alert alert-danger d-none" role="alert">
                                                                Alamat tidak boleh kosong.
                                                            </div>
                                                            <div id="alertSuccess" class="alert alert-success d-none" role="alert">
                                                                Data berhasil diedit.
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input class="form-control" type="text" value="{{ $item->nama }}" name="nama" id="nama_edit" placeholder="">
                                                                <label for="nama">Nama</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input class="form-control" type="text" value="{{ $item->no_hp }}" name="no_hp" id="no_hp_edit" placeholder="">
                                                                <label for="no_hp">No HP</label>
                                                            </div>
                                                            <div class="form-floating mb-3">
                                                                <input class="form-control" type="textarea" name="alamat" id="alamat_edit">
                                                                <label for="alamat">Alamat</label>
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
        var nama = document.getElementById('nama').value;
        var no_hp = document.getElementById('no_hp').value;
        var alamat = document.getElementById('alamat').value;

        var nama_edit = document.getElementById('nama_edit').value;
        var no_hp_edit = document.getElementById('no_hp_edit').value;
        var alamat_edit = document.getElementById('alamat_edit').value;

        var valid = true;

        // Validasi Nama
        if (nama.trim() === '') {
            document.getElementById('alertNama').classList.remove('d-none');
            valid = false;
        } else {
            document.getElementById('alertNama').classList.add('d-none');
        }

        // Validasi No HP
        if (no_hp.trim() === '') {
            document.getElementById('alertNoHP').classList.remove('d-none');
            valid = false;
        } else {
            document.getElementById('alertNoHP').classList.add('d-none');
        }

        // Validasi Alamat
        if (alamat.trim() === '') {
            document.getElementById('alertAlamat').classList.remove('d-none');
            valid = false;
        } else {
            document.getElementById('alertAlamat').classList.add('d-none');
        }

        if (nama_edit.trim() === '') {
            document.getElementById('alertNamaEdit').classList.remove('d-none');
            valid = false;
        } else {
            document.getElementById('alertNamaEdit').classList.add('d-none');
        }

        // Validasi No HP
        if (no_hp_edit.trim() === '') {
            document.getElementById('alertNoHPEdit').classList.remove('d-none');
            valid = false;
        } else {
            document.getElementById('alertNoHPEdit').classList.add('d-none');
        }

        // Validasi Alamat
        if (alamat_edit.trim() === '') {
            document.getElementById('alertAlamatEdit').classList.remove('d-none');
            valid = false;
        } else {
            document.getElementById('alertAlamatEdit').classList.add('d-none');
        }

        // Jika semua valid, tampilkan alert berhasil dan submit form
        if (valid) {
            document.getElementById('alertSuccess').classList.remove('d-none');
            setTimeout(function() {
                document.getElementById('alertSuccess').classList.add('d-none');
                document.getElementById('konsumenForm').submit();
                document.getElementById('konsumenFormEdit').submit();
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