<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TblSex;
use App\refregion;
use App\refprovince;
use App\refcitymun;
use App\refbrgy;
use App\EmployeeBasicInformation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\TblCivilStatus;
use App\Citizenship;
use Auth;
use Validator;
class PersonalInformationController extends Controller
{
    public function index(){

        $myinfo = EmployeeBasicInformation::
         with('emp_details.emp_type')
        ->with('emp_details.emp_position.job_category')
        ->with('emp_details.emp_position.department')
        ->with('emp_details.work_experience')
        ->with('emp_sex')
        ->with('civil_status')
        ->with('citizenship')
        ->with('emp_address.barangay')
        ->with('emp_address.citymun')
        ->with('emp_address.province')
        ->with('emp_address.region')
        ->with('emp_educ_background.educ_level')
        ->with('emp_educ_background.academic_honors')
        ->with('emp_family_background.incase_of_emergency')
        ->with('emp_trainings')
        ->with('emp_ids')
        ->where(['employee_id' => Auth::user()->employee_id])->first();

        return $myinfo;
        // return view('myinfo/index',['myinfo' => $myinfo,'gender' => $gender, 'civil_status'=> $civil_status]);
    }

    public function UpdateMainProfile(Request $request){
       $myinfo = EmployeeBasicInformation::where(['employee_id' => Auth::user()->employee_id])->first();
        $this->validate($request, [
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'contact_number' => 'required',
        ]);

     /*   if ($validator->fails()) {
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
        return redirect('/myinfo');*/
        $myinfo->date_of_birth = $request->date_of_birth;
        $myinfo->place_of_birth = $request->place_of_birth;
        $myinfo->sex_id = $request->sex_id;
        $myinfo->civil_status_id = $request->civil_status_id;
        $myinfo->blood_type = $request->blood_type;
        $myinfo->contact_number = $request->contact_number;
        $myinfo->save();

        //citizenship  
        $emp_citizenship->citizenship = $request->citizenship;
        $emp_citizenship->relation = $request->relation;
        $emp_citizenship->country = $request->country;
        $emp_citizenship->save();
    }
    public function civil_status(){
        $civil_status = TblCivilStatus::all();
        return $civil_status;
    }

    public function gender(){
        $gender = TblSex::all();
        return $gender;
    }
    public function UpdatePhoto(Request $request){
       $myinfo = EmployeeBasicInformation::where(['employee_id' => Auth::user()->employee_id])->first();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $extension_image = $image->getClientOriginalExtension();
            Storage::disk('public')->put('uploads/'.$image->getFilename().'.'.$extension_image, File::get($image));
            $myinfo->emp_img = $image->getFilename().'.'.$extension_image;
            $myinfo->save();
        }
    }
    public function regions(){
        $regions = refregion::all();
        return $regions;
    }
    public function provinces(){
        $province = refprovince::all();
        return $province;
    }
    public function citymun(){
        $citymun = refcitymun::all();
        return $citymun;
    }
    public function barangays(){
        $barangay = refbrgy::all();
        return  $barangay;
    }
    public function loadProvicesByRegion($regCode){
        $province = refprovince::where('regCode', $regCode)->get();
        return $province;
    }
    public function loadCitymunByProvince($provCode){
        $citymun = refcitymun::where('provCode', $provCode)->get();
        return $citymun;
    }
}
