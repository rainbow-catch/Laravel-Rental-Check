<?php

namespace App\Http\Controllers\Admin;

use App\Complaint;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ComplaintController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Complaint::all();
        return view('admin.complaint.view')->with('complaints', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.complaint.add');
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
            'complaint' => 'required|max:50|unique:complaints,complaint',
            'isActive' => 'required|boolean'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        Complaint::create([
            'complaint' => $request->complaint,
            'isActive' => $request->isActive,
        ]);


        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The complaint has been added successfully');
        return redirect('admin/complaint');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $complaint = Complaint::find($id);
        return view('admin.complaint.edit')->with(['complaint' => $complaint]);
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
            'company_id' => 'required|integer',
            'customer_id' => 'required|integer',
            'incident_date' => 'required|date',
            'zipcode' => 'required|integer',
            'amount' => 'nullable|between:0,99999.9',
            'pickup_date' => 'required|date',
            'return_date' => 'required|date',
            'description' => 'required|string',
            'media_type' => 'required|in:background,carousel,video,none',
            'detail' => 'nullable|array',
            'incident_types' => 'nullable|array',
            'paths' => 'nullable|array',
            'url' => 'nullable|url',
        ];

        $files = $request->paths;
        $url = $request->url?? "";
        if ($request->media_type == 'video') {
            $rules['paths.*'] = ['nullable', 'mimes:mp4,mov,ogg'];
            if($url) $files=[];
        }
        else {
            $rules['paths.*'] = ['nullable', 'mimes:jpg,png,gif'];
            $url="";
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        $complaint = Complaint::find($id);

        $newComplaint = [
            'company_id' => $request->company_id,
            'customer_id' => $request->customer_id,
            'incident_date' => new DateTime($request->incident_date),
            'zipcode' => $request->zipcode,
            'amount' => $request->amount,
            'pickup_date' => new DateTime($request->pickup_date),
            'return_date' => new DateTime($request->return_date),
            'description' => $request->description,
            'detail' => json_encode($request->detail),
            'incident_types' => json_encode($request->incident_types?? []),
        ];
        $pathOrUrl = [];
        if($url || $request->media_type=='none') {
            foreach(json_decode($complaint->pathOrUrl) as $item) {
                if($item->type=='path' && strpos($item->src, "default/") !== 0) {
                    Storage::delete('public/complaints/'.$item->src);
                }
            }
            $pathOrUrl = $url? [['type'=>'url', 'src'=>$url]]: [];
            $newComplaint['pathOrUrl'] = json_encode($pathOrUrl);
            $newComplaint['media_type'] = $request->media_type;
        }
        elseif($request->paths) {
            foreach(json_decode($complaint->pathOrUrl) as $item) {
                if($item->type=='path' && strpos($item->src, "default/") !== 0) {
                    Storage::delete('public/complaints/'.$item->src);
                }
            }
            foreach($files as $file) {
                $path = $file->store('', 'complaint');
                array_push($pathOrUrl, ['type'=>'path', 'src'=>$path]);
            }
            $newComplaint['media_type'] = $request->media_type;
            $newComplaint['pathOrUrl'] = json_encode($pathOrUrl);
        }

        $complaint->update($newComplaint);

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The complaint has been updated successfully');
        return redirect('admin/complaint');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $complaint = Complaint::find($id);

        // TO_DO_DEM Clear all Facilities by Eloquent remove pivot records

        $complaint->delete();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The complaint has been deleted successfully');
        return redirect('admin/complaint');

    }
}
