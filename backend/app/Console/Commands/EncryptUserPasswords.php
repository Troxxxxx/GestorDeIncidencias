<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class EncryptUserPasswords extends Command
{
    protected $signature = 'encrypt:userpasswords';
    protected $description = 'Encrypt user passwords if they are not already encrypted';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $usuarios = Usuario::all();

        foreach ($usuarios as $usuario) {
            // Verificar si la contraseña necesita ser re-hashada
            if (Hash::needsRehash($usuario->CT_CONTRASENA)) {
                // Encriptar la contraseña
                $usuario->CT_CONTRASENA = Hash::make($usuario->CT_CONTRASENA);
                $usuario->save();

                // Mostrar un mensaje en la consola
                $this->info('Contraseña encriptada para el usuario: ' . $usuario->CT_CORREO);
            } else {
                // Mostrar un mensaje en la consola si la contraseña ya está encriptada
                $this->info('Contraseña ya encriptada para el usuario: ' . $usuario->CT_CORREO);
            }
        }

        $this->info('Proceso completado.');
    }
}