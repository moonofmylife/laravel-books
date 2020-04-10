<?php

use App\Models\Renter;
use Illuminate\Database\Seeder;

class RentersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Renter::class, 50)->create();
    }
}
