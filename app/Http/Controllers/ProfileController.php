<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Skill;
use App\Models\Education;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_name = User::find(Auth::user()->id)->person->firstname . " " . User::find(Auth::user()->id)->person->lastname;

        $skills = Skill::where('person_id', User::find(Auth::user()->id)->person->id)->get();

        $personData = User::find(Auth::user()->id)->person->all();
        $groupData = User::find(Auth::user()->id)->person->group->all();
//        $educationData = User::find(Auth::user()->id)->person->group->education->all();
//        $schoolData = User::find(Auth::user()->id)->person->group->all();

        dd(Education::find(User::find(Auth::user()->id)->person->group->education_id)->all());

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

            if ($query->count()) {
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
