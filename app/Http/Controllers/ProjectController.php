<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Appointment;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

    public function bookAppointment(Request $request) {
        $appointment_id = $request->input('appointment_id');
        $department_name = $request->input('department_name');
        $appointment_date = $request->input('appointment_date');

        $exists = Booking::where('appointment_id', '=', $appointment_id)->exists();

        if($exists) {
            Session::flash('message', 'Appointment was already taken');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/');
        } else {
            $booking = new Booking;
            $booking->appointment_id = $appointment_id;
            $booking->department_name = $department_name;
            $booking->appointment_date = $appointment_date;
            $booking->username = Auth::user()->name;
            $booking->user_id = Auth::user()->id;

            $booking->save();

            Session::flash('message', 'Appointment taken');
            Session::flash('alert-class', 'alert-success');
            return redirect('/');
        }

    }
}
