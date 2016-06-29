<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Tags')->insert([
            'nombre' => 'Negocios',
        ]);

        DB::table('Tags')->insert([
            'nombre' => 'Educación',
        ]);

        DB::table('Tags')->insert([
            'nombre' => 'Salud',
        ]);
        DB::table('Tags')->insert([
            'nombre' => 'Deportes',
        ]);
        DB::table('Tags')->insert([
            'nombre' => 'Tecnología',
        ]);
        DB::table('Tags')->insert([
            'nombre' => 'Medio Ambiente',
        ]);
        DB::table('Tags')->insert([
            'nombre' => 'Hogar',
        ]);
        DB::table('Tags')->insert([
            'nombre' => 'Sociedad',
        ]);
        DB::table('Tags')->insert([
            'nombre' => 'Astronomía',
        ]);
        DB::table('Tags')->insert([
            'nombre' => 'Ciencia',
        ]);
        DB::table('Tags')->insert([
            'nombre' => 'Entretenimiento',
        ]);
        DB::table('Tags')->insert([
            'nombre' => 'Otro',
        ]);


    }
}
