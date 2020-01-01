<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TblSex;
use App\EmployeeBasicInformation;
use App\TblCivilStatus;
use Auth;

class PersonalInformationController extends Controller
{
    public function index(){
        $gender = TblSex::all();
        $civil_status = TblCivilStatus::all();
        $myinfo = EmployeeBasicInformation::where(['employee_id' => Auth::user()->employee_id])->first();

       return view('myinfo/index',['myinfo' => $myinfo,'gender' => $gender, 'civil_status'=> $civil_status]);
    }

    public function UpdateBasicInfo(Request $req){
        $myinfo = EmployeeBasicInformation::where(['employee_id' => Auth::user()->employee_id])->first();
      /*  $validator = Validator::make($request->all(), [
            'edit_skill_name' => 'required',
            'edit_skill_color' => 'required',
            'edit_percent' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/admin/skills/updateSkillForm/'.$skill->id)
                        ->withErrors($validator)
                        ->withInput();
        }else{
        $skill = SkillsModel::find($id);
        $skill->skill = $request->edit_skill_name;
        $skill->color = $request->edit_skill_color;
        $skill->percent = $request->edit_percent;
        $skill->save();
            return redirect('/admin/skills/updateSkillForm/'.$skill->id)->with('success','Skill Updated!');
        }*/
    }
}
