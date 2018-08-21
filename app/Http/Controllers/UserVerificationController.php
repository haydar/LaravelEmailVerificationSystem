<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserVerification;
use App\Mail\NewUserVerification;
use Mail;

class UserVerificationController extends Controller
{
    public function sendVerificationToken()
    {
        //
    }
    public function verify(Request $request)
    {
        $user=User::where('email',$request->email)->first();
        $token=UserVerification::where('token',$request->token)->with('users');

        if($user->verified)
        {
            return view('auth.login')->withInfo('Your account is already verified, please login.');
        }
        elseif($user->userverification->token==$request->token)
        {
            $user->verified=true;
            $user->save();
            return view('auth.login')->withInfo('Thanks, Your account successfully verified');
        }
        else
        {
            return view('auth.login')->withInfo('Given verification values not match any user data');
        }

    }

    public function resend(Request $request)
    {
        $user=User::where('email',$request->email)->first();

        if (!$user->verified)
        {
            $user->userverification()->update(
               ['token'=> bin2hex(random_bytes(32))]
            );
            $user->save();

            Mail::to($user->email)->send(new NewUserVerification($user));

            return view('auth.login')->withInfo('We resent your verification mail.');
        }
        else
        {
            return view('auth.login')->withInfo('Your account is already verified, please login.');
        }


    }

}
