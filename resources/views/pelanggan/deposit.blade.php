@extends('layouts.app')

@section('content')
<br>
<br>

<!-- Start Enhanced Deposit Balance Management Page -->
<section>
    <div class="container mt-4">
        <h1 class="text-center my-4">Manajemen Saldo Deposit</h1>

        <!-- Current Balance Display -->
        <div class="current-balance mb-4">
            <h2>Deposit Pelanggan</h2>
            <div class="alert alert-info" role="alert">
                Saldo saat ini: <strong>Rp.{{ number_format($saldo, 2, ',', '.') }}</strong>
            </div>
        </div>

        <!-- Deposit Funds Form -->
        <div class="deposit-form mb-5">
            <h2>Isi ulang saldo deposit</h2>
            <form action="{{ route('deposit.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="depositAmount">jumlah:</label>
                    <input type="number" class="form-control" id="depositAmount" name="depositAmount" placeholder="Masukan nilai deposit" required>
                </div>
                <button type="submit" class="btn btn-success">Proses Deposit</button>
            </form>
        </div>
    </div>
</section>
<!-- End Enhanced Deposit Balance Management Page -->

<br>
<br>
@endsection




