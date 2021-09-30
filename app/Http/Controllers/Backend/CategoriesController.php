<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    
    public function index()
    {
        $data['categories'] = Category::all();
        return view('backend.pages.categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::where('parent_id', NULL)->get();
        return view('backend.pages.categories.create', $data);
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
        
        $categories = new Category();
        $categories->parent_id = $request->parent_id;
        $categories->name = $request->name;
        $img = $request->file('image');
        if($img){
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('images/categories/', $imgName);
            $categories['image'] = $imgName;
        }
        $categories->save();
        return redirect()->route('categories.create')->with('toast_success', 'A New Category Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = Category::find($id);
        $data['categories'] = Category::where('parent_id', NULL)->get();
        return view('backend.pages.categories.create', $data);
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
        
        $categories = Category::find($id);
        $categories->parent_id = $request->parent_id;
        $categories->name = $request->name;
        $img = $request->file('image');
        if($img){
            $imgName = date('YmdHi').$img->getClientOriginalName();
            @unlink('images/categories/'.$categories->image);
            $img->move('images/categories/', $imgName);
            $categories['image'] = $imgName;
        }
        $categories->save();
        return redirect()->route('categories.index')->with('toast_success', 'Category Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $category = Category::find($request->id);
        if(!is_null($category)){
            //if it's Parent category, then delete al sub category
            if($category->parent_id == NULL){
                //Delete the sub category
                $sub_category = Category::orderBy('name', 'asc')->where('parent_id', $category->id)->get();
                foreach ($sub_category as $sub_cat) {
                    if(file_exists('images/categories/'.$sub_cat->image) AND !empty($sub_cat->image)){
                        unlink('images/categories/'.$sub_cat->image);
                    }
                    $sub_category->delete();
                }
            }
            
            //Delete Category image
            if(file_exists('images/categories/'.$category->image) AND !empty($category->image)){
                unlink('images/categories/'.$category->image);
            }
            $category->delete();
        }
        return redirect()->back()->with('toast_success', 'Category Data Deleted Successfully');
    }
}
