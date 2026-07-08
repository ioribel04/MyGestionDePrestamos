<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index(Request $request)
{
    $buscar = $request->buscar;

    $clientes = Cliente::when($buscar, function ($query, $buscar) {
        $query->where('nombre', 'ILIKE', "%{$buscar}%")
              ->orWhere('apellido', 'ILIKE', "%{$buscar}%")
              ->orWhere('cedula', 'ILIKE', "%{$buscar}%");
    })
    ->orderBy('id', 'desc')
    ->paginate(10)
    ->withQueryString();

    return view('clientes.index', compact('clientes', 'buscar'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'nombre' => 'required|max:100',
        'apellido' => 'required|max:100',
        'cedula' => 'required|unique:clientes,cedula',
        'telefono' => 'required|max:20',
        'correo' => 'nullable|email',
        'direccion' => 'required',
        'observaciones' => 'nullable',
    ]);

    Cliente::create([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'cedula' => $request->cedula,
        'telefono' => $request->telefono,
        'correo' => $request->correo,
        'direccion' => $request->direccion,
        'estado' => true,
        'observaciones' => $request->observaciones,
    ]);

    return redirect()
        ->route('clientes.index')
        ->with('success', 'Cliente registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
           $request->validate([
        'nombre' => 'required|max:100',
        'apellido' => 'required|max:100',
        'cedula' => 'required|unique:clientes,cedula,' . $cliente->id,
        'telefono' => 'required|max:20',
        'correo' => 'nullable|email',
        'direccion' => 'required',
        'observaciones' => 'nullable',
    ]);

    $cliente->update([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'cedula' => $request->cedula,
        'telefono' => $request->telefono,
        'correo' => $request->correo,
        'direccion' => $request->direccion,
        'observaciones' => $request->observaciones,
    ]);

    return redirect()
        ->route('clientes.index')
        ->with('success', 'Cliente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
         $cliente->delete();

    return redirect()
        ->route('clientes.index')
        ->with('success', 'Cliente eliminado correctamente.');
    }
}
