<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Group;
use App\Models\Job;
use App\Models\Person;
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
            $persons = $group->persons;
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

    // TODO: Check if this is better than client-sided (js)
    // TODO: Somehow returned data is random??
    // Return data for the Leaflet
    // that show where people work (city)
    public function mapJobs()
    {
        $jobs = Job::all();
        $return_array = [];
        foreach ($jobs as $job)
        {
//            $location = json_decode(file_get_contents("http://maps.googleapis.com/maps/api/geocode/json?address=$job->zip_code"));
            $location = json_decode(file_get_contents("https://maps.googleapis.com/maps/api/place/textsearch/json?query=$job->zip_code&key=AIzaSyCjX5yhW2EjfBMTo8PByyDBmOXIFSSPXDw"));

            // Check if max api calls error is returned
            // so we can terminate early
            if(isset($location->error_message))
            {
                if(strpos($location->error_message, 'exceeded') !== true)
                    break;
            }

            // Save lat/long
            if(count($location->results) > 0)
            {
                $result = $location->results[0];
                $data_object = ["zip"=>$job->zip_code, "lat"=>$result->geometry->location->lat, "lng"=> $result->geometry->location->lng, "count" => 1];
                array_push($return_array, $data_object);
            }
        }

        return json_encode($return_array);
    }
}
