<?php

use App\Persons;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PersonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Persons::class, 8)->create();
    }
}
