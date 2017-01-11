<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Group;
use App\Models\User;
use App\Models\Education;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function getGroups() {
    	$groups = Group::all();
    	$deletedGroups = Group::onlyTrashed()->get();

    	return view('group.index', compact('groups', 'deletedGroups'));
    }

    public function addGroup() {
    	$educations = Education::all();

    	return view('group.add', compact('educations'));
    }

    public function saveGroup(Request $request, Group $group) {
    	$date = date('Y-m-d');
    	$coordinator = User::has('person')->find(Auth::id());

    	$this->validate($request, [
    		'name' => 'min:1|max:45|required',
    		'description' => 'nullable',
    		'cohort_start' => 'date|before:' . $date . '|required',
    		'cohort_end' => 'date|after:' . $request->cohort_start . '|before:' . $date . '|required',
    		'started_amount' => 'numeric|required|min:1|max:100',
    		'education_id' => 'numeric|required|exists:educations,id'
    	]);

    	$group = new Group;
    	$group->name = $request->name;
    	$group->description = $request->description;
    	$group->coordinator_id = $coordinator->person->id;
    	$group->cohort_start = $request->cohort_start;
    	$group->cohort_end = $request->cohort_end;
    	$group->started_amount = $request->started_amount;
    	$group->education_id = $request->education_id;
    	$group->save();
    	\Session::flash('success', 'De klas: ' . $request->name . ' is succesvol toegevoegd.');
    	return redirect()->action('GroupController@getGroups');
    }

    public function editGroup(Group $group) {
    	$coordinator = User::find(Auth::id());
    	$users = User::all();

    	if($coordinator->person->id === $group->coordinator_id) {
	    	$educations = Education::all();

	    	return view('group.edit', compact('group', 'educations', 'users', 'coordinator'));
	    }
	    else {
	    	\Session::flash('error', 'U bent niet de coordinator van de klas: ' . $group->name . ' en kunt deze dus ook niet wijzigen.');
	    	return back();
	    }
	}

	public function updateGroup(Request $request, Group $group) {
		$date = date('Y-m-d');
		$coordinator = User::has('person')->find(Auth::id());

		$this->validate($request, [
			'name' => 'required|min:1|max:45',
			'description' => 'nullable',
			'coordinator_id' => 'required|numeric|exists:persons,id',
			'cohort_start' => 'date|before:' . $date . '|required',
			'cohort_end' => 'date|after:' . $request->cohort_start . '|before:' . $date . '|required',
			'started_amount' => 'numeric|min:1|max:100|required',
			'education_id' => 'numeric|required|exists:educations,id'
		]);

		$group->name = $request->name;
		$group->description = $request->description;
		if(isset($request->coordinator_id)) {
			$group->coordinator_id = $request->coordinator_id;
		}
		else {
			$group->coordinator_id = $coordinator->person->id;
		}
		$group->cohort_start = $request->cohort_start;
		$group->cohort_end = $request->cohort_end;
		$group->started_amount = $request->started_amount;
		$group->education_id = $request->education_id;
		$group->save();
		\Session::flash('success', 'De klas: ' . $request->name . ' is succesvol gewijzigd.');
		return redirect()->action('GroupController@getGroups');
	}

	public function delete(Group $group) {
		$person = User::find(Auth::id());

		if($person->person->user_id === Auth::id()) {
			$group->delete();
			\Session::flash('success', 'De klas: ' . $group->name . ' is succesvol verwijderd.');
			return back();
		}
		else {
			\Session::flash('error', 'U bent niet de coordinator van de klas: ' . $group->name . ' en kunt deze dus ook niet verwijderen.');
			return back();
		}
	}

	public function restore($id) {
		$group = Group::onlyTrashed()->find($id);
		$coordinator = User::find(Auth::id());

		if($group->coordinator_id === $coordinator->person->id) {
			$group->restore();
			\Session::flash('success', 'De klas: ' . $group->name . ' is succesvol hersteld.');
			return back();
		}
		else {
			\Session::flash('error', 'U bent niet de coordinator van de klas: ' . $group->name . ' en kunt deze dus ook niet herstellen.');
		}
	}
}
