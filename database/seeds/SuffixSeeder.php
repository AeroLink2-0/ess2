<?php

use Illuminate\Database\Seeder;

class SuffixSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $suffix = [
            ["suffix" => 'None'],
            ["suffix" => 'Jr.'],
            ["suffix" => 'Sr.'],
            ["suffix" => 'II'],
            ["suffix" => 'III'],
            ["suffix" => 'IV'],
            ["suffix" => 'V']
        ];
        DB::table('tbl_suffix')->insert($suffix);
    }
}
