<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Appointment;

class ProjectController extends Controller
{
//    public function getData(Request $request) {
//        $data = 'This is my data';
//        return view('index')->with('data', $data);
//    }

    public function getAllDepartments(Request $request) {
        $departments = Department::all();
        return view('index')->with('departments', $departments);
    }

    public function showAppointments(Request $request) {
        $department_id = $request->input('department_id');
        $appointments = Appointment::where('department_id', $department_id)->get();
        return view('appointments')->with('appointments', $appointments);
    }
}
