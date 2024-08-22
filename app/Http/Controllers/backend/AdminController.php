<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\Models\Customer;
use App\Models\User;
class AdminController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $valodate = $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required',
            ]);
            // dd($request->all());
            if(Auth::guard('web')->attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>'Active','type'=>'Admin'])){
                return redirect('dashboard');
                }
            // else{
            //     return redirect()->back()->with('error','Invalid Email or Password');
            // }

            if (Auth::guard('web')->attempt(['email' => $data['email'], 'password' => $data['password'], 'status' => 'Active', 'type' => 'Customer'])) {
                // dd('ok');
                return redirect(route('client.account'));
            } else {
                return redirect()->back()->with('error','Wrong Email or Password');
            }


        }
        return view('backend.login');
    }
    public function logout(){
        Auth::guard('web')->logout();
        return redirect('login');
    }
    public function userLogout(){
        Auth::guard('web')->logout();
        return redirect('user_login');
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required',
        ];

        $this->validate($request, $rules);
        //   dd($request->all());
        $user = New User();
        $user->name = $request-> name;
        $user->email = $request-> email;
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->address;
        // $user->type = 'Customer';
        // $user->status = 'Active';
        $user->save();
        $new_customer = $user->id;

        $customer = new Customer();
        $customer->user_id = $new_customer;
        $customer->name = $request->name;
        // $customer->bod = $request->bod;
        // $customer->company_name = $request->company_name;
        // $customer->country = $request->country;
        // $customer->street_address = $request->street_address;
        // $customer->street_address = $request->street_address;
        // $customer->city = $request->$request->city;
        $customer->save();
        return redirect('/user_login');

    }

}
