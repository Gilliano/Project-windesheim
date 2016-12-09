<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Person;
use App\Models\Company;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers() {

    	$users = User::has('users_information')->limit(20)->get();

    	return view('user.index', compact('users'));
    }

    public function edit(User $user) {
    	return view('user.edit', compact('user'));
    }
}
