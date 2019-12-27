<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpEducationalBackground extends Model
{
    protected $table = 'tbl_educational_background';

    public function educ_level(){
        return $this->hasOne('App\EducationalLevel','id','level_id');
    }
    public function academic_honors(){
        return $this->hasMany('App\AcademicHonors','educ_background_id','id');
    }
}
