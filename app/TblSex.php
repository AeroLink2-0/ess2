<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblSex extends Model
{
    protected $table = 'tbl_sex';

    public function getSelectedGender($id){
        return TblSex::where('id','<>', $this->id)->get();
    }
}
