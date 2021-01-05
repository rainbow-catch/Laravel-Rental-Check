<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Category;
use App\Company;
use App\Customer;
use App\SecurityQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')->with('questions', SecurityQuestion::all());
    }

    public function profile()
    {
        return view('profile')->with(['detail' => Auth::user()->detail, 'categories' => Category::all()]);
    }

    public function updateProfile(Request $request)
    {
        $rules = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required|in:male,female,others',
            'address' => 'required|string',
            'phone' => 'required|string',
            'avatar' => 'file|mimes:jpeg,jpg,png|max:500',

            'facebook_id' => 'nullable|url',
            'twitter_id' => 'nullable|url',
            'instagram_id' => 'nullable|url',
            'linkedin_id' => 'nullable|url',
        ];

        switch (Auth::user()->role) {
            case 'Admin':
                {
                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        return redirect()->back()
                            ->withInput($request->all)
                            ->withErrors($validator);
                    }
                    $data = $request->all();
                    $available_avatars = ['boy.png', 'boy-1.png', 'girl.png', 'girl-1.png', 'girl-2.png', 'man.png', 'man-1.png', 'man-2.png', 'man-3.png'];

                    if ($request->avatar)
                        $data['avatar'] = $request->file('avatar')->store('', 'avatar');
                    else
                        $data['avatar'] = $available_avatars[array_rand($available_avatars)];

                    Admin::updateOrCreate(['user_id' => Auth::user()->id], $data);
                    Auth::user()->update(['isActive' => false]);

                    return redirect('/admin');
                }
            case 'Company':
                {
                    if (Company::where('user_id', Auth::user()->id)->count() == 0)
                        $rules['license'] = "required|file";
                    $rules['fed_id'] = "required|numeric";
                    $rules['payment_method'] = "required|in:Visa,MasterCard,Square Up,Paypal,Stripe,Venmo";
                    $rules['categories'] ='required|array';

                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        return redirect()->back()
                            ->withInput($request->all)
                            ->withErrors($validator);
                    }
                    $data = $request->all();

                    unset($data['first_name'], $data['last_name'], $data['license'], $data['categories']);

                    $data['company_name'] = $request->first_name;
                    $data['manager_name'] = $request->last_name;

                    $available_avatars = ['boy.png', 'boy-1.png', 'girl.png', 'girl-1.png', 'girl-2.png', 'man.png', 'man-1.png', 'man-2.png', 'man-3.png'];

                    if ($request->avatar)
                        $data['avatar'] = $request->file('avatar')->store('', 'avatar');
                    else
                        $data['avatar'] = $available_avatars[array_rand($available_avatars)];

                    if ($request->license)
                        $data['license'] = $request->file('license')->store('', 'license');

                    $company = Company::updateOrCreate(['user_id' => Auth::user()->id], $data);
                    $company->categories($request->categories);

                    return redirect('/dashboard');
                }
            case 'Customer':
                {
                    $rules['payment_method'] = "required|in:Visa,MasterCard,Square Up,Paypal,Stripe,Venmo";
                    if (Customer::where('user_id', Auth::user()->id)->count() == 0)
                        $rules['license'] = "required|file";

                    $validator = Validator::make($request->all(), $rules);
                    if ($validator->fails()) {
                        return redirect()->back()
                            ->withInput($request->all)
                            ->withErrors($validator);
                    }
                    $data = $request->all();
                    unset($data['license']);

                    $available_avatars = ['boy.png', 'boy-1.png', 'girl.png', 'girl-1.png', 'girl-2.png', 'man.png', 'man-1.png', 'man-2.png', 'man-3.png'];

                    if ($request->avatar)
                        $data['avatar'] = $request->file('avatar')->store('', 'avatar');
                    else
                        $data['avatar'] = $available_avatars[array_rand($available_avatars)];

                    if ($request->license)
                        $data['license'] = $request->file('license')->store('', 'license');

                    Customer::updateOrCreate(['user_id' => Auth::user()->id], $data);

                    return redirect('/');
                }
            default:
                return true;
        }
    }

    public function password()
    {
        return view('password')->with(['questions' => SecurityQuestion::all()]);
    }

    public function updatePassword(Request $request)
    {
        $rules = [
            'password' => 'nullable|min:6|confirmed',
            'security_question_id' => 'nullable|integer',
            'security_answer' => 'nullable|max:50',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        }
        if($request->password) $data['password'] = bcrypt($request->password);
        if($request->security_question_id) {
            $data['security_question_id'] = $request->security_question_id;
            $data['security_answer'] = $request->security_answer;
        }
        else {
            $data['security_question_id'] = null;
            $data['security_answer'] = null;
        }
        Auth::user()->update($data);
        return redirect('/');
    }
}