<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpWorkExperience extends Model
{
    protected $table = 'tbl_work_experience';

    protected $appends = ['duration'];

    public function employee_type(){
        return $this->hasOne('App\EmployeeType','id','employee_type_id');
    }

    public function getDurationAttribute(){
        return \Carbon\Carbon::parse($this->date_from)->isoFormat('LL') . ' - ' . \Carbon\Carbon::parse($this->date_to)->isoFormat('LL');
    }
}
