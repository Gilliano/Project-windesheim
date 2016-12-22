<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\Person;
use App\Models\User;
use App\Models\PrivacyLevel;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function getJobs() {
    	$jobs = Job::has('person')->get();
    	$deletedJobs = Job::onlyTrashed()->get();
    	return view('job.index', compact('jobs', 'deletedJobs'));
    }

    public function addJob() {
    	$levels = PrivacyLevel::all();
    	return view('job.add', compact('levels'));
    }

    public function saveJob(Request $request, Job $job) {
    	$date = date('Y-m-d');
    	$user = User::has('person')->find(Auth::id());
    	$this->validate($request, [
    		'name' => 'min:1|max:70|required',
    		'address' => 'string|nullable|max:45',
    		'address_number' => 'string|nullable|max:10',
    		'zip_code' => 'string|nullable|max:9',
    		'city' => 'required|min:1|max:45',
    		'function' => 'required|min:1|max:80',
    		'salary_min' => 'numeric|nullable',
    		'salary_max' => 'numeric|nullable',
    		'started_at' => 'date|before:' . $date . '|nullable',
    		'current_job' => 'string|nullable',
    		'privacy_level_id' => 'numeric|required|min:1|max:10|exists:privacy_levels,id'
    	]);

    	$job = new Job;
    	$job->name = $request->name;
    	$job->address = $request->address;
    	$job->address_number = $request->address_number;
    	$job->zip_code = $request->zip_code;
    	$job->city = $request->city;
    	$job->function = $request->function;
    	$job->salary_min = $request->salary_min;
    	$job->salary_max = $request->salary_max;
    	$job->started_at = $request->started_at;
    	if($request->current_job = "Ja") {
    		$job->current_job = 1;
    	}
    	else if($request->current_job = "Nee") {
    		$job->current_job = 0;
    	}
    	else {
    		$job->current_job = NULL;
    	}
    	$job->person_id = $user->person->id;
    	$job->privacy_level_id = $request->privacy_level_id;
    	$job->save();
    	\Session::flash('success', 'De baan: ' . $request->name . ' is succesvol toegevoegd.');
    	return redirect()->action('JobController@getJobs');
    }

    public function editJob(Job $job) {
        $levels = PrivacyLevel::all();
        $user = User::has('person')->find(Auth::id());
        if($job->person_id === $user->person->id) {
            return view('job.edit', compact('job', 'levels'));
        }
        else {
            \Session::flash('error', 'De baan: ' . $job->name . ' is niet van u en kunt u dus ook niet wijzigen.');
            return back();
        }
    }

    public function updateJob(Request $request, Job $job) {
        $date = date('Y-m-d');
        $user = User::has('person')->find(Auth::id());
        $this->validate($request, [
            'name' => 'min:1|max:70|required',
            'address' => 'string|nullable|max:45',
            'address_number' => 'string|nullable|max:10',
            'zip_code' => 'string|nullable|max:9',
            'city' => 'required|min:1|max:45',
            'function' => 'required|min:1|max:80',
            'salary_min' => 'numeric|nullable',
            'salary_max' => 'numeric|nullable',
            'started_at' => 'date|before:' . $date . '|nullable',
            'current_job' => 'string|nullable',
            'privacy_level_id' => 'numeric|required|min:1|max:10|exists:privacy_levels,id'
        ]);

        $job->name = $request->name;
        $job->address = $request->address;
        $job->address_number = $request->address_number;
        $job->zip_code = $request->zip_code;
        $job->city = $request->city;
        $job->function = $request->function;
        $job->salary_min = $request->salary_min;
        $job->salary_max = $request->salary_max;
        $job->started_at = $request->started_at;
        if($request->current_job = "Ja") {
            $job->current_job = 1;
        }
        else if($request->current_job = "Nee") {
            $job->current_job = 0;
        }
        else {
            $job->current_job = NULL;
        }
        $job->person_id = $user->person->id;
        $job->privacy_level_id = $request->privacy_level_id;
        $job->save();
        \Session::flash('success', 'De baan: ' . $request->name . ' is succesvol gewijzigd.');
        return redirect()->action('JobController@getJobs');
    }

    public function deleteJob(Job $job) {
        $user = User::has('person')->find(Auth::id());

        if($user->person->id === $job->person_id) {
            $job->delete();
            \Session::flash('success', 'De baan: ' . $job->name . ' is succesvol verwijderd.');
            return back();
        }
        else {
            \Session::flash('error', 'De baan: ' . $job->name . ' is niet van u en kunt u dus ook niet verwijderen.');
            return back();
        }
    }

    public function restoreJob($id) {
        $job = Job::onlyTrashed()->find($id);
        $user = User::has('person')->find(Auth::id());

        if($user->person->id === $job->person_id) {
            $job->restore();
            \Session::flash('success', 'De baan: ' . $job->name . ' is succesvol hersteld.');
            return back();
        }
        else {
            \Session::flash('error', 'De baan: ' . $job->name . ' is niet van u en kunt u dus ook niet herstellen.');
            return back();
        }
    }
}
