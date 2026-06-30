<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with('event')
            ->latest()
            ->paginate(10);

        return view('admin.transactions.index', compact('transactions'));
    }
}