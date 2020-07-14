<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 3)->create();
//        factory(Category::class, 3)->create()->each(
//            function ($parent, $p) {
//                $childNumber = 2;
//                for ($i = 1; $i < $childNumber+1; $i++) {
//                    factory(Category::class)->create([
//                        'parent_id' => factory(Category::class)->states('child')->make()->parent_id
//                    ]);
//                }
//            }
//        );
    }
}
