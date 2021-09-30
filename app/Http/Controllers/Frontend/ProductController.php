<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductController extends Controller
{
    
    public function index()
    {
        $data['products'] = Product::orderBy('id', 'desc')->paginate(12);
        return view('frontend.pages.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function categoryProduct($id)
    {
        $category = Category::find($id);
        if(!is_null($category)){
            return view('frontend.pages.products.category_product', compact('category'));
        }else{
            return redirect()->back()->with('warning', 'Sorry! There is No Category Product');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function brandProduct($id)
    {
        $brand = Brand::find($id);
        if(!is_null($brand)){
            return view('frontend.pages.products.brand_product', compact('brand'));
        }else{
            return redirect()->back()->with('warning', 'Sorry! There is No Brand Product');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $data['product'] = Product::where('slug', $slug)->first();
        return view('frontend.pages.products.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
