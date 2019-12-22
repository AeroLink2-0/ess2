<?php

use Illuminate\Database\Seeder;

class SexSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sex = [
            ["sex" => 'Female'],
            ["sex" => 'Male']
        ];
        DB::table('tbl_sex')->insert($sex);
    }
}
