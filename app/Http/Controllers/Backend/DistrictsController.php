<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;

class DistrictsController extends Controller
{
    
    public function index()
    {
        $data['allData'] = District::all();
        return view('backend.pages.districts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['divisions'] = Division::orderBy('priority', 'asc')->get();
        return view('backend.pages.districts.create', $data);
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
            'division_id' => 'required',
            'name' => 'required|unique:districts,name',
        ]);
        
        $districts = new District();
        $districts->division_id = $request->division_id;
        $districts->name = $request->name;
        $districts->save();
        return redirect()->route('districts.create')->with('toast_success', 'A New District Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = District::find($id);
        $data['divisions'] = Division::all();
        return view('backend.pages.districts.create', $data);
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
            'division_id' => 'required',
            'name' => 'required',
        ]);
        
        $districts = District::find($id);
        $districts->division_id = $request->division_id;
        $districts->name = $request->name;
        $districts->save();
        return redirect()->route('districts.index')->with('toast_success', 'District Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $district = District::find($request->id);
        if(!is_null($district)){
            $district->delete();
        }
        return redirect()->back()->with('toast_success', 'District Data Deleted Successfully');
    }
}
