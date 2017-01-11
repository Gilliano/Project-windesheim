<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class ChartsController extends Controller
{
    public function index()
    {
        $educations = Education::all();
        return view('charts/index')->with('educations', $educations);
    }
}
