<?php

namespace App\Http\Controllers\Admin;

use App\Incident;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class IncidentController extends AdminController
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
        $data = Incident::all();
        return view('admin.category.incident.view')->with('incidents', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.incident.add');
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
            'incident' => 'required|max:50|unique:incidents,incident',
            'status' => 'required|in:active,inactive'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        Incident::create([
            'incident' => $request->incident,
            'isActive' => $request->status,
        ]);


        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The incident has been added successfully');
        return redirect('admin/category/incident');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $incident = Incident::find($id);
        return view('admin.category.incident.edit')->with(['incident' => $incident]);
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
            'incident' => 'required|max:50|unique:incidents,incident,'.$id,
            'status' => 'required|in:active,inactive'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        Incident::find($id)->update([
            'incident' => $request->incident,
            'isActive' => $request->status,
        ]);

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The incident has been updated successfully');
        return redirect('admin/category/incident');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $incident = Incident::find($id);

        // TO_DO_DEM Clear all Facilities by Eloquent remove pivot records

        $incident->delete();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The incident has been deleted successfully');
        return redirect('admin/category/incident');

    }
}
