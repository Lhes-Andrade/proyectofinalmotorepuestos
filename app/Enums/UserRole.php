<?php

namespace App\Enums;

enum UserRole: string
{
    case Cliente = 'cliente';
    case Administrador = 'administrador';

    /**
     * Nombre legible para mostrar en las vistas.
     */
    public function label(): string
    {
        return match ($this) {
            self::Cliente => 'Cliente',
            self::Administrador => 'Administrador',
        };
    }

    /**
     * Clase de Bootstrap para el badge de color según el rol.
     */
    public function badgeClass(): string
    {
        return match ($this) {
            self::Cliente => 'bg-secondary',
            self::Administrador => 'bg-danger',
        };
    }
}
