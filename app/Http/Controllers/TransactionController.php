<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function purchaseGame($id)
    {
        // Logika pembelian, misalnya menyimpan data transaksi ke database
        $transaction = new Transaction([
            'game_id' => $id,
            'id' => auth()->id(), // Ganti 'id' menjadi 'user_id'
            'transaction_status' => 'success',
        ]);

        $transaction->save();

        // Tambahkan logika lainnya sesuai kebutuhan

        return redirect()->route('library')->with('success', 'Game purchased successfully!');
    }

    public function library()
    {
        // Ambil data transaksi yang dimiliki oleh user yang sedang login
        $userTransactions = Transaction::where('id', Auth::id())->get();

        return view('pages.library', compact('userTransactions'));
    }
}
