<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MethodsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::transaction(function () {
            App\Method::create(['id' => App\Method::ID_SUM, 'name' => 'suma']);
            App\Method::create(['id' => App\Method::ID_DOMINANT, 'name' => 'moda']);
        });
    }
}
