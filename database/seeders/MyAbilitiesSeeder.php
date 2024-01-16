<?php

namespace Database\Seeders;

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
                'level' => '5 años',
            ],
            [
                'name' => 'CSS',
                'level' => '5 años',
            ],
            [
                'name' => 'Javascript',
                'level' => '5 años',
            ],
            [
                'name' => 'PHP',
                'level' => '4 años',
            ],
            [
                'name' => 'Python',
                'level' => '2 años',
            ],
            [
                'name' => 'Bootstrap',
                'level' => '5 años',
            ],
            [
                'name' => 'Laravel',
                'level' => '3 años',
            ],
            [
                'name' => 'Django',
                'level' => '6 meses',
            ],
            [
                'name' => 'Flask',
                'level' => '6 meses',
            ],
            [
                'name' => 'Node.js',
                'level' => '6 meses',
            ],
            [
                'name' => 'CPanel',
                'level' => '1 año',
            ],
            [
                'name' => 'MongoDB',
                'level' => '6 meses',
            ],
            [
                'name' => 'MySQL',
                'level' => '5 años',
            ],
            [
                'name' => 'PostgreSQL',
                'level' => '2 año',
            ],
            [
                'name' => 'Linux',
                'level' => '3 años',
            ],
            [
                'name' => 'Git',
                'level' => '3 años',
            ],
            [
                'name' => 'Angular',
                'level' => '3 meses',
            ],
            [
                'name' => 'Spring',
                'level' => '3 meses',
            ],
            [
                'name' => 'SOLR',
                'level' => '3 meses',
            ],
        ]);
    }
}
