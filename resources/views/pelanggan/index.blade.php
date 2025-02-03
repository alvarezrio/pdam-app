@extends('layouts.app')

@section('content')
    <br>
    <br>
    <!-- Start Consumer Dashboard Page -->
        <section>
            <div class="container mt-4">
                <br>
                <h1 class="text-center mb-4">Dashboard Pelanggan</h1>

                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="paymentTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="paid-tab" data-toggle="tab" href="#paid" role="tab" aria-controls="paid" aria-selected="true">Tagihan Terbayar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="unpaid-tab" data-toggle="tab" href="#unpaid" role="tab" aria-controls="unpaid" aria-selected="false">Belum Terbayar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pending-tab" data-toggle="tab" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Pending Payments</a>
                    </li>
                </ul>

                <!-- Tab content -->
                <div class="tab-content" id="paymentTabsContent">
                    <!-- Paid bills tab -->
                    <div class="tab-pane fade show active" id="paid" role="tabpanel" aria-labelledby="paid-tab">
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th>Tanggal Pembayaran</th>
                                    <th>Nilai Tagihan</th>
                                    <th>No. Faktur</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($paidBills as $bill)
                                <tr>
                                    <td>{{ $bill->tagihan_tglPembayaran }}</td>
                                    <td>Rp. {{ number_format($bill->tagihan_jmlDibayar, 0, '.', '.') }}</td>
                                    <td>{{ $bill->tagihan_nokwitansi }}</td>
                                    <td>{{ ucfirst($bill->tagihan_statusPembayaran) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Unpaid bills tab -->
                    <div class="tab-pane fade" id="unpaid" role="tabpanel" aria-labelledby="unpaid-tab">
                        <table class="table table-hover mt-3">
                            <thead>
                                <tr>
                                    <th>Tanggal Tagihan</th>
                                    <th>Nilai Tagihan</th>
                                    <th>Jatuh Tempo</th>
                                    <th>Pembayaran via Deposit</th>
                                    <th>Pembayaran via Transfer</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($unpaidBills as $bill)
                                <tr>
                                    <td>{{ $bill->tagihan_tglTagihan }}</td>
                                    <td>Rp. {{ number_format($bill->tagihan_jmlTagihan, 0, '.', '.') }}</td>
                                    <td>{{ $bill->tagihan_tglJatuhTempo }}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#depositModal-{{ $bill->id }}">
                                            Pay with Deposit
                                        </button>

                                        <!-- Deposit Payment Modal -->
                                        <div class="modal fade" id="depositModal-{{ $bill->id }}" tabindex="-1" aria-labelledby="depositModalLabel-{{ $bill->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="depositModalLabel-{{ $bill->id }}">Confirm Deposit Payment</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('payment.deposit', ['id' => $bill->id]) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="modal-body">
                                                            <p>Bulan/Masa Tagihan: {{ $bill->tagihan_masaTagihan }}</p>
                                                            <p>Nilai Tagihan: Rp. {{ number_format($bill->tagihan_jmlTagihan, 0, '.', '.') }}</p>
                                                            <input type="hidden" name="amount" value="{{ $bill->tagihan_jmlTagihan }}">
                                                            <p>Nilai Pelunasan: <input type="text" name="jmlDibayar" class="form-control" value="{{ $bill->tagihan_jmlTagihan }}"></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary">Confirm Payment</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#transferModal-{{ $bill->id }}">
                                                Upload Proof and Pay
                                            </button>
                                            <!-- Manual Payment Upload Modal -->
                                            <div class="modal fade" id="transferModal-{{ $bill->id }}" tabindex="-1" aria-labelledby="transferModalLabel-{{ $bill->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="transferModalLabel-{{ $bill->id }}">Upload Payment Proof</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{ route('payment.transfer', ['id' => $bill->id]) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="modal-body">
                                                                <input type="file" class="form-control mb-2" name="payment_proof" required>
                                                                <input type="hidden" name="jmlDibayar" value="{{ $bill->tagihan_jmlTagihan }}">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary">Submit Payment</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Pending bills tab -->
                    <div class="tab-pane fade" id="pending" role="tabpanel" aria-labelledby="pending-tab">
                        <table class="table table-hover mt-3">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Receipt No.</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendingBills as $bill)
                                <tr>
                                    <td>{{ $bill->tagihan_tglPembayaran }}</td>
                                    <td>Rp. {{ number_format($bill->tagihan_jmlDibayar, 0, '.', '.') }}</td>
                                    <td>{{ $bill->tagihan_nokwitansi }}</td>
                                    <td>{{ ucfirst($bill->tagihan_statusPembayaran) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </section>
    <!-- End Consumer Dashboard Page -->
    <br>
    <br>
@endsection
