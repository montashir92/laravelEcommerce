<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\District;

class DivisionsController extends Controller
{
    
    public function index()
    {
        $data['allData'] = Division::all();
        return view('backend.pages.divisions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.divisions.create');
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
            'name' => 'required|unique:divisions,name',
            'priority' => 'required',
        ]);
        
        $divisions = new Division();
        $divisions->name = $request->name;
        $divisions->priority = $request->priority;
        $divisions->save();
        return redirect()->route('divisions.create')->with('toast_success', 'A New Division Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = Division::find($id);
        return view('backend.pages.divisions.create', $data);
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
            'priority' => 'required',
        ]);
        
        $divisions = Division::find($id);
        $divisions->name = $request->name;
        $divisions->priority = $request->priority;
        $divisions->save();
        return redirect()->route('divisions.index')->with('toast_success', 'Division Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $division = Division::find($request->id);
        if(!is_null($division)){
            //Delete all the district for this Division
            
            $districts = District::where('division_id', $division->id)->get();
            foreach ($districts as $district) {
                $district->delete();
            }
            $division->delete();
        }
        return redirect()->back()->with('toast_success', 'Division Data Deleted Successfully');
    }
}
