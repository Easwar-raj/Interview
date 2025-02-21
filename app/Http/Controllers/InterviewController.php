<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterviewController extends Controller
{
    public function index()
    {
        return view('interview.layouts.home');
    }

    public function assessment()
    {

        return view('interview.layouts.test');
    }
}
