<?php

use Illuminate\Database\Seeder;

class CivilStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $civil_status = [
            ["civil_status" => 'Single'],
            ["civil_status" => 'Married'],
            ["civil_status" => 'Separated'],
            ["civil_status" => 'Widow'],
            ["civil_status" =>'Widower'],
            ["civil_status" => 'Divorced/Annulled'],
        ];
        DB::table('tbl_civil_status')->insert($civil_status);
    }
}
