<?php

namespace App\Http\Controllers;

use App\Mail\InviteEmail;
use App\Mail\SignupEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendSignupEmail($name, $email, $verification_code){
        $data = [
            'name' => $name,
            'verification_code' => $verification_code
        ];
        Mail::to($email)->send(new SignupEmail($data));
    }

    public static function sendInvitationEmail($wg_name, $wg_group_id, $userMail){
        $data = [
            'wg_name' => $wg_name,
            'wg_group_id' => $wg_group_id,
        ];
        Mail::to($userMail)->send(new InviteEmail($data));
    }


}
