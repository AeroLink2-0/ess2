<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpEmploymentDetails extends Model
{
    protected $table = 'tbl_emp_employment_details';

    public function emp_position(){
        return $this->hasOne('App\JobPositions','id','position_id');
    }
    public function employee_type(){
        return $this->hasOne('App\EmployeeType','id','employee_type_id');
    }

    public function emp_skills(){
        return $this->hasMany('App\EmployeeSkills','employee_id','employee_id');
    }
}
