<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function getData(Request $request) {
        $data = 'This is my data';
        return view('index')->with('data', $data);
    }
}
