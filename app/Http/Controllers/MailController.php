<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\WelcomeAlumni;
use Mail;

class MailController extends Controller
{
    public function setupMail()
    {
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
}
