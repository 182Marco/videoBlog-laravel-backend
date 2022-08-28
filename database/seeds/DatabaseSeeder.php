<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    //This is need so if you run: php artisan db:seeed -> without
    // any other specification it will run all the seeders
    public function run()
    {
        $this->call([
            CategoriesTableSeeder::class,
            VideoTableSeeder::class,
            BiographiesTableSeeder::class,
            PhoneNumbersTableSeeder::class
        ]);
    }
}
