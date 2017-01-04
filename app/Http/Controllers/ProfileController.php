<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Person;
use App\Models\Skill;
use App\Models\Group;
use App\Models\Education;
use App\Models\EducationCollection;
use App\Models\School;
use App\Models\Job;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        setlocale(LC_TIME, 'Dutch');

        // Get the user's full name
        $fullname = User::find(Auth::user()->id)->person->firstname . " " . User::find(Auth::user()->id)->person->lastname;

        // Get the user's skills
        $skills = Skill::where('person_id', User::find(Auth::user()->id)->person->id)->get();

        // Get the person's ID
        $person = Person::find(User::find(Auth::user()->id)->person->id);

        // Get the person's information
        $autobiography = $person->autobiography;
        $birthday = $person->birthday->formatLocalized('%d %B %Y');
        $age = $person->birthday->age;

        if ($person->sex == 1) {
            $sex = 'Man';
        } elseif ($person->sex == 0) {
            $sex = 'Vrouw';
        }

        $userInfo = $person->user->userInformation;

        $address = $userInfo->address . " " . $userInfo->address_number . ", " . ucfirst($userInfo->city);

        $email = $person->user->email;

        $alternativeEmail = $userInfo->alternative_email;

        $phonenumber = $userInfo->mobile_number;
        $additionalPhonenumber = $userInfo->additional_number;

        // Define $groups to store the names of the groups this person is in or has been in
        $groups = array();

        // Define $educations to store the names of the educations this person is studying or has studied
        $educations = array();

        // Loop through the groups this person is in
        foreach ($person->group as $group) {
            // Get the name of the group of the current iteration and append it to $groups
            array_push($groups, Group::find($group->pivot->group_id)->name);

            // Get the name of the education of the current iteration and append it to $educations
            array_push($educations, Education::find(Group::find($group->pivot->group_id)->education_id)->name . " (" . EducationCollection::find(Education::find(Group::find($group->pivot->group_id)->education_id)->education_collection_id)->name . ")");
        }
        $school = School::find(Education::find(Group::find($group->pivot->group_id)->education_id)->school_id)->name;

        $diplomas = $person->diploma;

        $jobs = Job::where('person_id', $person->id)->get();


        return view('profile.index', compact('fullname', 'skills', 'school', 'educations', 'groups', 'autobiography', 'birthday', 'age', 'sex', 'address', 'email', 'alternativeEmail', 'phonenumber', 'additionalPhonenumber', 'diplomas', 'jobs'));
    }

    public
    function addSkill(Request $request)
    {
        $newSkills = $request->skills;
        $newSkillsArray = explode(',', $newSkills);

        foreach ($newSkillsArray as $newSkill) {
            $query = Skill::where('skill', $newSkill)->get();

            if ($query->count()) {
                \Session::flash('error', 'De skill "' . $newSkill . '" bestaat al in uw skills.');
            } else {
                $skill = new Skill;

                $skill->skill = $newSkill;
                $skill->person_id = User::find(Auth::user()->id)->person->id;

                $skill->save();
                \Session::flash('success', 'De skill "' . $newSkill . '" is toegevoegd aan uw skills.');
            }
        }

        return back();
    }

}
