<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\orders;
use App\Models\order_feedback;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalsales = orders::whereNot('order_status','Rejected')
        ->whereNot('order_status','Payment Failed')
        ->whereNot('order_status','Pending Payment')
        ->sum('total_price');

        $totalconfirmed = orders::whereNot('order_status','Rejected')
        ->whereNot('order_status','Payment Failed')
        ->whereNot('order_status','Pending Payment')
        ->count();

        $neworder = orders::where('order_status','Order Placed')
        ->whereNot('order_status','Payment Failed')
        ->whereNot('order_status','Pending Payment')
        ->count();

        $rejectedorder = orders::where('order_status','Rejected')
        ->whereNot('order_status','Payment Failed')
        ->whereNot('order_status','Pending Payment')
        ->count();

        return view('Admin.index',compact('totalsales','totalconfirmed','neworder','rejectedorder'));
    }

    public function feedback()
    {
        $feedbacks = order_feedback::latest()->get();

        return view('Admin.feedback',compact('feedbacks'));
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function users()
    {
        $users = User::where('role','Customer')->latest()->get();

        return view('Admin.userslist',compact('users'));
    }

    public function createuser()
    {
        return view('Admin.create-user');
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function postUser(Request $request)
    {
        $rules = [
            'username' => ['required', 'string', 'max:100'],
            'fullname' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'address' => ['required', 'string', 'max:500'],
            'password' => ['required', 'string', 'min:8', 'max:32', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/'],
        ];
        
        $messages = [
            'password.regex' => 'The password must contain at least one lowercase letter, one uppercase letter, one number, and one special character.',
        ];
        
        $request->validate($rules, $messages);
        
        $user = new User();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->fullname = $request->input('fullname');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->password = Hash::make($request->input('password'));
        $user->role = 'Customer';
        $user->save();
        
        return redirect('/userslist')->with('success', 'User has been created successfully!');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edituser(string $id)
    {
        $user = User::where('id',$id)->first();

        return view('Admin.edit-user',compact('user'));
    }


    public function viewuser(string $id)
    {
        $user = User::where('id',$id)->first();

        return view('Admin.view-user',compact('user'));
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function updateUser(Request $request, string $id)
    {
        $rules = [
            'username' => ['required', 'string', 'max:100'],
            'fullname' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'address' => ['required', 'string', 'max:500'],
            'password' => ['nullable', 'string', 'min:8', 'max:32', 'regex:/[a-z]/', 'regex:/[A-Z]/', 'regex:/[0-9]/', 'regex:/[@$!%*#?&]/'],
        ];
        
        $messages = [
            'password.regex' => 'The password must contain at least one lowercase letter, one uppercase letter, one number, and one special character.',
        ];
        
        $request->validate($rules, $messages);
        
        $user = User::findOrFail($id);
        $user->username = $request->input('username');
        $user->fullname = $request->input('fullname');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        if ($request->has('email') && $request->input('email') !== $user->email) {
            // Check if the new email is unique
            if (User::where('email', $request->input('email'))->where('id', '!=', $id)->exists()) {
                return redirect()->back()->withInput()->withErrors(['email' => 'The email has already been taken by another user.']);
            }
            $user->email = $request->input('email');
        }
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        
        $user->role = 'Customer';
        $user->save();
        
        return redirect('/userslist')->with('success', 'User has been updated successfully!');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteuser(string $id)
    {
        User::findOrFail($id)->delete();

        return redirect('/userslist')->with('success', 'User has been deleted successfully!');  
    }


    public function orders()
    {
        $orders = orders::latest()->get();

        return view('Admin.orderlist',compact('orders'));
    }

    public function vieworder($id)
    {
        $order = orders::where('order_id',$id)->first();

        return view('Admin.view-order',compact('order'));
    }

    

    public function updateOrderStatus(Request $request, $id)
    {
        $order = orders::where('order_id', $id)->first();
    
        if (!$order) {
            return redirect()->back()->with('error', 'Order not found');
        }
    
        $newStatus = $request->input('order_status');
        $order->order_status = $newStatus;
        $order->save();
    
        return redirect()->back()->with('success', "Status for {$order->order_no} has been updated to $newStatus");
    }
    

    
    
}
