<?php

namespace Devmus\Http\Controllers\Admin\Auth;

use Devmus\Http\Controllers\Controller;
use Devmus\Model\Admin\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function showLoginForm()
    {
        return view('admin.login');
    }


    public function login(Request $request)
    {
        $this->validateLogin($request);

   

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }


        return $this->sendFailedLoginResponse($request);
    }


    protected function credentials(Request $request)
    {

        $admin = Admin::where('email',$request->email)->first();

        if (count($admin)) {
            
            if ($admin->status == 0) {

                return ['email'=> 'inactive', 'password'=> 'You are not active... please contact admin.'];    
                
            } else {

                return ['email'=> $request->email, 'password'=> $request->password, 'status'=> 1 ];
                
            }
            
        }

        return $request->only($this->username(), 'password');
    }


    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
