<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function HomeMain(){
        $teachers = Teacher::all();
        return view('frontend.index', compact('teachers'));
    }// end mehtod 
    
}
