<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Mostrar todos los clientes con filtros y búsqueda
    public function index(Request $request)
    {
        $query = Cliente::query();

        // Filtro de búsqueda por nombre o correo
        if ($request->filled('buscar')) {
            $query->where('nombre_c', 'like', '%' . $request->buscar . '%')
                  ->orWhere('correo_c', 'like', '%' . $request->buscar . '%');
        }

        // Filtro por dirección (opcional, puedes cambiarlo por otro campo)
        if ($request->filled('direccion')) {
            $query->where('direccion_c', 'like', '%' . $request->direccion . '%');
        }

        // Paginación de resultados
        $clientes = $query->paginate(10);

        return view('clientes.index', compact('clientes'));
    }

    // Métodos restantes: store, update, destroy (sin cambios)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_c' => 'required|string|max:255',
            'correo_c' => 'required|string|email|max:255|unique:clientes',
            'telefono_c' => 'nullable|string',
            'direccion_c' => 'nullable|string',
            'clave_c' => 'required|string|min:6',
        ]);

        Cliente::create($validated);

        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente');
    }

    public function update(Request $request)
    {
        $cliente = Cliente::findOrFail($request->id_c);
        $cliente->update($request->only(['nombre_c', 'correo_c', 'telefono_c', 'direccion_c']));

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }

    public function destroy(Request $request)
    {
        $cliente = Cliente::findOrFail($request->id_c);
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente');
    }
}
