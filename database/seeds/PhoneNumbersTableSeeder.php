<?php

use Illuminate\Database\Seeder;
use App\PhoneNumber;

class PhoneNumbersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
              // instance
              $new_phoneNumber = new PhoneNumber();
              // populate
              $new_phoneNumber->number = "+39 393 2055475";
              // save
              $new_phoneNumber->save();
    }
}
