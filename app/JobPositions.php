<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPositions extends Model
{
    protected $table = 'tbl_position';

    public function department(){
        return $this->hasOne('App\Department','id','department_id');
    }
    public function job_category(){
        return $this->hasOne('App\JobCategory','id','job_category_id');
    }
}
