<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;


class DashboardsController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
        return view('frontend.pages.dashboards.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword()
    {
        return view('frontend.pages.dashboards.change_password');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        if(Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])){
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->route('customer.dashboard')->with('success', 'Your Password Change Successfully');
        }else{
            return redirect()->back()->with('warning', 'Current Password Does Not Match');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function orderList()
    {
        $orders = Order::orderBy('id', 'desc')->where('user_id', Auth::user()->id)->get();
        return view('frontend.pages.dashboards.customer_order', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = User::find(Auth::user()->id);
        return view('frontend.pages.dashboards.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);
        
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'mobile' => ['required', 'unique:users,mobile,'.$user->id, 'regex:/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/'],
            'gender' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png,gif|max:3000',
        ]);
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->gender = $request->gender;
        $img = $request->file('image');
        if($img)
        {
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('images/users/', $imgName);
            if(file_exists('images/users/'.$user->image) AND !empty($user->image))
            {
                unlink('images/users/'.$user->image);
            }
            $user['image'] = $imgName;
        }
        $user->save();
        return redirect()->route('customer.dashboard')->with('success', 'Profle Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function orderDetails($id)
    {
        $orderData = Order::find($id);
        $order = Order::where('id', $orderData->id)->where('user_id', Auth::user()->id)->first();
        if($order == false)
        {
            return redirect()->back()->with('warning', 'Do not try to be over smart');
        }else{
            $order = Order::where('id', $orderData->id)->where('user_id', Auth::user()->id)->first();
            return view('frontend.pages.dashboards.order_details', compact('order'));
        }
    }
}
