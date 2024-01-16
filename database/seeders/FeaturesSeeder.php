<?php

namespace Database\Seeders;

use App\Feature;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeaturesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('features')->insert([
            [
                'description' => 'Pagos electrónicos',
                'icon' => '<i class="fa fa-shopping-cart" aria-hidden="true"></i>'
            ],
            [
                'description' => 'Importacion / Exportacion Excel',
                'icon' => '<i class="fa fa-table" aria-hidden="true"></i>'
            ],
            [
                'description' => 'Envío de correo',
                'icon' => '<i class="fa fa-envelope" aria-hidden="true"></i>'
            ],
            [
                'description' => 'Gráficas (de reportes)',
                'icon' => '<i class="fa fa-thermometer-full" aria-hidden="true"></i>'
            ],
            [
                'description' => 'Seguridad con perfiles de acceso',
                'icon' => '<i class="fa fa-lock" aria-hidden="true"></i>'
            ],
            [
                'description' => 'Creación de PDF',
                'icon' => '<i class="fa fa-file" aria-hidden="true"></i>'
            ],
            [
                'description' => 'Escanéo QR',
                'icon' => '<i class="fa fa-qrcode" aria-hidden="true"></i>'
            ],
            [
                'description' => 'Animación digital',
                'icon' => '<i class="fa fa-film" aria-hidden="true"></i>'
            ],
            [
                'description' => 'Almacenamiento en tiempo real',
                'icon' => '<i class="fa fa-database" aria-hidden="true"></i>'
            ],
            [
                'description' => 'Notificaciones',
                'icon' => '<i class="fa fa-commenting" aria-hidden="true"></i>'
            ],
            [
                'description' => "Conexión con API's",
                'icon' => '<i class="fa-solid fa-right-left"></i>'
            ],
            [
                'description' => "Interfaz UX/UI",
                'icon' => '<i class="fa-solid fa-display"></i>'
            ],
        ]);
    }
}
