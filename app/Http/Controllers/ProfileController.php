<?php

namespace App\Http\Controllers;

//use App\Skill;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_name = User::find(Auth::user()->id)->person->firstname . " " . User::find(Auth::user()->id)->person->lastname;

        return view("/profile/index", compact('user_name'));
    }

    public function addSkill(Request $request)
    {
//        $skill = new Skill;
//
//        $skill->skill = $request->skill;
//        $skill->person_id = Auth::person()->id;

        dd(User::find(Auth::user()->id)->person->firstname);
    }
}
