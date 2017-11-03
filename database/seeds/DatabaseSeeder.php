<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipos')->insert([
            ['nome' => 'MATERIAL'],
            ['nome' => 'MÃO DE OBRA'],
            ['nome' => 'EQUIPAMENTOS'],
            ['nome' => 'TERCERIZADOS'],
            ['nome' => 'VERBAS'],
            ['nome' => 'CPUS'],
        ]);
    }
}
