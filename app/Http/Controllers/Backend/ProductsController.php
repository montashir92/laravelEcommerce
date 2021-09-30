<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Brand;

class ProductsController extends Controller
{
    
    public function index()
    {
        $data['allData'] = Product::all();
        return view('backend.pages.products.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['brands'] = Brand::all();
        return view('backend.pages.products.create', $data);
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
            'name' => 'required|unique:products,name',
            'description' => 'required',
            //'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:3000',
        ]);
        
        $products = new Product();
        $products->category_id = $request->category_id;
        $products->brand_id = $request->brand_id;
        $products->name = $request->name;
        $products->slug = Str::slug($request->name);
        $products->description = $request->description;
        $products->price = $request->price;
        $products->product_key = $request->product_key;
        $products->quantity = $request->quantity;
        $products->available = $request->available;
        $products->condition = $request->condition;
        $products->status = 1;
        $products->created_by = Auth::user()->id;
        $products->save();
        
        $files = $request->image;
        if(!empty($files)){
            foreach ($files as $file) {
                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file->move('images/products/', $fileName);
                $images['image'] = $fileName;
                        
                $images = new ProductImage();
                $images->product_id = $products->id;
                $images->image = $fileName;
                $images->save();
            }
        }
        
        return redirect()->route('products.create')->with('toast_success', 'A New Product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = Product::find($id);
        $data['brands'] = Brand::all();
        return view('backend.pages.products.edit', $data);
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
        $products = Product::find($id);
        
        $this->validate($request, [
            'name' => 'required|unique:products,name,'.$products->id,
            'description' => 'required',
            //'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:3000',
        ]);
        
        $products->category_id = $request->category_id;
        $products->brand_id = $request->brand_id;
        $products->name = $request->name;
        $products->slug = Str::slug($request->name);
        $products->description = $request->description;
        $products->price = $request->price;
        $products->product_key = $request->product_key;
        $products->quantity = $request->quantity;
        $products->available = $request->available;
        $products->condition = $request->condition;
        $products->updated_by = Auth::user()->id;
        $products->save();
        
        $files = $request->image;
        //Old Image Deleted
        if(!empty($files)){
            $getImages = ProductImage::where('product_id', $id)->get()->toArray();
            foreach ($getImages as $value) {
                if(!empty($value)){
                    unlink('images/products/'.$value['image']);
                }
            }
            ProductImage::where('product_id', $id)->delete();
        }
        
        if(!empty($files)){
            foreach ($files as $file) {
                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file->move('images/products/', $fileName);
                $images['image'] = $fileName;
                        
                $images = new ProductImage();
                $images->product_id = $products->id;
                $images->image = $fileName;
                $images->save();
            }
        }
        
        return redirect()->route('products.index')->with('toast_success', 'Product Data Updated Successfully');
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
