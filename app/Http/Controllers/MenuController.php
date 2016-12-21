<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cookie;

class MenuController extends Controller
{
    public function index()
    {

////        $positions = '[{"col":1,"row":1,"size_x":1,"size_y":2},{"col":2,"row":1,"size_x":2,"size_y":2},{"col":4,"row":1,"size_x":2,"size_y":2},{"col":6,"row":1,"size_x":1,"size_y":2},{"col":1,"row":3,"size_x":2,"size_y":2},{"col":3,"row":3,"size_x":2,"size_y":2},{"col":5,"row":3,"size_x":2,"size_y":4},{"col":7,"row":5,"size_x":1,"size_y":2},{"col":1,"row":5,"size_x":1,"size_y":2},{"col":4,"row":5,"size_x":1,"size_y":2},{"col":7,"row":3,"size_x":1,"size_y":2},{"col":7,"row":1,"size_x":1,"size_y":2},{"col":8,"row":5,"size_x":2,"size_y":2},{"col":2,"row":5,"size_x":2,"size_y":2},{"col":8,"row":1,"size_x":2,"size_y":4},{"col":11,"row":1,"size_x":1,"size_y":2},{"col":10,"row":1,"size_x":1,"size_y":2},{"col":10,"row":3,"size_x":1,"size_y":4},{"col":11,"row":3,"size_x":2,"size_y":4},{"col":12,"row":1,"size_x":1,"size_y":2}]';
//        $positions = '[{"col":1,"row":1,"size_x":2,"size_y":4},{"col":3,"row":1,"size_x":2,"size_y":2},{"col":3,"row":3,"size_x":2,"size_y":2},{"col":5,"row":1,"size_x":1,"size_y":2},{"col":3,"row":5,"size_x":1,"size_y":2},{"col":1,"row":5,"size_x":2,"size_y":2},{"col":4,"row":5,"size_x":1,"size_y":2},{"col":6,"row":1,"size_x":2,"size_y":4},{"col":5,"row":3,"size_x":1,"size_y":2},{"col":5,"row":5,"size_x":1,"size_y":2},{"col":6,"row":5,"size_x":1,"size_y":2},{"col":7,"row":5,"size_x":1,"size_y":2}]';
//
//        if (isset($_COOKIE['positions'])) {
//            $positions = json_decode($_COOKIE['positions']);
//        } else {
//            $positions = json_decode($positions);
//        }
//        $i = 0;

//        return view('newtest', compact('positions', 'i'));
        return view('menu');
    }
}
