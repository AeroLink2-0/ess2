<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $table = 'tbl_payroll';

    protected $appends = ['duration','FullName'];

    public function getDurationAttribute(){
        return \Carbon\Carbon::parse($this->date_from)->isoFormat('LL') . " - " . \Carbon\Carbon::parse($this->date_to)->isoFormat('LL');
    }
    public function BasicInformation(){
        return $this->hasOne('App\EmployeeBasicInformation', 'employee_id', 'employee_id');
    }
    public function getFullNameAttribute(){
        if($this->BasicInformation->suffix_id == 1){
            return $this->BasicInformation->firstname . " " . $this->BasicInformation->middlename . " " . $this->BasicInformation->lastname . " ";
        }else{
            return $this->BasicInformation->firstname . " " . $this->BasicInformation->middlename . " " . $this->BasicInformation->lastname . " " . $this->BasicInformation->suffix->suffix_name;
        }
    }
}
