<?php

namespace App\Http\Controllers\Admin;

use App\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MembershipController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Membership::all();
        return view('admin.membership.view')->with('memberships', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.membership.add');
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
            'membership' => 'required|max:50|unique:memberships,membership',
            'isActive' => 'required|boolean'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        Membership::create([
            'membership' => $request->membership,
            'isActive' => $request->isActive,
        ]);


        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The membership has been added successfully');
        return redirect('admin/membership');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $membership = Membership::find($id);
        return view('admin.membership.edit')->with(['membership' => $membership]);
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
        $rules = [
            'name' => 'required|max:50|unique:memberships,name,'.$id,
            'price' => 'required|between:0,9999.9',
            'state' => 'required|integer',
            'search' => 'required|integer',
            'image' => 'required|integer',
            'video' => 'required|integer',
            'video_length' => 'required|integer',
            'record' => 'required|integer',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        Membership::find($id)->update($request->all());

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The membership has been updated successfully');
        return redirect('admin/membership');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membership = Membership::find($id);

        // TO_DO_DEM Clear all Facilities by Eloquent remove pivot records

        $membership->delete();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The membership has been deleted successfully');
        return redirect('admin/membership');

    }
}
