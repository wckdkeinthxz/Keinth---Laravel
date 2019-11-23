<?php

use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('students')->insert([
            'first_name' => 'Keinthong Cloud',
            'middle_name' => 'Duan',
            'last_name' => 'Cañete'
        ]);

         DB::table('students')->insert([
            'first_name' => 'Marklo',
            'middle_name' => 'Cabanig',
            'last_name' => 'Toribio'
        ]);

         DB::table('students')->insert([
            'first_name' => 'Leolo',
            'middle_name' => 'Eleksyon',
            'last_name' => 'Baguio'
        ]);
    }
}
