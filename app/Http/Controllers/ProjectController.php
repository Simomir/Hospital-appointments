<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

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
}
