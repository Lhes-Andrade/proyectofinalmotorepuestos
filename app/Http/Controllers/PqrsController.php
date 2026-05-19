<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pqrs;
use App\Models\RepuestoPersonalizado;

class PqrsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'correo' => 'required|email',
            'asunto' => 'required|string|max:100',
            'tipo' => 'required|in:Queja,Petición,Felicitaciones',
            'mensaje' => 'required|string',
            'acepto' => 'accepted'
        ]);

        // Crea una nueva fila en la tabla pqrs con los datos del formulario
        Pqrs::create([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'correo' => $request->correo,
            'asunto' => $request->asunto,
            'tipo' => $request->tipo,
            'mensaje' => $request->mensaje,
            // has() devuelve true/false según si el checkbox fue marcado
            'acepto' => $request->has('acepto')
        ]);

        return redirect()->route('contacto')->with('success', 'Datos enviados');
    }

    public function index()
    {
        // Consulta todos los mensajes ordenados del más reciente al más antiguo
        $mensajes = Pqrs::orderBy('id', 'desc')->get();

        // compact() envía la variable a la vista
        return view('registros', compact('mensajes'));
    }

    public function guardarSolicitud(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'correo' => 'required|email|max:150',
            'telefono' => 'required|string|max:20',
            'marca' => 'required|string|max:50',
            'modelo' => 'required|string|max:50',
            'anio' => 'required|integer|min:1950|max:' . date('Y'),
            'descripcion' => 'required|string',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $datos = $request->only([
            'nombre',
            'correo',
            'telefono',
            'marca',
            'modelo',
            'anio',
            'descripcion'
        ]);

        if ($request->hasFile('imagen')) {
            $ruta = $request->file('imagen')->store('repuestos_personalizados', 'public');
            $datos['imagen'] = $ruta;
        }

        RepuestoPersonalizado::create($datos);

        return back()->with('success', '¡Tu solicitud fue enviada correctamente! Te contactaremos pronto.');
    }

    public function edit($id)
    {
        // Buscamos el mensaje por id; si no existe, lanza error 404
        $mensaje = Pqrs::findOrFail($id);

        // Pasamos $mensaje (singular) a la vista de edición
        return view('registros_editar', compact('mensaje'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'correo' => 'required|email',
            'asunto' => 'required|string|max:100',
            'tipo' => 'required|in:Queja,Petición,Felicitaciones',
            'mensaje' => 'required|string',
            'acepto' => 'accepted'
        ]);

        $mensaje = Pqrs::findOrFail($id);

        $mensaje->update([
            'nombres' => $request->nombres,
            'apellidos' => $request->apellidos,
            'correo' => $request->correo,
            'asunto' => $request->asunto,
            'tipo' => $request->tipo,
            'mensaje' => $request->mensaje,
            'acepto' => $request->has('acepto')
        ]);

        return redirect()->route('registros')->with('success', 'Actualizado correctamente');
    }

    public function destroy($id)
    {
        // Buscamos el registro; si no existe lanza un error 404
        $mensaje = Pqrs::findOrFail($id);
        //Lo eliminamos de la base de datos
        $mensaje->delete();
        //Redirigimos al listado con mensaje de éxito
        return redirect()->route('registros')->with('success', 'Registro eliminado correctamente');
    }
}
