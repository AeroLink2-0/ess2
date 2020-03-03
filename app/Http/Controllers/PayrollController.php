<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payroll;
use Auth;
use DB;
use PDF;
class PayrollController extends Controller
{
    public function index(){
       $emp_payroll = Payroll::
       with('BasicInformation')
       ->where(['employee_id' => Auth::user()->employee_id])->get();
       return $emp_payroll;
    }

    public function PrintPayslip($id){
        $mypayslip = Payroll::
        where(['id' => $id])->first();

        return $mypayslip;
    }
}
