<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationalLevel extends Model
{
    protected $table = 'tbl_educational_level';

    public function academic_honors(){
        return $this->hasMany('App\AcademicHonors','educ_background_id','id');
    }

}
