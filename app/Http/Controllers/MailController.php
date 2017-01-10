<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\WelcomeAlumni;
use Mail;
use App\Models\Group;
use App\Models\Education;


class MailController extends Controller
{
    public function setupMail()
    {
        return view('mail.setup_mail_list');
    }

    public function setupMailList()
    {
        return $this->getGroups();
//        return $this->getClassmates(21);
//        dd($this->getClassmates(21));
    }

    public function sendMail(Request $request)
    {
        dd($request);
        $mail = [];
        $mail['from'] = $request->email_from;
        $mail['to'] = $request->email_to;
        $mail['subject'] = $request->subject;
        $mail['body'] = $request->body;

        Mail::to($mail['to'])->send(new WelcomeAlumni($mail));
    }

    public function getClassmates($id)
    {
        $data = [];
        $classmates = Group::find($id)->person;

        foreach ($classmates as $classmate){
            array_push($data, ["text"=>$classmate->firstname . ' ' . $classmate->lastname, "value"=>$classmate->user->email]);
//            array_push($data, ["person_id"=>$classmate->user->id, "person_email"=>$classmate->user->email]);
        }

        return $data ;
    }

    public function getGroups($id = null)
    {
        $data = [];
        if (is_int($id) ){
            $groups = Group::where('education_id', $id)->get();
        }
        else {
            $groups = Group::all();
        }

        foreach ($groups as $group){

            $classmates= $this->getClassmates($group->id);
            $email = [];
            foreach ($classmates as $classmate){
                array_push($email, $classmate['value']);
            }

            array_push($data, ["group_id"=>$group->id, 'text' => $group->name, "value"=>$email]);
        }

        return $data;
    }

    public function getEducation($id = null)
    {
        $data = [];
        if (is_int($id) ){
            $educations = [Education::find($id)];
        }
        else {
            $educations = Education::all();
        }

        foreach ($educations as $education){
            var_dump($education->id);  // Test purpose
            array_push($data, ["education_id"=>$education->id, 'name' => $education->name, "groups"=>$this->getGroups($education->id)]);
        }

        return response()->json($data);
    }
}
