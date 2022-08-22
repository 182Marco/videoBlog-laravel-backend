<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [ 'Social Content', 'Campaign', 'Documentary/interviews', 'Fashion Film' ];

        foreach($categories as $category){
            // instance
            $new_category = new Category();
            // populate
            $new_category->name = $category;
            $new_category->slug = Str::slug($category, '-');
            // save
            $new_category->save();
        } 
    }
}
