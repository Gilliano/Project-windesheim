<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Action;

class ActionController extends Controller
{
    public function index()
    {
        $action = Action::all();

        $group_action = Action::all()->groupBy('action');

        $group_table = Action::all()->groupBy('table_name');

        dd($action, $group_action, $group_table);
    }
}
