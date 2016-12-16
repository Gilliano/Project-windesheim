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
        $from = $request->email_from;
        $to = $request->email_to;
        $subject = $request->subject;
        $body = $request->body;

        Mail::to($to)->send(new WelcomeAlumni($from, $subject, $body));
    }
}
