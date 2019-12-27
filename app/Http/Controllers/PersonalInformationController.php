<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeBasicInformation;
use Auth;

class PersonalInformationController extends Controller
{
    public function index(){
        
        $myinfo = EmployeeBasicInformation::where(['employee_id' => Auth::user()->employee_id])->first();

       return view('myinfo/index',['myinfo' => $myinfo]);
    }
}
