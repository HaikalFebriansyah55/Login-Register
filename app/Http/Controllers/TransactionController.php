<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TransactionController extends Controller
{
    public function purchaseGame($id)
    {
        try {
            $existingTransaction = Transaction::where('game_id', $id)
                ->where('id', auth()->id())
                ->firstOrFail();
    
            // Jika game_id sudah ada, tampilkan pesan error atau lakukan tindakan lain sesuai kebutuhan
            return redirect()->route('gameDetail', $id)->with('error', 'You have already purchased this game.');
        } catch (ModelNotFoundException $exception) {
            // Game belum dibeli, lanjutkan dengan proses pembelian
            $transaction = new Transaction([
                'game_id' => $id,
                'id' => auth()->id(), 
                'transaction_status' => 'success',
                'transaction_date' => now(),
            ]);
    
            $transaction->save();
    
            // Tambahkan logika lainnya sesuai kebutuhan
    
            return redirect()->route('library')->with('success', 'Game purchased successfully!');
        }
    }
    public function library()
    {
        // Ambil data transaksi yang dimiliki oleh user yang sedang login
        $userTransactions = Transaction::where('id', Auth::id())->get();

        return view('pages.library', compact('userTransactions'),[
            'title'=>"Library"
        ]);
    }
}
