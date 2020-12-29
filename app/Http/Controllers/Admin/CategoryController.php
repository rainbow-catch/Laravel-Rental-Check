<?php

namespace App\Http\Controllers\Admin;

use App\Category;

use App\Incident;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CategoryController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
        $data = Category::all();
        return view('admin.category.view')->with('categories', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add')->with('incidents', Incident::all());
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
            'category' => 'required|string|unique:categories,category',
            'incidents' => 'required|array',
            'scores' => 'required|array',
            'isActive' => 'required|boolean'
        ];

        $incidents = $request->incidents;
        $scores = $request->scores;

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        }
        else if(count($incidents) != count(array_unique($incidents))) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors("Duplicated Incident type");
        }
        else{
            $order = Category::count();
            $category = Category::create([
                'category' => $request->category,
                'order' => $order,
                'isActive' => $request->isActive
            ]);

            $data = [];
            for($i = 0; $i < count($incidents); $i++) {
                if($scores[$i] == 0) continue;
                $data[$incidents[$i]] =  ['score'=>$scores[$i]];
            }
            $category->incidents($data);

            Session::flash('flash_title', "Success");
            Session::flash('flash_message', "Category has been added. Add more categories.");

            return redirect('/admin/category');
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
        $category = Category::find($id);
        return view('admin.category.edit')
            ->with('category', $category)->with('incidents', Incident::all())->with('category_count', Category::count());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,  Request $request)
    {
        $rules = [
            'category' => 'required|string|unique:categories,category,'.$id,
            'incidents' => 'required|array',
            'scores' => 'required|array',
            'detail' => 'nullable|string',
            'order' => 'required|integer',
            'isActive' => 'required|boolean'
        ];

        $validator = Validator::make($request->all(), $rules);
        $incidents = $request->incidents;
        $scores = $request->scores;
        $order = $request->order;
        $detail = $request->detail ? explode(", ", $request->detail): [];

        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        }
        elseif(count($incidents) != count(array_unique($incidents))) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors("Duplicated Incident type");
        }
        elseif(count($detail) != count(array_unique($detail))) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors("Duplicated Detail field");
        }
        else {
            $category = Category::find($id);
            $category->category = $request->category;
            $category->isActive = $request->isActive;
            $category->detail = json_encode($detail);
            $category->save();

            $data = [];
            for($i = 0; $i < count($incidents); $i++) {
                if($scores[$i] == 0) continue;
                $data[$incidents[$i]] =  ['score'=>$scores[$i]];
            }
            $category->incidents($data);

            if($category->order != $order){
                $this->reorderCategories($category->id, $order);
            }
            Session::flash('flash_title', "Success");
            Session::flash('flash_message', "Category has been updated.");

            return redirect('/admin/category');
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
        $category = Category::find($id);

        // TO_DO_DEM Clear all Facilities by Eloquent remove pivot records

        $category->delete();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The incident has been deleted successfully');
        return redirect('admin/category');
    }

    private function reorderCategories($id, $order)
    {
        $selected = Category::find($id);
        $from = $selected->order;
        $to = $order;

        $selected->order = $to;

        //If down
        if($from > $to)
            foreach(Category::where('order', '<', $from)->where('order', '>=', $to)->get() as $item) {
                $oldOrder = $item->order;
                $item->update([
                        'order'=> $oldOrder + 1
                    ]);
            }
        else
            foreach(Category::where('order', '>', $from)->where('order', '<=', $to)->get() as $item) {
                $oldOrder = $item->order;
                $item->update([
                    'order'=> $oldOrder - 1
                ]);
            }
        $selected->save();
    }

}
