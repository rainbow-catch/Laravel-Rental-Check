<?php

namespace App\Http\Controllers\Admin;

use App\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PaymentMethodController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PaymentMethod::all();
        return view('admin.payment_method.view')->with('payment_methods', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payment_method.add');
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
            'name' => 'required|max:50|unique:payment_methods,name',
            'isActive' => 'required|boolean'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        PaymentMethod::create([
            'name' => $request->name,
            'isActive' => $request->isActive,
        ]);


        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The payment method has been added successfully');
        return redirect('admin/payment_method');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment_method = PaymentMethod::find($id);
        return view('admin.payment_method.edit')->with(['payment_method' => $payment_method]);
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
            'name' => 'required|max:50|unique:payment_methods,name,'.$id,
            'isActive' => 'required|boolean',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        PaymentMethod::find($id)->update($request->all());

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The payment method has been updated successfully');
        return redirect('admin/payment_method');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment_method = PaymentMethod::find($id);

        // TO_DO_DEM Clear all Facilities by Eloquent remove pivot records

        try {
            $payment_method->delete();
        }
        catch (\Exception $error){
            return redirect()->back()
                ->withErrors("You can't delete this payment method since it other users are using it.");
        }
        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The payment method has been deleted successfully');
        return redirect('admin/payment_method');

    }
}
