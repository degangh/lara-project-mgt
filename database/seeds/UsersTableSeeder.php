<?php

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
        //
        DB::table('users')->insert([
            'name' => 'degang',
            'email' => 'hdg@sina.com',
            'password' => bcrypt('123456'),
            'is_admin' => 1,
            'locale' => 'zh-CN'
        ]);

        DB::table('users')->insert([
            'name' => 'nicolas',
            'email' => 'nicolash@fusion-solutions.com.au',
            'password' => bcrypt('123456')
        ]);
    }
}
