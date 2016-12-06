<?php

namespace App\Http\Controllers;
use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function getSchools() {
    	$schools = School::all();
    	$deletedSchools = School::onlyTrashed()->get();
    	return view('school.index', compact('schools', 'deletedSchools'));
    }

    public function saveSchool(Request $request, School $school) {
    	$this->validate($request, [
    		'name' => 'unique:schools,name|max:45',
    		'description' => 'min:1',
    		'address' => 'max:45',
    		'address_number' => 'max:10',
    		'city' => 'required',
    		'zip_code' => 'max:9',
    		'telephone_number' => 'max:16',
    		'email' => 'email|unique:schools,email'
    	]);
    	$school = new School;
    	$school->create($request->all());
    	return redirect()->action('SchoolController@getSchools');
    }

    public function addSchool() {
    	return view('school.add');
    }

    public function editSchool(School $school) {
    	return view('school.edit', compact('school'));
    }

    public function updateSchool(Request $request, School $school) {
    	$school->update($request->all());
    	return redirect()->action('SchoolController@getSchools');
    }

    public function restoreSchool($id) {
        School::onlyTrashed()->where('id', $id)->restore();
        return back();
    }

    public function deleteSchool(School $school) {
    	$school->delete();
    	return back();
    }
}
