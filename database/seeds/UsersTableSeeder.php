<?php
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin'.'@gmail.com',
            'password' => bcrypt('adminadmin'),
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'student',
            'email' => 'iamastudent@gmail.com',
            'role' => 'student',
            'password' => bcrypt('studentstudent'),
          ]);
    }
}
