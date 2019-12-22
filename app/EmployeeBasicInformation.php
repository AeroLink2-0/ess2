<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeBasicInformation extends Model
{

    protected $table = 'tbl_basic_information';

    protected $guarded = [
        ['employee_id']
    ];
 
    public function getFullNameAttribute()
    {
       return $this->firstname . ' ' . $this->middlename . ' ' . $this->lastname . ' ' . $this->suffix_name();
    }
    public function getBirthdayAttribute()
    {
        return \Carbon\Carbon::parse($this->date_of_birth)->isoFormat('LL');
    }

    public function emp_details() {
        return $this->hasOne('App\EmpEmploymentDetails', 'employee_id', 'employee_id');
    }
    public function suffix() {
        return $this->hasOne('App\TblSuffix', 'id', 'suffix_id');
    }

    public function suffix_name(){
        return ($this->suffix->suffix_name == 'None' ? '' : $this->suffix->suffix_name );
    }

    public function emp_sex(){
        return $this->hasOne('App\TblSex', 'id', 'sex_id');
    }
    public function civil_status(){
        return $this->hasOne('App\TblCivilStatus', 'id', 'civil_status_id');
    }
    public function citizenship(){
        return $this->hasOne('App\Citizenship', 'id', 'citizenship_id');
    }

    public function height(){
        return ($this->height == 0) ?  '-' : $this->height;
    }
    public function weight(){
        return ($this->weight == 0) ?  '-' : $this->weight;
    }
    public function blood_type(){
        return ($this->blood_type == '') ?  '-' : $this->blood_type;
    }
}
