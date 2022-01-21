<?php

namespace App\Traits;

use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordEmail;

trait SendEmail
{

    public function sendEmail($email,$token)
    {

        Mail::to($email)->send(new ResetPasswordEmail($token));

        if (Mail::failures()) {
            return 'Sorry! Please try again latter';
        }else{
            return 'Great! Successfully send in your mail';
        }
    }
}
