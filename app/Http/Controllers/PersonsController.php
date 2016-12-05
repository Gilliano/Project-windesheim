<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePerson;
use App\Models\User;
use App\Models\PrivacyLevel;
use App\Models\Person;

class PersonsController extends Controller
{
    public function index()
    {
        $users = User::all();
        $privacys = PrivacyLevel::all();
        // TODO: Get all classes
        $persons = Person::orderBy('created_at', 'desc')->get();

        return view("/persons/index", compact('users', 'privacys', 'persons'));
    }

    public function store(StorePerson $request)
    {
//        dd($request->input());
        $person = new Person([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'birthday' => $request->input('birthday')==''?null:$request->input('birthday'),
            'autobiography' => $request->input('biography'),
            'users_id' => $request->input('user'),
            'privacy_levels_id' => $request->input('privacy'),
//            'classes_id' => $request->input('class'),
        ]);

        $person->save();

        return redirect('/persons')->with('status', 'Person has been succesfully added to the database!');
    }

    public function edit($id)
    {
        $users = User::all();
        $privacys = PrivacyLevel::all();
        // TODO: Get all classes
        $persons = Person::all();
        $current_person = Person::find($id);

        return view('/persons/edit', compact('users', 'privacys', 'persons', 'current_person'));
    }

    public function update(StorePerson $request, $id)
    {
        if(strtolower($request->input('submit')) == "delete")
        {
            $person = Person::find($id);
            $person->delete();

            return redirect('/persons')->with('status', 'Person has been succesfully removed!');
        }
        else if(strtolower($request->input('submit')) == "update")
        {
            $person = Person::find($id);
            $person->firstname = $request->input('firstname');
            $person->lastname = $request->input('lastname');
            $person->birthday = $request->input('birthday') == '' ? null : $request->input('birthday');
            $person->autobiography = $request->input('biography');
            $person->users_id = $request->input('user');
            $person->privacy_levels_id = $request->input('privacy');
//        $person->classes_id = $request->input('class');

            $person->save();

            return redirect('/persons')->with('status', 'Person has been succesfully updated!');
        }
    }
}
