<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmpTrainings extends Model
{
    protected $table = 'tbl_trainings_and_seminars_attended';

    protected $appends = ['TrainingDuration'];

    public function getTrainingDurationAttribute(){
        return \Carbon\Carbon::parse($this->date_from)->isoFormat('LL') . ' - ' . \Carbon\Carbon::parse($this->date_to)->isoFormat('LL');
    }
}
