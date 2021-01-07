<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\SecurityQuestion;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdministratorController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', 'Admin')->get();
        return view('admin.user.administrator.view')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.administrator.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'gender' => 'required|in:male,female,others',
            'email' => 'required|email|max:50|unique:users',
            'address' => 'max:200',
            'about' => 'max:300',
            'role' => 'in:Customer,Company,Admin',
            'password' => 'required|min:6',
        ];
        if (!empty($request->input('phone'))) {
            $rules['phone'] = 'numeric|max:999999999999999';
        }

        if (!empty($request->input('avatar'))) {
            $rules['avatar'] = 'mimes:jpeg,jpg,png|max:500';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        } else {

            $user = new User();
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->gender = $request->input('gender');
            $user->phone = $request->input('phone');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->about = $request->input('about');
            $user->role = $request->input('role');
            $user->status = $request->input('status');
            $user->password = bcrypt($request->input('password'));

            // Avatar Upload
            if ($request->hasFile('avatar')) {
                $path = $request->file('avatar')->store('','avatar');
                $user->avatar = $path;
            }

            $user->save();
            Session::flash('flash_title', "Success");
            Session::flash('flash_message', "User has been added. You can add more user from the form below.");
            return redirect('/admin/user/administrator/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.administrator.edit')->with(['user' => $user, 'questions'=>SecurityQuestion::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $rules = [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required|in:male,female,others',
            'address' => 'required|string',
            'phone' => 'required|numeric|max:999999999999999',
            'facebook_id' => 'nullable|url',
            'twitter_id' => 'nullable|url',
            'instagram_id' => 'nullable|url',
            'linkedin_id' => 'nullable|url',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'about' => 'max:300',
            'isActive'=> 'required|boolean',

            'security_question_id' => 'required|integer',
            'security_answer' => 'required|max:50',
        ];

        if ($request->hasFile('avatar')) {
            $rules['avatar'] = 'mimes:jpeg,jpg,png|max:500';
        }

        if (!empty($request->input('password'))) {
            $rules['password'] = 'min:6';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator)
                ->with('user', $user);
        } else {
            $user = User::find($id);
            $user->email = $request->input('email');
//            $user->role = $request->input('role');
            $user->isActive = $request->input('isActive');
            $user->security_question_id = $request->input('security_question_id');
            $user->security_answer = $request->input('security_answer');

            if ($request->input('password')){
                $user->password = bcrypt($request->input('password'));
            }

            $detail = Admin::where('user_id', $user->id)->first();
            $detail->first_name = $request->input('first_name');
            $detail->last_name = $request->input('last_name');
            $detail->gender = $request->input('gender');
            $detail->phone = $request->input('phone');
            $detail->address = $request->input('address');

            $detail->facebook_id = $request->input('facebook_id');
            $detail->twitter_id = $request->input('twitter_id');
            $detail->instagram_id = $request->input('instagram_id');
            $detail->linkedin_id = $request->input('linkedin_id');

//            $detail->about = $request->input('about');

            // Avatar Upload
            if ($request->hasFile('avatar')) {
                if (strpos($detail->avatar, "default/") !== 0) {
                    Storage::delete('public/avatars/'.$detail->avatar);
                }
                $path = $request->file('avatar')->store('','avatar');
                $detail->avatar = $path;
            }
            if ($request->hasFile('license')) {
                if (strpos($detail->license, "default/") !== 0) {
                    Storage::delete('public/licenses/'.$detail->license);
                }
                $path = $request->file('license')->store('','license');
                $detail->license = $path;
            }

            $user->save();
            $detail->save();

            Session::flash('flash_title', "Success");
            Session::flash('flash_message', "User profile has been updated.");
            return redirect('/admin/user/administrator');
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        $user = User::find($id);
        return view('admin.user.administrator.profile')->with([
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update_profile(Request $request, $id)
    {
        $user = User::find($id);
        $rules = [
            'first_name' => 'required|max:25',
            'last_name' => 'required|max:25',
            'gender' => 'in:male,female,others',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'address' => 'max:200',
            'about' => 'max:300'
        ];
        if ($request->hasFile('avatar')) {
            $rules['avatar'] = 'mimes:jpeg,jpg,png|max:500';
        }

        if (!empty($request->input('phone'))) {
            $rules['phone'] = 'numeric|max:999999999999999';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator)
                ->with('user', $user);
        } else {
            $user = User::find($id);
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->gender = $request->input('gender');
            $user->phone = $request->input('phone');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->about = $request->input('about');

            if ($request->hasFile('avatar')) {
                if(!in_array($user->avatar, ['boy.png', 'boy-1.png', 'girl.png', 'girl-1.png', 'girl-2.png','man.png', 'man-1.png', 'man-2.png', 'man-3.png'])){
                    Storage::delete('public/avatars/'.$user->avatar);
                }
                $path = $request->file('avatar')->store('','avatar');
                $user->avatar = $path;
            }

            $user->save();
            Session::flash('flash_title', "Success");
            Session::flash('flash_message', "User profile has been updated.");
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $detail = Admin::where('user_id', $id)->first();

        $user_name = $user->fullname();

        if ($user->id !== 1) {
            if ($user->id !== Auth::user()->id) {
                if ($user->delete()) {
                    if($detail && $detail->delete()) {
                        if (Storage::disk('avatar')->exists($detail->avatar)) {
                            if (strpos($detail->avatar, "default/") !== 0) {
                                Storage::delete('public/avatars/' . $detail->avatar);
                            }
                        }
                        if (Storage::disk('license')->exists($detail->license)) {
                            if (strpos($detail->license, "default/") !== 0) {
                                Storage::delete('public/licenses/' . $detail->license);
                            }
                        }
                    }

                    Session::flash('flash_title', 'Success');
                    Session::flash('flash_message', 'The user, ' . $user_name . ' has been deleted');

                    return redirect('/admin/user/administrator');
                } else {
                    $error_message = "Sorry, user could not be deleted.";
                }
            } else {
                $error_message = "Sorry, you cannot delete yourself.";
            }
        }else{
            $error_message = "Sorry, you can not delete the first user.";
        }

        return redirect()
            ->back()
            ->withErrors(array('message' => $error_message));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function setting($id)
    {
        return view('admin.user.administrator.setting');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update_setting(Request $request, $id)
    {
        $user = User::find($id);
        $rules = [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|same:password'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->with('user', $user);
        } else {
            $user = User::find($id);
            $user->password = bcrypt($request->input('password'));

            $user->save();
            Session::flash('flash_title', "Success");
            Session::flash('flash_message', "Password has been changed.");
            return redirect('/admin');
        }
    }

}
