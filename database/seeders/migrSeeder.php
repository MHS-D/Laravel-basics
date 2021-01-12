<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class migrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('migr')->insert([
            'name'=>Str::random(5),
            'address'=>Str::random(5).'ay 7aga' 
        ]);
    }
}
