<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers() {

    	$users = User::has('userinformation')->limit(20)->get();
    	$deletedUsers = UserInformation::onlyTrashed()->get();

    	return view('user.index', compact('users', 'deletedUsers'));
    }

    public function addUser() {
    	return view('user.add');
    }

    public function editUser(UserInformation $user) {
    	return view('user.edit', compact('user'));
    }

    public function updateUser(Request $request, UserInformation $user) {
    	$user->update($request->all());
    	\Session::flash('success', 'De gebruiker is succesvol gewijzigd.');
    	return redirect()->action('UserController@getUsers');
    }

    public function deleteUser(UserInformation $user) {
    	$user->delete();
    	\Session::flash('success', 'De gebruiker is succesvol verwijderd.');
    	return back();
    }

    public function restoreUser($id) {
    	UserInformation::onlyTrashed()->find($id)->restore();
    	\Session::flash('success', 'De gebruiker is succesvol hersteld.');
    	return back();
    }
}
