<?php

use App\Entities\Bank;
use App\Entities\Banner;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 1)->create();
        factory(Banner::class, 20)->create();
        factory(\App\Entities\Product::class, 20)->create();
        factory(\App\Entities\Brand::class, 20)->create();
        factory(\App\Entities\Category::class, 20)->create();
        factory(\App\Entities\Contact::class, 20)->create();
        factory(\App\Entities\Page::class, 20)->create();
        factory(\App\Entities\Post::class, 20)->create();
    }
}
