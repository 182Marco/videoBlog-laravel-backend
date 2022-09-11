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
               "name" => "Campaign",
               "id"  => "1",
               "img"  => "defaultValue",
            ],
            [
               "name" => "Social Content",
               "id"  => "2",
               "img"  => "defaultValue",
            ],
            [
               "name" => "Fashion Film",
               "id"  => "3",
               "img"  => "defaultValue",
            ],
            [
               "name" => "Documentary/interviews",
               "id"  => "4",
               "img"  => "defaultValue",
            ],
        ];

        foreach($categories as $category){
            // instance
            $new_category = new Category();
            // populate
            $new_category->name = $category['name'];
            $new_category->slug = Str::slug($category['name'], '-');
            $new_category->img =  $category['img'];
            // save
            $new_category->save();
        } 
    }
}
