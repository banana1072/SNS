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
        for($i = 1; $i <= 10; $i++){
            strval($i);
            DB::table('users')->insert([

                ['username' => 'アトラス'.$i.'郎','mail'=>'atlas0'.$i.'@mail.com','password'=>'root','bio'=>'私はアトラス'.$i.'郎です。']

            ]);
            intval($i);
        }
    }
}
