@extends('layouts.app')

@section('content')
<br>
<br>
<!--Start Teller Dashboard area-->
<section>
    <div class="container">
        <h1 class="text-center my-4">Dashboard - Pembayaran Tagihan</h1>

        <!-- Total Recap -->
        <div class="mb-5">
            <h2>Rekapitulasi Pembayaran</h2>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Triwulan</th>
                        <th>Total Pembayaran</th>
                        <th>Total Transaksi</th>
                        <th>Total Piutang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recaps as $recap)
                        <tr>
                            <td>{{ $recap['period'] }}</td>
                            <td>Rp. {{ number_format($recap['total_collected'], 2, '.', '.') }}</td>
                            <td>{{ $recap['bills_paid'] }}</td>
                            <td>Rp. {{ number_format($recap['total_outstanding'], 2, '.', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
<!--End Teller Dashboard area-->


<br>
<br>
@endsection

