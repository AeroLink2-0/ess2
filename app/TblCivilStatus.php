<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblCivilStatus extends Model
{
    protected $table = 'tbl_civil_status';

    public function getSelectedCivilStatus($id){
        return TblCivilStatus::where('id','<>', $this->id)->get();
    }
}
