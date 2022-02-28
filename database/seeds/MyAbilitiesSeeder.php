<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MyAbilitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_abilities')->insert([
            [
                'name' => 'HTML',
                'level' => 'AVANZADO',
            ],
            [
                'name' => 'CSS',
                'level' => 'INTERMEDIO',
            ],
            [
                'name' => 'Javascript',
                'level' => 'INTERMEDIO',
            ],
            [
                'name' => 'PHP',
                'level' => 'AVANZADO',
            ],
            [
                'name' => 'Python',
                'level' => 'INTERMEDIO',
            ],
            [
                'name' => 'Bootstrap',
                'level' => 'AVANZADO',
            ],
            [
                'name' => 'Laravel',
                'level' => 'AVANZADO',
            ],
            [
                'name' => 'Express',
                'level' => 'BÁSICO',
            ],
            [
                'name' => 'Node.js',
                'level' => 'BÁSICO',
            ],
            [
                'name' => 'AJAX',
                'level' => 'INTERMEDIO',
            ],
            [
                'name' => 'CPanel',
                'level' => 'INTERMEDIO',
            ],
            [
                'name' => 'MongoDB',
                'level' => 'BÁSICO',
            ],
            [
                'name' => 'MySQL',
                'level' => 'AVANZADO',
            ],
            [
                'name' => 'PostgreSQL',
                'level' => 'BÁSICO',
            ],
            [
                'name' => 'Linux',
                'level' => 'INTERMEDIO',
            ],
            [
                'name' => 'Git',
                'level' => 'INTERMEDIO',
            ],
        ]);
    }
}
