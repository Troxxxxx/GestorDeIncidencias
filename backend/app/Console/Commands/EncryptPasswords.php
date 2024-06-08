<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class EncryptPasswords extends Command
{
    protected $signature = 'encrypt:passwords';
    protected $description = 'Encripta las contraseñas de los usuarios existentes';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $usuarios = Usuario::all();

        foreach ($usuarios as $usuario) {
            if (!Hash::needsRehash($usuario->CT_CONTRASENA)) {
                continue;
            }
            $usuario->CT_CONTRASENA = Hash::make($usuario->CT_CONTRASENA);
            $usuario->save();
            $this->info("Contraseña encriptada para usuario: {$usuario->CT_CORREO}");
        }

        $this->info('Contraseñas encriptadas correctamente.');
    }
}