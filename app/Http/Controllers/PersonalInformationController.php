<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmployeeBasicInformation;
use Auth;

class PersonalInformationController extends Controller
{
    public function index(){
        
        $myinfo = EmployeeBasicInformation::first();

       return view('myinfo',['myinfo' => $myinfo]);
    }
}
