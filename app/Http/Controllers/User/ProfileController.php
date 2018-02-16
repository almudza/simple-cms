<?php

namespace Devmus\Http\Controllers\User;

use Illuminate\Http\Request;
use Devmus\Http\Controllers\Controller;
use Storage;
use Devmus\Model\User\User;
use Auth;

class ProfileController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('front.users.index');
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
    public function update(Request $request)
    {
        // return $request->all();
        $user = Auth::user();

        if($request->avatar){
            Storage::delete($request->user()->avatar);
        }
        if ($request->file('avatar')) {

            $saveAvatar = $request->file('avatar')->store('avatars');

            $user->avatar = $saveAvatar;
        }

        if ($request->password) {

            if ($request['password'] !== $request['password_confirmation']) {
                
                $this->validate($request,[
                    'password' => 'required|string|min:6|confirmed'
                ]);
            }
            
         $user->password = $request['password'] = bcrypt($request->password);
        }


        $user->name = $request->name;

        $user->email = $request->email;

        $user->save();



        // $avatar = $request->file('image')->store('avatars');

        // $request->user()->update([
        //     'name' => $request->name,
        //     'email' =>$request->email,
        //     'password' =>$request->password,
        //     'avatar' => $saveAvatar
        // ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if($request->user()->avatar) {

            Storage::delete($request->user()->avatar);
        }


        $request->user()->update([
            'avatar' => null
        ]);

        return redirect()->back();
    }
}
