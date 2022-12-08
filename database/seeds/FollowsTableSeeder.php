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
        for ($i = 1; $i <= 10; $i++) {
            DB::table('follows')->insert([
                ['following_id' => $i, 'followed_id' => 41]
            ]);
        }
    }
}
