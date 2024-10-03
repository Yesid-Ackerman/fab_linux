<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    // Listar todas las transacciones
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    // Mostrar formulario para crear una nueva transacción
    public function create()
    {
        return view('transactions.create');
    }

    // Almacenar una nueva transacción
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'type' => 'required',
            'amount' => 'required|numeric',
            'reason' => 'required|string',
        ]);

        Transaction::create($request->all());
        return redirect()->route('transactions.index')->with('success', 'Transacción registrada');
    }
}
