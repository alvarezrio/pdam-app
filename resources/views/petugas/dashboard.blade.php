@extends('layouts.app')

@section('content')
<br>
<br>
<br>
<br>
<div class="container">
    <h1>Dashboard Petugas</h1>
    <form method="POST" action="{{ route('petugas.dashboard.submit') }}">
        @csrf
        <div class="form-group">
            <label for="monthSelect">Pilih Bulan/Masa Tagihan:</label>
            <select class="form-control" id="monthSelect" name="month">
                @php
                    $currentMonth = now()->month;
                    $currentYear = now()->year;
                @endphp
                @for($month = 1; $month <= $currentMonth; $month++)
                    <option value="{{ $month }}">{{ \Carbon\Carbon::create($currentYear, $month)->format('M Y') }}</option>
                @endfor
            </select>
        </div>
        <br>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Tampilkan</button>
        </div>
    </form>
    @if(isset($summary))
    <br>
        <h3>Rekapitulasi Pencatatan Meteran</h3>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>Jumlah Pelanggan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Sudah Dicatat</td>
                    <td>{{ $summary['recorded'] }}</td>
                </tr>
                <tr>
                    <td>Belum Dicatat</td>
                    <td>{{ $summary['not_recorded'] }}</td>
                </tr>
            </tbody>
        </table>
    @endif
</div>
@endsection
