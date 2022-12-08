<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PostsTableSee extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
    {
        for ($i = 1; $i <= 43; $i++) {
            DB::table('posts')->insert([
                ['user_id' => $i, 'post' => 'テスト投稿です。']
            ]);
        }
    }
}
