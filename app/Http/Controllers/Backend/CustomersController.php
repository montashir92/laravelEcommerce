<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CustomersController extends Controller
{
    
    public function index()
    {
        $data['customerdata'] = User::where('usertype', 'customer')->where('status', 1)->get();
        return view('backend.pages.customers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function draftShow()
    {
        $data['customerdraft'] = User::where('usertype', 'customer')->where('status', 0)->get();
        return view('backend.pages.customers.draft_show', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $cusromer = User::find($request->id);
        if(!is_null($cusromer))
        {
            if(file_exists('images/users/'.$cusromer->image) AND !empty($cusromer->image));
            {
                unlink('images/users/'.$cusromer->image);
            }
            
            $cusromer->delete();
        }
        
        return redirect()->back()->with('toast_success', 'Customer Data Deleted Successfully');
    }
}
