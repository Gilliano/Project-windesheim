<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Group;
use App\Models\Job;
use App\Models\Person;
use App\Models\UserInformation;
use App\Models\ZipInfo;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JsonController extends Controller
{
    // Call the function if its callable
    public function decide(Request $request)
    {
        // Get function name and params from request
        $functionName = $request->function;
        $params = $request->params;

        // Call function with/without params
        if(is_callable(array($this, $functionName)))
            if(isset($params) && count($params) > 0)
                return call_user_func(array($this, $functionName), $params);
            else
                return call_user_func(array($this, $functionName));
        else
            return "$functionName not found!";
    }

    // Return data for the Alumni chart
    // that shows the percentage of students
    // that completed the education
    public function educationAlumniChart($params)
    {
        $educationName = $params[0];
        $groups = Education::where('name', $educationName)->first()->groups; // Find by dynamic value
        $start_amount = 0;
        $final_amount = 0;
        foreach ($groups as $group)
        {
            // Get the start amount for a education
            $start_amount += $group->started_amount;
            // Get the current amount of persons that have completed this education
            $persons = $group->person;
            foreach ($persons as $person)
                $final_amount++;
        }

        return json_encode([$start_amount, $final_amount]);
    }

    // Return data for the Sex chart
    // that show the difference in sex
    // for all the persons in de dbase
    public function personSexChart()
    {
        $totalPersons = Person::all();
        $personsFemale = count($totalPersons->where('sex', 0));
        $personsMale = count($totalPersons->where('sex', 1));

        return json_encode([$personsFemale, $personsMale]);
    }

    // Return data for the Leaflet
    // that show where people work
    public function mapJobs()
    {
        $jobs = Job::all();

        $return_array = [];
        foreach ($jobs as $job)
        {
            $zipInfo = $this->getZipInfo($job);

            // Save result
            if($zipInfo != null && count($zipInfo) > 0)
            {
                $result = ["lat"=>$zipInfo[0]->latitude, "lng"=>$zipInfo[0]->longitude];
                $data_object = [$result];
                array_push($return_array, $data_object);
            }
            else
            {
                $data_object = [null, "error"=>"Nothing found for zip_code: ".$job->zip_code];
                array_push($return_array, $data_object);
            }
        }

        return json_encode($return_array);
    }

    // Return data for the leaflet
    // that shows where people live
    public function mapLiving()
    {
        $users_information = UserInformation::all();

        $return_array = [];
        foreach ($users_information as $person)
        {
            // Get zip info
            $zipInfo = $this->getZipInfo($person);

            // Save result
            if($zipInfo != null && count($zipInfo) > 0)
            {
                $result = ["lat"=>$zipInfo[0]->latitude, "lng"=>$zipInfo[0]->longitude];
                $data_object = [$result];
                array_push($return_array, $data_object);
            }
            else
            {
                $data_object = [null, "error"=>"Nothing found for zip_code: ".$person->zip_code];
                array_push($return_array, $data_object);
            }
        }

        return json_encode($return_array);
    }

    // Returns data for the leaflet
    // that show how many people work
    // in the city that they live in
    public function mapJobsAndLiving()
    {
        $persons = Person::all();
        $return_array = [];
        foreach($persons as $person)
        {
            $jobs = $person->job;
            foreach ($jobs as $job)
            {
                // Check if user has user_information
                if($person->user->userInformation != null)
                {
                    if(strtolower($job->city) == strtolower($person->user->userInformation->city))
                    {
                        $zipInfo = $this->getZipInfo($job);
                        if($zipInfo != null)
                        {
                            $result = ["lat"=>$zipInfo[0]->latitude, "lng"=>$zipInfo[0]->longitude];
                            $data_object = [$result];
                            array_push($return_array, $data_object);
                        }
                    }
                }
            }
        }

        return json_encode($return_array);
    }

    /*
     * UTIL FUNCTIONS
     */
    // Returns a ZipInfo object for a given
    // person or job
    private function getZipInfo($eloquentObj)
    {
        $zipInfo = null;

        // Check if we have a zip code
        if($eloquentObj->zip_code != null)
        {
            // Strip zip_code to match '[1-9][0-9][0-9][0-9]'
            $stripped_zip = substr(preg_replace('/\s+/', '', $eloquentObj->zip_code), 0, -2);

            // Create a location object with the lat and longitude
            $zipInfo = ZipInfo::where('zip_code', $stripped_zip)->limit(1)->get();
        }

        // Check if zip_code is valid/found
        if(count($zipInfo) == 0 || $zipInfo == null)
        {
            // Get city field and get its lat/long
            $zipInfo = ZipInfo::where('city', $eloquentObj->city)->limit(1)->get();
        }

        return $zipInfo;
    }
}
