<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Group;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JsonController extends Controller
{
    // Return all data from the given db table name
    // in JSON format
//    public function index($tableName)
//    {
//        // Get all records form table that matches the param
//        try
//        {
//            $result = DB::table($tableName)->select('*')->get();
//        } catch (QueryException $e) {
//            return "Table \"$tableName\" not found!"; // Return error
//        }
//
//        return json_encode($result); // Return the fetched records
//    }

    // Call the function if its callable
    public function decide($functionName)
    {
        if(is_callable(array($this, $functionName)))
            return call_user_func(array($this, $functionName));
        else
            return "$functionName not found!";
    }

    // Return data for the Education chart
    // that shows the percentage of students
    // that completed the education
    public function educationChartAlumni($educationName)
    {
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
}
