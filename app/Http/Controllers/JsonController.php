<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Group;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JsonController extends Controller
{
    // Call the function if its callable
    public function decide(Request $request)
    {
        // TODO: Get function name and params from request
        $functionName = $request->function;
        $params = $request->params;

        // TODO: Call function with/without params
        if(is_callable(array($this, $functionName)))
            if(isset($params) && count($params) > 0)
                return call_user_func(array($this, $functionName), $params);
            else
                return call_user_func(array($this, $functionName));
        else
            return "$functionName not found!";
    }

    // Return data for the Education chart
    // that shows the percentage of students
    // that completed the education
    public function educationChartAlumni($params)
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
}
