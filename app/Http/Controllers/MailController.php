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
//        dd($this->getEducation(7));
//        dd($this->getClassmates());
        return view('mail.setup_mail');
    }

    public function sendMail(Request $request)
    {
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

//            $data[$classmate->user->id] = $classmate->user->email;
            array_push($data, ["person_id"=>$classmate->user->id, "person_email"=>$classmate->user->email]);
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
//            $data[$group->id] = $this->getClassmates($group->id);
            array_push($data, ["group_id"=>$group->id, 'name' => $group->name, "persons"=>$this->getClassmates($group->id)]);
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
            var_dump($education->id);
            array_push($data, ["education_id"=>$education->id, 'name' => $education->name, "groups"=>$this->getGroups($education->id)]);
        }


        return $data;


    }
}
