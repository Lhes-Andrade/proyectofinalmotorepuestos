<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GestionUsuariosController extends Controller
{
    /**
     * Listado de usuarios con filtro por nombre y correo.
     */
    public function index(Request $request): View
    {
        $usuarios = User::query()
            ->when($request->filled('nombre'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->input('nombre') . '%');
            })
            ->when($request->filled('correo'), function ($query) use ($request) {
                $query->where('email', 'like', '%' . $request->input('correo') . '%');
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        return view('admin.usuarios', [
            'usuarios' => $usuarios,
            'roles' => UserRole::cases(),
        ]);
    }

    /**
     * Actualiza el rol de un usuario específico.
     */
    public function actualizarRol(Request $request, User $usuario): RedirectResponse
    {
        $request->validate([
            'role' => 'required|in:' . implode(',', array_column(UserRole::cases(), 'value')),
        ]);

        // Un administrador no puede cambiarse el rol a sí mismo
        // (evita que se quede bloqueado fuera del panel por accidente).
        if ($usuario->id === $request->user()->id) {
            return back()->with('error', 'No puedes cambiar tu propio rol.');
        }

        $usuario->update(['role' => $request->input('role')]);

        return back()->with('success', "El rol de {$usuario->name} se actualizó correctamente.");
    }
}
