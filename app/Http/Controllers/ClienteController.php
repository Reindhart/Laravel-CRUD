<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ClienteController extends Controller
{
    // Método para mostrar todos los clientes (usado en el dashboard)
    public function index()
    {
        $clientes = Cliente::all();
        return view('dashboard', ['clientes' => $clientes]);
    }

    // Método para crear un cliente (store)
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validated = $request->validate([
            'nombre_c' => 'required|string|max:255',
            'correo_c' => 'required|string|email|max:255|unique:clientes',
            'telefono_c' => 'nullable|string',
            'direccion_c' => 'nullable|string',
            'clave_c' => 'required|string|min:6',
        ]);

        // Crear el nuevo cliente
        Cliente::create($validated);

        // Redirigir al dashboard con un mensaje de éxito
        return redirect()->route('dashboard')->with('success', 'Cliente creado exitosamente');
    }

    // Método para actualizar un cliente (update)
    public function update(Request $request)
    {
        $cliente = Cliente::findOrFail($request->id_c);
        $cliente->nombre_c = $request->nombre_c;
        $cliente->correo_c = $request->correo_c;
        $cliente->telefono_c = $request->telefono_c;
        $cliente->direccion_c = $request->direccion_c;
        $cliente->save();

        return redirect()->route('dashboard')->with('success', 'Cliente actualizado correctamente.');
    }

    // Método para eliminar un cliente (destroy)
    public function destroy(Request $request)
    {
        // Buscar el cliente
        $cliente = Cliente::findOrFail($request->id_c);

        // Eliminar el cliente
        $cliente->delete();

        // Redirigir con mensaje de éxito
        return redirect()->route('dashboard')->with('success', 'Cliente eliminado exitosamente');
    }
}
