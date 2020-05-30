<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_roles')->insert([
            'title'=>'Пользователь',
        ]);
        DB::table('user_roles')->insert([
            'title'=>'Администратор',
        ]);
        DB::table('user_roles')->insert([
            'title'=>'Модератор',
        ]);
    }
}
