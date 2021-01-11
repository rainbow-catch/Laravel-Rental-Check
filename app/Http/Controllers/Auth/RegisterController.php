<?php

namespace App\Http\Controllers\Auth;

use App\AutoApprove;
use App\SecurityQuestion;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Jrean\UserVerification\Facades\UserVerification;
use Jrean\UserVerification\Traits\VerifiesUsers;

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
    use VerifiesUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.register')->with(['questions'=>SecurityQuestion::all()]);
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest',['except' => ['getVerification', 'getVerificationError']]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $token = md5(time() . $request->email);
        $input = $request->all();
        $input['verification_token'] = $token;
        event(new Registered($user = $this->create($input)));

        $this->guard()->login($user);

        $to = $request->email;
        $subject = 'Verify your email address.';
        $msg = "Dear Customer,<br> We noticed that you need to verify your email address. <a href=". "\"" .url('email-verification/check/' . $token . '?email=' . $request->email) . "\"" . ">Simply click here to verify. </a>";
        $headers = "From: " . env('MAIL_FROM_NAME') . "<" . env('MAIL_FROM_ADDRESS') . ">";
        mail($to, $subject, $msg, $headers);

//        UserVerification::generate($user);
//
//        UserVerification::send($user, 'User Verification');

        $request->session()->put('auth.password_confirmed_at', time());

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
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
            'email' => 'required|email|max:255|unique:users',
            'role' => 'required|in:Customer,Company,Admin',
            'password' => 'required|min:6|confirmed',
            'security_question_id' => 'nullable|integer',
            'security_answer' => 'nullable|max:50',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'role' => $data['role'],
            'password' => bcrypt($data['password']),
            'security_question_id' => $data['security_answer']? ($data['security_question_id'] ?? NULL): NULL,
            'security_answer' => $data['security_answer'] ?? NULL,
            'isActive' => AutoApprove::find(1)->isAuto,
            'verification_token' => $data['verification_token'],
        ]);
    }
}
