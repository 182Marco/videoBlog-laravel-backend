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
        $categories = [ 
            [
               "name" => "Social Content",
               "id"  => "1",
            ],
            [
               "name" => "Campaign",
               "id"  => "2",
            ],
            [
               "name" => "Documentary/interviews",
               "id"  => "3",
            ],
            [
               "name" => "Fashion Film",
               "id"  => "4",
            ],
        ];

        foreach($categories as $category){
            // instance
            $new_category = new Category();
            // populate
            $new_category->name = $category['name'];
            $new_category->slug = Str::slug($category['name'], '-');
            // save
            $new_category->save();
        } 
    }
}
