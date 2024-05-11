<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email',$request->input('email'))->first();

        if($user != ''){

            if(Hash::check($request->input('password'), $user->password)){
                auth()->login($user);

                if(auth()->user()->role == 'Customer'){

                return redirect()->to('/customer-home');
                }
                else{
                    return redirect()->to('/admin-home');    
                }
            }
            else{
                return redirect()->back()->with('error', 'The Email or Password is incorrect, Please try again');
            }
        }
        else{
            return redirect()->back()->with('error', 'The Email or Password is incorrect, Please try again');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function registerpost(Request $request)
    {
       
        $rules = [
            'username' => [
                'required',
                'string',
                'min:0',
                'max:100',            
            ],
            'fullname' => [
                'required',
                'string',
                'min:0',
                'max:100',            
            ],
            'email' =>  [
                'required',
                'string',
                'email',
                'min:0',
                'max:255',
                'unique:users,email', 
            ],
            'address' => [
                'required',
                'string',
                'min:0',
                'max:500',            
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:32',            
                'regex:/[a-z]/',     
                'regex:/[A-Z]/',     
                'regex:/[0-9]/',     
                'regex:/[@$!%*#?&]/', 
            ],
           

          
        ];

        $messages = array(
           
        );
        
        $this->validate($request, $rules,$messages);

        $username = $request->input('username');
        $email = $request->input('email');
        $fullname = $request->input('fullname');
        $address = $request->input('address');
        $password = $request->input('password');
        $phone = $request->input('phone');
        $user = User::create(request(['username', 'email', 'fullname', 'address', 'password', 'role','phone']));
		$user->password = Hash::make($password);
		$user->email = $email;
        $user->username = $username;
        $user->fullname = $fullname;
        $user->address = $address;
        $user->phone = $phone;
        $user->role = 'Customer';
        $user->save();
        auth()->login($user);

        return redirect()->to('/customer-home');
    }

    public function signout()
    {
        auth()->logout();
        return redirect('/');
    }
}
