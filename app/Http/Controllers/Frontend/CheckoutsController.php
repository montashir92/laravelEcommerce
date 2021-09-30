<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Division;
use App\Models\District;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Cart;
use Session;
use Mail;

class CheckoutsController extends Controller
{
    
    public function index()
    {
        return view('frontend.pages.customers.customer_login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function signup()
    {
        $data['divisions'] = Division::all();
        return view('frontend.pages.customers.customer_signup', $data);
    }
    
    /**
     * Show the get District form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDistrict(Request $request)
    {
        $division_id = $request->division_id;
        $allDistrict = District::where('division_id', $division_id)->get();
        return response()->json($allDistrict);
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
            'email' => 'required|email|unique:users,email',
            'password' => 'min:8|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'min:8',
            'mobile' => ['required', 'unique:users,mobile', 'regex:/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$/'],
            'street_addres' => 'required',
            'division_id' => 'required',
            'district_id' => 'required',
        ]);
        
        $code = rand(0000,9999);
        $users = new User();
        $users->name = $request->name;
        $users->usertype = 'customer';
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->mobile = $request->mobile;
        $users->code = $code;
        $users->street_addres = $request->street_addres;
        $users->division_id = $request->division_id;
        $users->district_id = $request->district_id;
        $users->status = 0;
        $users->save();
        
        $data = array(
            'email' => $request->email,
            'code' => $code,
        );
        
        Mail::send('frontend.pages.mails.email_verify',$data, function($message) use($data){
            $message->from('montashirb@gmail.com', 'E-Bazaar');
            $message->to($data['email']);
            $message->subject('Please Verify Your Email Address');
        });
        
        return redirect()->route('customer.email.verify')->with('success', 'Successfully Signup, Please Verify Email');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function emailVerify()
    {
        return view('frontend.pages.customers.email_verify');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verifyStore(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'code' => 'required',
        ]);
        
        $userverify = User::where('email', $request->email)->where('code', $request->code)->first();
        if(!is_null($userverify)){
            $userverify->status = 1;
            $userverify->save();
            return redirect()->route('customer.login')->with('success', 'You Have Successfully Verifyed');
        }else{
            return redirect()->back()->with('warning', 'Email or Code is Invalid');
        }
    }

    /**
     * customer Checkout the show.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkout()
    {
        $payments = Payment::orderBy('priority', 'asc')->get();
        return view('frontend.pages.checkouts.index', compact('payments'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkoutStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile' => 'required|numeric',
            'shipping_address' => 'required',
            'payment_method_id' => 'required',
        ]);
        
        $orders = new Order();
        
        //Check Transaction Id Given or Not
        if($request->payment_method_id != 'cash_in'){
            if($request->payment_method_id == NULL || empty($request->payment_method_id)){
                return redirect()->back()->with('message', 'Please Give Transaction Id for your Payment');
            }
        }
        
        $orders->ip_address = request()->ip();
        $orders->name = $request->name;
        $orders->email = $request->email;
        $orders->mobile = $request->mobile;
        $orders->shipping_address = $request->shipping_address;
        $orders->message = $request->message;
        $orders->transaction_id = $request->transaction_id;
        
        if(Auth::check()){
            $orders->user_id = Auth::id();
        }
        $orders->payment_id = Payment::where('short_name', $request->payment_method_id)->first()->id;
        $orders->save();
        
        foreach (Cart::totalCarts() as $cart) {
            $cart->order_id = $orders->id;
            $cart->save();
        }
        
        return redirect()->route('customer.order.list')->with('success', 'Your Order Taken Successfully');
    }
}
