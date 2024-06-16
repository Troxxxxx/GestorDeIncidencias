<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Los comandos Artisan proporcionados por su aplicación.
     *
     * @var array
     */
    protected $commands = [
        // Registrar comandos aquí
        \App\Console\Commands\EncryptPasswords::class, // Comando para encriptar contraseñas
        \App\Console\Commands\EncryptUserPasswords::class,

    ];

    /**
     * Definir la programación de tareas de la aplicación.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Registrar los comandos de consola para la aplicación.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}