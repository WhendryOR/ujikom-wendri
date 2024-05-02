@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="statistics-details d-flex align-items-center justify-content-between">
            <div>
                <h6 class="stat-text"><b>Jumlah Konsumen</b></h6>
                <h3 class="rate-percentage text-center">{{ $konsumen }}</h3>
            </div>
            <div>
                <h6 class="stat-text"><b>Jumlah Order</b></h6>
                <h3 class="rate-percentage text-center">{{ $order }}</h3>
            </div>
            <div>
                <h6 class="stat-text"><b>Pendapatan Harian</b></h6>
                <h3 class="rate-percentage text-center">Rp. {{ $pendapatan }}</h3>
            </div>
            <div>
                <h6 class="stat-text"><b>Pendapatan Bulanan</b></h6>
                <h3 class="rate-percentage text-center">Rp. {{ $pendapatanBulanan }}</h3>
            </div>
        </div>
    </div>
</div>
@endsection