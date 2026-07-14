<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $prestamos = Prestamo::with('cliente')
                    ->latest()
                    ->get();

    return view('prestamos.index', compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $clientes = Cliente::where('estado', true)
                ->orderBy('nombre')
                ->get();

    return view('prestamos.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'cliente_id' => 'required|exists:clientes,id',
        'monto' => 'required|numeric|min:1',
        'interes' => 'required|numeric|min:0',
        'fecha_prestamo' => 'required|date',
        'observaciones' => 'nullable|string'
    ]);

    Prestamo::create([
        'cliente_id'      => $request->cliente_id,
        'monto'           => $request->monto,
        'interes'         => $request->interes,
        'saldo_capital'   => $request->monto,
        'fecha_prestamo'  => $request->fecha_prestamo,
        'estado'          => true,
        'observaciones'   => $request->observaciones,
    ]);

    return redirect()
        ->route('prestamos.index')
        ->with('success', 'Préstamo registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestamo $prestamo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestamo $prestamo)
    {
        //
    }
}
