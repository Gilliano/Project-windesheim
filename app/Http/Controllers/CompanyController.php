<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\PrivacyLevel;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function getCompanies() {
    	$companies = Company::all();
    	$deletedCompanies = Company::onlyTrashed()->get();

    	return view('company.index', compact('companies', 'deletedCompanies'));
    }

    public function addCompany() {
    	$levels = PrivacyLevel::all();
    	return view('company.add', compact('levels'));
    }

    public function saveCompany(Request $request) {
    	$this->validate($request, [
    		'name' => 'min:1|max:45|required|unique:companies,name',
    		'description' => 'min:1|required',
    		'privacy_level_id' => 'exists:privacy_levels,id'
    	]);
    	$company = new Company;
    	$company->name = $request->name;
    	$company->description = $request->description;
    	$company->user_id = Auth::id();
    	$company->privacy_level_id = $request->privacy_level_id;
    	$company->save();
    	\Session::flash('success', 'Het bedrijf: ' . $request->name . ' is succesvol toegevoegd.');
    	return redirect()->action('CompanyController@getCompanies');
    }

    public function editCompany(Company $company) {
    	$levels = PrivacyLevel::all();
    	return view('company.edit', compact('company', 'levels'));
    }

    public function updateCompany(Request $request, $id) {
    	$company = Company::find($id);
    	$this->validate($request, [
    		'name' => 'required|max:45|unique:companies,name,' . $id,
    		'description' => 'required|min:1',
    		'privacy_level_id' => 'exists:privacy_levels,id'
		]);
    	$company->name = $request->name;
    	$company->description = $request->description;
    	$company->user_id = Auth::id();
    	$company->privacy_level_id = $request->privacy_level_id;
    	$company->save();
    	\Session::flash('success', 'Het bedrijf: ' . $request->name . ' is succesvol gewijzigd.');
    	return redirect()->action('CompanyController@getCompanies');
    }

    public function deleteCompany(Company $company) {
    	$company->delete();
    	\Session::flash('success', 'Het bedrijf: ' . $company->name . ' is succesvol verwijderd.');
    	return back();
    }

    public function restoreCompany($id) {
    	$company = Company::onlyTrashed()->find($id);
    	$company->restore();
    	\Session::flash('success', 'Het bedrijf: ' . $company->name . ' is succesvol hersteld.');
    	return back();
    }
}
