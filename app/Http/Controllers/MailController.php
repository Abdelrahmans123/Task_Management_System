<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendMail($email){
        Mail::to($email)->send(new assign());
        return redirect('employee')->with('success','Sended Successfully');
    }
}
