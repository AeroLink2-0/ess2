<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payroll;
use Auth;
class PayrollController extends Controller
{
    public function index(){
       $emp_payroll =  Payroll::where(['employee_id' => Auth::user()->employee_id])->first();
       return $emp_payroll;
    }
}
