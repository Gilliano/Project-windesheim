<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Diploma;
use App\Models\Person;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;

class DiplomaController extends Controller
{
    public function index() {
    	$diplomas = Diploma::all();
    	$deletedDiplomas = Diploma::onlyTrashed()->get();

    	return view('diploma.index', compact('diplomas', 'deletedDiplomas'));
    }

    public function add() {
    	$schools = School::all();

    	return view('diploma.add', compact('schools'));
    }

    public function store(Request $request, Diploma $diploma) {
    	$date = date('Y-m-d');

    	if(Auth::id() === NULL) {
    		\Session::flash('error', 'U bent niet ingelogd en kunt daarom niets toevoegen.');
    		return back();
    	}
    	else {
	    	$person = User::find(Auth::id());

	    	$this->validate($request, [
	    		'graduated_year' => 'date|before:' . $date . '|required',
	    		'education' => 'string|min:1|max:45|required',
	    		'education_classcode' => 'string|nullable|max:25',
	    		'school_id' => 'required|nullable',
	    		'school_name' => 'string|nullable|max:45'
	    	]);

	    	$diploma = new Diploma;
	    	$diploma->graduated_year = $request->graduated_year;
	    	$diploma->education = $request->education;
	    	$diploma->education_classcode = $request->education_classcode;
	    	$diploma->person_id = $person->person->id;
	    	if($request->school_id === "NULL") {
	    		$diploma->school_id = NULL;
	    	}
	    	else {
	    		$diploma->school_id = $request->school_id;
	    	}
	    	$diploma->school_name = $request->school_name;
	    	$diploma->save();
	    	\Session::flash('success', 'U heeft het diploma succesvol toegevoegd.');
	    	return redirect()->action('DiplomaController@index');
	    }
    }

    public function edit(Diploma $diploma) {
    	$schools = School::all();
    	$person = User::find(Auth::id());

    	if($person->person->id === $diploma->person_id) {
    		return view('diploma.edit', compact('diploma', 'schools'));
    	}
    	else {
    		\Session::flash('error', 'Dit is niet uw diploma en kunt deze dus niet wijzigen.');
    		return back();
    	}
    }

    public function update(Request $request, Diploma $diploma) {
    	$date = date('Y-m-d');
		$this->validate($request, [
			'graduated_year' => 'required|date|before:' . $date . '',
			'education' => 'string|min:1|max:45|required',
			'education_classcode' => 'string|max:25|nullable',
			'school_id' => 'required|nullable',
			'school_name' => 'string|max:45|nullable'
		]);

		$diploma->graduated_year = $request->graduated_year;
		$diploma->education = $request->education;
		$diploma->education_classcode = $request->education_classcode;
		if($request->school_id === "NULL") {
			$diploma->school_id = NULL;
		}
		else {
			$diploma->school_id = $request->school_id;
		}
		$diploma->school_name = $request->school_name;
		$diploma->save();
		\Session::flash('success', 'Het diploma is succesvol gewijzigd.');
		return redirect()->action('DiplomaController@index');
    }
}
