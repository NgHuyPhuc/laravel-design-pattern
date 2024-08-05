<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $test=[
            ["name"=>"test1"],
            ["name"=>"test2"],
            ["name"=>"test3"],
            ["name"=>"test4"]
        ];
        DB::table('test')->delete();
        DB::table('test')->insert($test);
    }
}
