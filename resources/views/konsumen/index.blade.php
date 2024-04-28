@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-end">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Launch demo modal
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
                            <form action="{{ route('konsumen.store') }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" name="nama" id="nama" placeholder="">
                                        <label for="nama">Nama</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" name="no_hp" id="no_hp" placeholder="">
                                        <label for="no_hp">No HP</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" type="text" name="alamat" id="alamat">
                                        <label for="alamat">Alamat</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
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
                            @foreach ($konsumen as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->no_hp }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td> 
                                <div class="d-flex">
                                    <button type="button" class="btn btn-primary  me-1 btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $item->id }}">
                                        <i class="ti ti-edit"></i> Edit
                                    </button>
                                    <form action="{{ route('konsumen.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="ti ti-trash"></i> Delete</button>
                                    </form>
                                    <a href="/transaksi-order/casier/{{ $item->id }}" class="btn btn-secondary"><i class="ti ti-plus"></i> Order</a>
                                </div>
                                    <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                            <form action="{{ route('konsumen.update', $item->id) }}" method="POST">
                                                @method('PUT')
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" type="text" value="{{ $item->nama }}" name="nama" id="nama" placeholder="">
                                                        <label for="nama">Nama</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" type="text" value="{{ $item->no_hp }}" name="no_hp" id="no_hp" placeholder="">
                                                        <label for="no_hp">No HP</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input class="form-control" type="textarea" name="alamat" id="alamat">
                                                        <label for="alamat">Alamat</label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
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
@endsection