<?php

namespace Devmus\Http\Controllers\Admin;

use Devmus\Http\Controllers\Controller;
use Devmus\Model\Admin\Admin;
use Devmus\Model\Admin\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Admin::all();

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();

        return view('admin.user.create', compact('roles'));
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

            'name' => 'required|string|max:255',
            
            'email' => 'required|string|email|max:255|unique:admins',

            'phone' => 'required|numeric|min:6|unique:admins',
            
            'password' => 'required|string|min:6|confirmed',

            'status' => 'required'
        ]);

        $request['password'] = bcrypt($request->password);

        $user = Admin::create($request->all());

        $user->roles()->sync($request->role);

        return redirect()->route('user.index')->with('message','User success created');
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
        $roles = Role::all();

        $user = Admin::find($id);

        return view('admin.user.edit',compact('user','roles'));
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
        // return $request->all();
        $this->validate($request, [

            'name' => 'required|string|max:255',
            
            'email' => 'required|string|email|max:255',

            'phone' => 'required|numeric|min:6',

        ]);

        if ($request->password) {
            
          $request['password'] = bcrypt($request->password);
        }



        $user = Admin::find($id);


        $user->name = $request->name;

        $user->email = $request->email;

        $user->phone = $request->phone;


        if ($request->password) {
            
            $user->password = $request->password;
        }


        if (!$request->status) {

            $user->status = 0;
            
        } else {
            
           $user->status = $request->status;
        }


        $user->save();

        $user->roles()->sync($request->role);


        return redirect()->route('user.index')->with('message','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Admin::where('id',$id)->delete();

        return redirect()->back()->with('message','User is Deleted success');
    }
}
