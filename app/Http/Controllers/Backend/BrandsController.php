<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandsController extends Controller
{
    
    public function index()
    {
        $data['brands'] = Brand::all();
        return view('backend.pages.brands.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:3000',
        ]);
        
        $brands = new Brand();
        $brands->name = $request->name;
        $img = $request->file('image');
        if($img){
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('images/brands/', $imgName);
            $brands['image'] = $imgName;
        }
        $brands->save();
        return redirect()->route('brands.create')->with('toast_success', 'A New Brand Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = Brand::find($id);
        return view('backend.pages.brands.create', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:3000',
        ]);
        
        $brands = Brand::find($id);
        $brands->name = $request->name;
        $img = $request->file('image');
        if($img){
            $imgName = date('YmdHi').$img->getClientOriginalName();
            @unlink('images/brands/'.$brands->image);
            $img->move('images/brands/', $imgName);
            $brands['image'] = $imgName;
        }
        $brands->save();
        return redirect()->route('brands.index')->with('toast_success', 'Brand Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $brand = Brand::find($request->id);
        if(!is_null($brand)){
            if(file_exists('images/brands/'.$brand->image) AND !empty($brand->image)){
                unlink('mages/brands/'.$brand->image);
            }
            $brand->delete();
        }
        return redirect()->back()->with('toast_success', 'Brand Data Deleted Successfully');
    }
}
