<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Job;
use App\Models\UserInformation;
use App\Models\Company;
use App\Models\Certificate;
use App\Models\Education;
use App\Models\EducationCollection;
use App\Models\School;
use App\Models\Group;
use App\Models\Diploma;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.index');
    }

    public function results(Request $request)
    {
//        dd($request->search);

        $search = $request->search;

//        Zoeken in de tabel 'persons'
        if ($search == 'man') {
            $search = 1;

            $personResults = Person::where('sex', $search)->get();
        } elseif ($search == 'vrouw') {
            $search = 0;

            $personResults = Person::where('sex', $search)->sex->get();
        } else {
            $personResults = Person::where('firstname', 'LIKE', '%' . $search . '%')
                ->orwhere('lastname', 'LIKE', '%' . $search . '%')
                ->orWhere('birthday', 'LIKE', '%' . $search . '%')
                ->orWhere('autobiography', 'LIKE', '%' . $search . '%')
                ->orWhere('sex', 'LIKE', '%' . $search . '%')
                ->get();
        }


//        Zoeken in de tabel 'jobs'
        $jobResults = Job::where('name', 'LIKE', '%' . $search . '%')
            ->orwhere('address', 'LIKE', '%' . $search . '%')
            ->orWhere('address_number', 'LIKE', '%' . $search . '%')
            ->orWhere('city', 'LIKE', '%' . $search . '%')
            ->orWhere('zip_code', 'LIKE', '%' . $search . '%')
            ->orWhere('function', 'LIKE', '%' . $search . '%')
            ->get();


//        Zoeken in de tabel 'companies'
        $companyResults = Company::where('name', 'LIKE', '%' . $search . '%')
            ->orwhere('description', 'LIKE', '%' . $search . '%')
            ->get();


//        Zoeken in de tabel 'certificates'
        $certificateResults = Certificate::where('name', 'LIKE', '%' . $search . '%')
            ->orwhere('description', 'LIKE', '%' . $search . '%')
            ->orWhere('earned_at', 'LIKE', '%' . $search . '%')
            ->orWhere('valid_until', 'LIKE', '%' . $search . '%')
            ->get();


//        Zoeken in de tabel 'educations'
        $educationResults = Education::where('name', 'LIKE', '%' . $search . '%')
            ->orwhere('description', 'LIKE', '%' . $search . '%')
            ->orWhere('length', 'LIKE', '%' . $search . '%')
            ->get();


//        Zoeken in de tabel 'educations_collection'
        $educationCollectionResults = EducationCollection::where('name', 'LIKE', '%' . $search . '%')
            ->orwhere('description', 'LIKE', '%' . $search . '%')
            ->get();


//        Zoeken in de tabel 'schools'
        $schoolResults = School::where('name', 'LIKE', '%' . $search . '%')
            ->orwhere('description', 'LIKE', '%' . $search . '%')
            ->orwhere('address', 'LIKE', '%' . $search . '%')
            ->orwhere('address_number', 'LIKE', '%' . $search . '%')
            ->orwhere('city', 'LIKE', '%' . $search . '%')
            ->orwhere('zip_code', 'LIKE', '%' . $search . '%')
            ->orwhere('telephone_number', 'LIKE', '%' . $search . '%')
            ->orwhere('email', 'LIKE', '%' . $search . '%')
            ->get();


//        Zoeken in de tabel 'groups'
        $groupResults = Group::where('name', 'LIKE', '%' . $search . '%')
            ->orwhere('description', 'LIKE', '%' . $search . '%')
            ->orwhere('cohort_start', 'LIKE', '%' . $search . '%')
            ->orwhere('cohort_end', 'LIKE', '%' . $search . '%')
            ->orwhere('started_amount', 'LIKE', '%' . $search . '%')
            ->get();


//        Zoeken in de tabel 'diplomas'
        $diplomaResults = Diploma::where('graduated_year', 'LIKE', '%' . $search . '%')
            ->orwhere('education', 'LIKE', '%' . $search . '%')
            ->orwhere('education_classcode', 'LIKE', '%' . $search . '%')
            ->orwhere('school_name', 'LIKE', '%' . $search . '%')
            ->get();


        $resultsCount = count($personResults) + count($jobResults) + count($companyResults) + count($certificateResults) + count($educationResults) + count($educationCollectionResults) + count($schoolResults) + count($groupResults) + count($diplomaResults);

        return view('search.index', compact('search', 'resultsCount', 'personResults', 'jobResults', 'companyResults', 'certificateResults', 'educationResults', 'educationCollectionResults', 'schoolResults', 'groupResults', 'diplomaResults'));
    }
}
