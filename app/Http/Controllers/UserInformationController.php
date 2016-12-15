<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\UserInformation;
use App\Models\User;
use App\Models\PrivacyLevel;
use Illuminate\Http\Request;

class UserInformationController extends Controller
{
    public function getUsers() {

    	$usersInformation = UserInformation::latest()->limit(20)->get();
    	$deletedUsers = UserInformation::onlyTrashed()->get();

    	return view('user.index', compact('usersInformation', 'deletedUsers'));
    }

    public function addUser() {
    	$levels = PrivacyLevel::all();
    	return view('user.add', compact('levels'));
    }

    public function saveUser(Request $request) {
    	$validate = $this->validate($request, [
    		'address' => 'max:45',
    		'address_number' => 'max:10',
    		'city' => 'min:1|max:35|required',
    		'zip_code' => 'max:9',
    		'alternative_email' => 'max:120',
    		'mobile_number' => 'max:16',
    		'additional_number' => 'max:16',
    		'privacy_level_id' => 'numeric|required|exists:privacy_levels,id'
    	]);
    	$userInformation = new UserInformation;
    	$userInformation->address = $request->address;
    	$userInformation->address_number = $request->address_number;
    	$userInformation->city = $request->city;
    	$userInformation->zip_code = $request->zip_code;
    	$userInformation->alternative_email = $request->alternative_email;
    	$userInformation->mobile_number = $request->mobile_number;
    	$userInformation->additional_number = $request->additional_number;
    	$userInformation->user_id = Auth::id();
    	$userInformation->privacy_level_id = $request->privacy_level_id;
    	$userInformation->save();
    	\Session::flash('success', 'De informatie van de gebruiker is succesvol opgeslagen.');
    	return redirect()->action('UserInformationController@getUsers');
    }

    public function editUser($id) {
    	$userInformation = UserInformation::find($id);
    	$levels = PrivacyLevel::all();
    	return view('user.edit', compact('userInformation', 'levels'));
    }

    public function updateUser(Request $request, $id) {
    	$userInformation = UserInformation::find($id);
        $validate = $this->validate($request, [
            'address' => 'max:45',
            'address_number' => 'max:10',
            'city' => 'min:1|max:35|required',
            'zip_code' => 'max:9',
            'alternative_email' => 'max:120',
            'mobile_number' => 'max:16',
            'additional_number' => 'max:16',
            'privacy_level_id' => 'numeric|required|exists:privacy_levels,id'
        ]);
    	$userInformation->address = $request->address;
    	$userInformation->address_number = $request->address_number;
    	$userInformation->city = $request->city;
    	$userInformation->zip_code = $request->zip_code;
    	$userInformation->alternative_email = $request->alternative_email;
    	$userInformation->mobile_number = $request->mobile_number;
    	$userInformation->additional_number = $request->additional_number;
    	$userInformation->user_id = Auth::id();
    	$userInformation->privacy_level_id = $request->privacy_level_id;
    	$userInformation->save();
    	\Session::flash('success', 'De informatie van de gebruiker is succesvol gewijzigd.');
    	return redirect()->action('UserInformationController@getUsers');
    }

    public function deleteUser(UserInformation $userInformation) {
    	$userInformation->delete();
    	\Session::flash('success', 'De informatie van de gebruiker is succesvol verwijderd.');
    	return back();
    }

    public function restoreUser($id) {
    	UserInformation::onlyTrashed()->find($id)->restore();
    	\Session::flash('success', 'De informatie van de gebruiker is succesvol hersteld.');
    	return back();
    }
}
