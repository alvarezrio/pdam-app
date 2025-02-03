<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function payWithDeposit(Request $request, $id)
    {
        $bill = Tagihan::findOrFail($id);
        $deposit = Auth::user()->deposit; // assuming a one-to-one relation 'deposit' in User model

        if ($request->jmlDibayar == $bill->tagihan_jmlTagihan && $deposit->saldo >= $request->jmlDibayar) {
            $bill->tagihan_tglPembayaran = now();
            $bill->tagihan_jmlDibayar = $request->jmlDibayar;
            $bill->tagihan_metodePembayaran = 'deposit';
            $bill->tagihan_statusPembayaran = 'Lunas';
            $bill->tagihan_noKwitansi = Str::random(10); // requires 'use Illuminate\Support\Str;'
            $bill->save();

            $deposit->decrement('saldo', $request->jmlDibayar);

            return back()->with('success', 'Payment successful.');
        } else {
            return back()->with('error', 'Insufficient funds or mismatched payment amount.');
        }
    }

    public function payWithTransfer(Request $request, $id)
    {
        $request->validate([
            'payment_proof' => 'required|file|mimes:jpeg,png,pdf|max:2048',
            'jmlDibayar' => 'required|numeric',
        ]);

        $filePath = $request->file('payment_proof')->store('public/payment_proofs');
        $bill = Tagihan::findOrFail($id);
        $bill->tagihan_tglPembayaran = now();
        $bill->tagihan_jmlDibayar = $request->jmlDibayar;
        $bill->tagihan_metodePembayaran = 'transfer manual';
        $bill->tagihan_statusPembayaran = 'Pending';
        $bill->tagihan_nokwitansi = Str::random(10);
        $bill->payment_proof = $filePath;
        $bill->save();

        return back()->with('success', 'Proof of payment uploaded, pending approval.');
    }

    public function dashboard()
    {
        $recaps = Tagihan::selectRaw('
            QUARTER(tagihan_tglPembayaran) as quarter,
            SUM(tagihan_jmlDibayar) as total_collected,
            COUNT(id) as bills_paid,
            AVG(tagihan_jmlDibayar) as average_bill_value
        ')
        ->where('tagihan_statusPembayaran', 'Lunas')
        ->groupBy('quarter')
        ->orderBy('quarter')
        ->get()
        ->map(function ($item) {
            return [
                'period' => 'Q' . $item->quarter,
                'total_collected' => $item->total_collected,
                'bills_paid' => $item->bills_paid,
                'average_bill_value' => $item->average_bill_value,
                'total_outstanding' => Tagihan::where('tagihan_statusPembayaran', 'belum_dibayar')->sum('tagihan_jmlTagihan')
            ];
        });

        return view('kasir.dashboard', compact('recaps'));
    }


    public function kasir()
    {
        // Assume each Tagihan record is linked to a User and has a payment_proof if necessary.
        $pendingPayments = Tagihan::with('user')
            ->where('tagihan_statusPembayaran', 'pending')
            ->get();
        $approvedPayments = Tagihan::with('user')
            ->where('tagihan_statusPembayaran', 'Lunas')
            ->get();
        $deniedPayments = Tagihan::with('user') // Assuming there is a status for denied payments
            ->where('tagihan_statusPembayaran', 'Denied')
            ->get();

        return view('kasir.approval', [
            'pendingPayments' => $pendingPayments,
            'approvedPayments' => $approvedPayments,
            'deniedPayments' => $deniedPayments
        ]);
    }

    public function approve($id)
    {
        $bill = Tagihan::findOrFail($id);
        $bill->tagihan_statusPembayaran = 'Lunas';
        $bill->save();

        return back()->with('success', 'Payment has been approved.');
    }

    public function deny($id)
    {
        // Implement the logic to handle denial, e.g., logging, notifying the user, etc.
        return back()->with('error', 'Payment has been denied.');
    }


}
