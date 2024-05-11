<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\order_feedback as ModelsOrder_feedback;
use Illuminate\Http\Request;
use App\Models\services;
use App\Models\orders;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Input;
use App\Models\order_feedback;
use Carbon\Carbon;
use App\Models\Toyyibpay;

use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $services = services::latest()->get();

    return view('Customer.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function shopnow(Request $request)
    {
        $categoryfilter = $request->categoryfilter;
        $price = $request->pricerange;

        $servicesQuery = services::latest();

        if ($categoryfilter != 'all' && !is_null($categoryfilter)) {
            $servicesQuery->where('service_category', $categoryfilter);
        }

        if ($price != 'all' && !is_null($price)) {
            $priceRange = explode('-', $price);
            $minPrice = $priceRange[0];
            $maxPrice = $priceRange[1];
            $servicesQuery->whereBetween('service_price', [$minPrice, $maxPrice]);
        }

        $services = $servicesQuery->get();

        $category = category::latest()->get();

        return view('Customer.shop', compact('services', 'category', 'categoryfilter', 'price'));
    }


    /**
     * Store a newly created resource in storage.
     */




     public function storeCheckout(Request $request, $id)
     {
         $service = services::findOrFail($id);

         // Retrieve the quantity from the request, defaulting to 1 if not provided
        $quantity = $request->input('quantity', 1);

        // Calculate the total price based on the quantity and service price
        $totalPrice = $quantity * $service->service_price;

        // Create a new order
        $order = new orders;
        $order->order_no = $this->gen_uid(10); // Using this method to generate order number
        $order->delivery_name = $request->input('delivery_name');
        $order->delivery_address = $request->input('delivery_address');
        $order->phone = $request->input('phone');
        $order->remark = $request->input('remark');
        $order->order_status = 'Pending Payment';
        $order->email = $request->input('email');

        // Set the total price based on the quantity and service price
        $order->quantity = $request->quantity; // added quantity
        $order->total_price = $totalPrice * old('quantity', 1);

        // Set the service ID and user information
        $order->service_id = $id;
        $order->created_by = auth()->user()->id;
        $order->updated_by = auth()->user()->id;

        // Handle document file upload if provided
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $fileName = $file->getClientOriginalName();
            $file->storeAs('documents', $fileName, 'public');
            $order->document = $fileName;
        }

        // Save the order
        $order->updated_at = now();
        $order->save();


         $toyyibpay_secret_key = 'njmpcggk-cw5s-qc5i-pw4v-0g5sigtt8z73';
         $category_code = 'zm13k609';
         $paymentGateway = new ToyyibPay($toyyibpay_secret_key);

         $baseurl = 'http://127.0.0.1:8000';

         $orders = orders::where('order_id',$order->order_id)->first();

         $id = $orders->order_id;


         //dd($category_code, auth()->user()->username, $order->getservice->service_name, $id);
         $bill = $paymentGateway->createBill( $category_code, auth()->user()->username, $order->getservice->service_name, $id )
                                 ->payer( auth()->user()->username, auth()->user()->email, $orders->phone)
                                 ->amount( $order->total_price )
                                 ->chargeToCustomer( 2 )
                                 ->callbackUrl( "{$baseurl}/returnPayment/$id")
                                 ->emailContent( 'Thank you for your Payment!' );

                                 echo $bill->redirectToPaymentUrl();

         return redirect()->back()->with('success', 'Order placed successfully.');
     }


     public function returnPayment($id,Request $request)
     {

     $order = orders::where('order_id',$id)->first();
     $order->order_status = $request->status_id == 1 ? 'Order Placed' : 'Payment Failed';
     $order->transaction_id = $request->transaction_id;
     $order->billcode = $request->billcode;
     $order->save();



     if( $request->status_id == 1){

        return redirect('/myorders')->with('success', 'Order placed successfully.');

     }
     else{

        return redirect('/myorders')->with('error','Whoops! Payment Failed! Please try again!');

     }
     }

     public function gen_uid($l=5){
         return substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"), 10, $l);
     }






    /**
     * Display the specified resource.
     */
    public function checkout(string $id)
    {
        $service = services::where('service_id',$id)->first();

        return view('Customer.checkout', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function myorders()
    {
        $orders = orders::where('created_by',auth()->user()->id)->latest()->get();

        return view('Customer.orders', compact('orders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateprofile(Request $request)
    {
       $user = User::where('id',auth()->user()->id)->first();
       $user->username = $request->input('username');
       $user->fullname = $request->input('fullname');
       $user->phone = $request->input('phone');
       $user->address = $request->input('address');
       $user->save();

       return redirect()->back()->with('success', 'Profile has been updated successfully.');
    }

    public function changepassword(Request $request)
    {
        $request->validate([
            'currentpassword' => ['required', new MatchOldPassword],
            'newpassword' => ['required'],
            'renewpassword' => ['same:newpassword'],
        ]);

        $user = User::find(auth()->user()->id);
		$user->password = Hash::make($request->input('newpassword'));
        $user->save();

        return redirect()->back()->with('success', "Password has been changed successfully! ");
    }



    /**
     * Remove the specified resource from storage.
     */
    public function profile()
    {
        return view('Customer.profile');
    }

    public function provideFeedback($id)
    {
        $order = orders::where('order_id',$id)->first();

        return view('Customer.feedback',compact('order'));
    }


    public function storeFeedback(Request $request,$id)
    {
        $order = orders::where('order_id',$id)->first();

        $order->feedback = 'Y';
        $order->save();

        $feedback = new order_feedback;
        $feedback->feedback = $request->input('feedback');
        $feedback->order_id = $id;
        $feedback->created_by = auth()->user()->id;
        $feedback->updated_at = Carbon::now();
        $feedback->updated_by = auth()->user()->id;
        $feedback->save();

        return redirect('/myorders')->with('success', "Feedback has been saved successfully! ");
    }


}
