<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Computer/IT',
        ]);
        DB::table('categories')->insert([
            'name' => 'Health Sciences',
        ]);
        DB::table('categories')->insert([
            'name' => 'Criminology',
        ]);
        DB::table('categories')->insert([
            'name' => 'Accounting',
        ]);
        DB::table('categories')->insert([
            'name' => 'Science',
        ]);
        DB::table('categories')->insert([
            'name' => 'math',
        ]);
    }
}
