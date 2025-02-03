@extends('layouts.app')

@section('content')
    <br>
    <br>
    <section class="certificates-area">
        <div class="container">
            <h1 class="sec-title text-center">Cek Riwayat Pembayaran</h1>
            <form method="POST" action="{{ route('checkPayment') }}">
                @csrf
                <div class="search-box form-group">
                    <label for="nikPelanggan" class="form-label">NIK Pelanggan</label>
                    <input type="text" id="nikPelanggan" name="nikPelanggan" placeholder="Masukkan NIK Pelanggan" class="form-control" required>
                </div>
                <br>
                <div class="btn-box">
                    <button type="submit" class="btn-one">
                        <div the "round"></div>
                        <span class="txt">Cek Pembayaran</span>
                    </button>
                </div>
            </form>
            <br>
            <div class="payment-history">
                <h3 class="title">Riwayat Pembayaran/Tagihan Konsumen</h3>
                <div class="decor">
                    <img src="assets/images/shape/decor.png" alt="">
                </div>
                @if(isset($pelanggan))
                    <p>Nama: {{ $pelanggan->nama }}</p>
                    <p>NIK: {{ $pelanggan->nik }}</p>
                @endif
                <br>
                <table class="table" id="paymentHistory">
                    <thead>
                        <tr>
                            <th class="th">Bulan</th>
                            <th class="th">Jumlah Tagihan</th>
                            <th class="th">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($tagihan) && !$tagihan->isEmpty())
                            @foreach($tagihan as $item)
                                <tr>
                                    <td>{{ $item->tagihan_masaTagihan }}</td>
                                    <td>Rp. {{ number_format($item->tagihan_jmlTagihan, 2) }}</td>
                                    <td>{{ $item->tagihan_statusPembayaran }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" class="text-center">Tidak ada data tagihan ditemukan.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
