<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        for ($i = 1; $i <= 3; $i++) {
            DB::table('follows')->insert([
                ['following_id' => 41, 'followed_id' => $i]
            ]);
        }
    }
}
