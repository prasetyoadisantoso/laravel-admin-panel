<?php

namespace App\Repositories;

use App\Mail\SendLogMail;
use Illuminate\Support\Facades\Mail;

trait SendLog{

    /* Email */
    protected function LogMail($log){
        $email = \env('MAIL_TO', null);
        return Mail::to($email)->send(new SendLogMail($log));
    }

}
