<?php

namespace App\Http\Controllers;
use App\Models\Education;
use App\Models\EducationCollection;
use App\Models\School;
use Illuminate\Http\Request;

class EducationController extends Controller
{
   	public function getEducations() {
   		$educations = Education::all();
   		$deletedEducations = Education::onlyTrashed()->get();

   		return view('education.index', compact('educations', 'deletedEducations'));
   	}

   	public function addEducation() {
   		$schools = School::all();
   		$educationsCollection = EducationCollection::all();

   		return view('education.add', compact('schools', 'educationsCollection'));
   	}

   	public function saveEducation(Request $request, Education $education) {
   		$this->validate($request, [
   			'name' => 'min:1|max:45|required',
   			'length' => 'numeric|min:1|max:10|required',
   			'school_id' => 'numeric|required|exists:schools,id',
   			'education_collection_id' => 'numeric|required|exists:educations_collection,id'
   		]);

   		$education->create($request->all());
   		\Session::flash('success', 'De opleiding: ' . $request->name . ' is succesvol toegevoegd.');
   		return redirect()->action('EducationController@getEducations');
   	}

   	public function editEducation(Education $education) {
   		$schools = School::all();
   		$educationsCollection = EducationCollection::all();
   		return view('education.edit', compact('education', 'schools', 'educationsCollection'));
   	}

   	public function updateEducation(Request $request, $id) {
   		$education = Education::find($id);
   		$this->validate($request, [
   			'name' => 'required|min:1|max:45',
   			'length' => 'numeric|required|min:1|max:10',
   			'school_id' => 'numeric|required|exists:schools,id',
   			'education_collection_id' => 'numeric|required|exists:educations_collection,id'
   		]);
   		$education->update($request->all());
   		\Session::flash('success', 'De opleiding: ' . $request->name . ' is succesvol gewijzigd.');
   		return redirect()->action('EducationController@getEducations');
   	}

   	public function deleteEducation(Education $education) {
   		$education->delete();
   		\Session::flash('success', 'De opleiding: ' . $education->name . ' is succesvol verwijderd.');
   		return back();
   	}

   	public function restoreEducation($id) {
   		$education = Education::onlyTrashed()->find($id);
   		$education->restore();
   		\Session::flash('success', 'De opleiding: ' . $education->name . ' is succesvol hersteld.');
   		return back();
   	}
}
