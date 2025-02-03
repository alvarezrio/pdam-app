@php
use Carbon\Carbon;
// Mendapatkan bulan saat ini dan menghitung 6 bulan ke belakang
$bulanSaatIni = Carbon::now();
$bulan = [];
for ($i = 6; $i > 0; $i--) {
$bulan[] = $bulanSaatIni->copy()->subMonths($i)->isoFormat('MMMM YYYY');
}
@endphp
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@extends('layouts.app')

@section('content')
    <br>
    <br>
    <section>
        <div class="container">
            <br>
            <br>
            <br>
            <h1 class="text-center my-4">Petugas - Pencatatan Meteran Bulanan</h1>
            <br>
            <br>
            <!-- Toast Notification -->
            @if(session('success'))
            <div class="toast" style="position: absolute; top: 20px; right: 20px;">
                <div class="toast-header">
                    <strong class="mr-auto text-primary">Sukses</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
            @endif
            <!-- Search Form -->
            <form action="{{ route('petugas') }}" method="GET" class="mb-4">
                @csrf
                <div class="form-group">
                    <label for="searchQuery">Pencarian Pelanggan:</label>
                    <input type="text" class="form-control" id="searchQuery" name="searchQuery" placeholder="Masukan NIK atau Nama" required>
                    <br>
                    <button type="submit" class="btn btn-info mt-2">Cari Pelanggan</button>
                </div>
            </form>

            <!-- Display Results and Meter Entry Forms -->
            @if(!empty($consumers) && $consumers->isNotEmpty())
                @foreach ($consumers as $consumer)
                <div class="card mb-3">
                    <div class="card-header">
                        Nama Pelanggan: {{ $consumer->nama }} - NIK: {{ $consumer->nik }}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('submitReading', $consumer->nik) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="currentReading">Catat Meteran Pelanggan Bulan Ini:</label>
                                <input type="number" class="form-control" id="currentReading" name="currentReading" placeholder="Masukkan pembacaan meter saat ini" required>
                            </div>
                            <div class="form-group">
                                <label for="masaTagihan">Masa Tagihan:</label>
                                <select class="form-control" id="masaTagihan" name="masaTagihan" required>
                                    <option value="">Pilih Bulan</option>
                                    @foreach ($bulan as $b)
                                        <option value="{{ $b }}">{{ $b }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="notes">Catatan (opsional):</label>
                                <textarea class="form-control" id="notes" name="notes"></textarea>
                            </div>
                            <br>
                            <button id="submitForm" type="submit" class="btn btn-primary">Submit Pencatatan</button>
                            <br>
                        </form>
                    </div>
                </div>
                @endforeach
            @else
                <p>No consumers found.</p>
            @endif
        </div>
    </section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
@endsection
