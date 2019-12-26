<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpAddress extends Model
{
    protected $table = 'tbl_employee_address';

    public function barangay(){
        return $this->hasOne('App\refbrgy','id','barangay_id');
    }
    public function citymun(){
        return $this->hasOne('App\refcitymun','id','citymun_id');
    }
    public function province(){
        return $this->hasOne('App\refprovince','id','province_id');
    }
    public function region(){
        return $this->hasOne('App\refregion','id','region_id');
    }
}
