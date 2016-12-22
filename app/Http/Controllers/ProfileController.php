<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Skill;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_name = User::find(Auth::user()->id)->person->firstname . " " . User::find(Auth::user()->id)->person->lastname;

//        dd(User::find(Auth::user()->id)->person->id);

//        return Skill::get('skill', 'person_id');
//        return Skill::where('skill', 'person_id');
//
        $skills = Skill::where('person_id', User::find(Auth::user()->id)->person->id)->get();
        $allSkills = Skill::where('person_id', User::find(Auth::user()->id)->person->id)->get();

        return view("/profile/index", compact('user_name', 'skills'));
    }

    public function addSkill(Request $request)
    {
        $skill = new Skill;

        $skill->skill = $request->skill;
        $skill->person_id = User::find(Auth::user()->id)->person->id;

        $skill->save();

        return back();

    }
}
