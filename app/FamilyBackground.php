<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FamilyBackground extends Model
{
    protected $table = 'tbl_family_background';

    public function incase_of_emergency(){
        return $this->hasOne('App\InCaseOfEmergency','employee_id','employee_id');
    }
}
