<?php

use Illuminate\Database\Seeder;

class FeedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Feeds::class, 5)->create();
    }
}
