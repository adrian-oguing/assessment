<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    //

    public function index()
    {
        $transactions_sales = Transaction::sum('amount');
        $transactions = Transaction::orderBy('created_at', 'desc')->get();
        
        return view('transactions')->with(['transactions' => $transactions, 'total_sales' => $transactions_sales]);
    }
}
