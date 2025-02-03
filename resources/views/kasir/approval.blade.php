@extends('layouts.app')

@section('content')
<br>
<br>
<!--Start Teller Approval Dashboard area-->
    <section>
        <div class="container">
            <h1 class="text-center my-4">Teller Approval Dashboard</h1>

            <!-- Pending Approvals -->
            <div class="pending-approvals mb-5">
                <h2>Pending Approvals</h2>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>User Name</th>
                            <th>Payment Proof</th>
                            <th>Date Uploaded</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendingPayments as $index => $payment)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $payment->user->name }} - {{ $payment->user->nik }}</td>
                                <td><a href="{{ Storage::url($payment->payment_proof) }}" target="_blank">View File</a></td>
                                <td>{{ $payment->tagihan_tglPembayaran }}</td>
                                <td>
                                    <form action="{{ route('approve.payment', $payment->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success">Approve</button>
                                    </form>
                                    <form action="{{ route('deny.payment', $payment->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Deny</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
<!--End Teller Approval Dashboard area-->
<br>
<br>
@endsection

