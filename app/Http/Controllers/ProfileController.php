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
//        $allSkills = Skill::all();

        return view('profile.index', compact('user_name', 'skills', 'allSkills'));
    }

    public function addSkill(Request $request)
    {
//        dd($request->skills);

        $newSkills = $request->skills;
        $newSkillsArray = explode(',', $newSkills);

        foreach ($newSkillsArray as $newSkill) {
            $query = Skill::where('skill', $newSkill)->get();
//
//            dd($query);

            if($query->count()){
                \Session::flash('error', 'De skill "' . $newSkill . '" bestaat al in uw skills.');
            } else {
                $skill = new Skill;

                $skill->skill = $newSkill;
                $skill->person_id = User::find(Auth::user()->id)->person->id;

                $skill->save();
                \Session::flash('success', 'De skill "' . $newSkill . '" is toegevoegd aan uw skills.');
            }

//            $skill = new Skill;
//
//            $skill->skill = $newSkill;
//            $skill->person_id = User::find(Auth::user()->id)->person->id;
//
//            $skill->save();
        }

//        $skill = new Skill;
//
//        $skill->skill = $request->skill;
//        $skill->person_id = User::find(Auth::user()->id)->person->id;
//
//        $skill->save();

        return back();

    }

}
