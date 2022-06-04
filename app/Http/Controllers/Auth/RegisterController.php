<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Models\WgGroup;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function register(Request $request, Validator $validator)
    {

//        if ($validator->fails()) {
//            return redirect()->back()->with(session()->flash('alert-danger', 'Something went wrong!'));
//        }
//        else {
//            $user = new User();
//            $user->name = $request->name;
//            $user->email = $request->email;
//            $user->password = Hash::make($request->password);
//            $user->verification_code = sha1(time());
//            $user->save();
//
//            MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);
//            return redirect()->back()->with(session()->flash('alert-success', 'Dein User wurde erstellt. Bitte bestätige zuerst deine E-Mail-Adresse!'));
//        }

        $users = User::where('email', '=', $request->input('email'))->first();
        if ($users === null) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->verification_code = sha1(time());
            $user->save();
            MailController::sendSignupEmail($user->name, $user->email, $user->verification_code);
            return redirect()->back()->with(session()->flash('alert-success', 'Dein User wurde erstellt. Bitte bestätige zuerst deine E-Mail-Adresse!'));
        } else {
            return redirect()->back()->with(session()->flash('alert-danger', 'Deine E-Mail-Adresse wurde schon einmal verwendet!'));
        }

    }

    public function verifyUser() {
        $verification_code = \Illuminate\Support\Facades\Request::get('code');
        $user = User::where(['verification_code' => $verification_code])->first();
        if($user != null) {
            $user->is_verified = 1;
            $user->save();
            return redirect()->route('login')->with(session()->flash('alert-success', 'Du hast deine E-Mail-Adresse bestätigt und kannst dich jetzt anmelden!'));
        }

        return redirect()->route('login')->with(session()->flash('alert-danger', 'Etwas ist schiefgelaufen!'));
    }
}
