<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TblSex;
use App\EmployeeBasicInformation;
use App\TblCivilStatus;
use App\Citizenship;
use Auth;
use Validator;
class PersonalInformationController extends Controller
{
    public function index(){
        $gender = TblSex::all();

        $civil_status = TblCivilStatus::all();

        $myinfo = EmployeeBasicInformation::where(['employee_id' => Auth::user()->employee_id])->first();

       return view('myinfo/index',['myinfo' => $myinfo,'gender' => $gender, 'civil_status'=> $civil_status]);
    }

    public function UpdateMainProfile(Request $request, $employee_id){
        $myinfo = EmployeeBasicInformation::where(['employee_id' => Auth::user()->employee_id])->first();

        $emp_citizenship = Citizenship::where(['employee_id' => Auth::user()->employee_id])->first();
        $validator = Validator::make($request->all(), [
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'contact_number' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('/myinfo')
                        ->withErrors($validator)
                        ->withInput();
        }else{
        $myinfo->date_of_birth = $request->date_of_birth;
        $myinfo->place_of_birth = $request->place_of_birth;
        $myinfo->sex_id = $request->gender;
        $myinfo->civil_status_id = $request->civil_status;
        //citizenship  
        $emp_citizenship->citizenship = $request->citizenship;
        $emp_citizenship->relation = $request->relation;
        $emp_citizenship->country = $request->country;
        $emp_citizenship->save();
        //

        $myinfo->blood_type = $request->blood_type;
        $myinfo->contact_number = $request->contact_number;
        $myinfo->save();
            return redirect('/myinfo');
        }
        return redirect('/myinfo');
    }
}
