<?php

namespace Devmus\Http\Controllers\Admin;

use Devmus\Model\Admin\Permission;
use Illuminate\Http\Request;
use Devmus\Http\Controllers\Controller;


class PermissionController extends Controller
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

        $permissions = Permission::all();


        return view('admin.permission.index', compact('permissions'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');

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
            'name' =>'required|max:50|unique:permissions',
            'for' => 'required'
        ]);

        $permission = new Permission;

        $permission->name = $request->name;

        $permission->for = $request->for;

        $permission->save();


        return redirect()->route('permission.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \Devmus\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Devmus\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $permission = Permission::find($permission->id);

        return view('admin.permission.edit',compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Devmus\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->validate($request, [
            'name' => 'required|max:50',
            'for' => 'required'
        ]);

        $permission = Permission::find($permission->id);

        $permission->name = $request->name;

        $permission->for = $request->for;

        $permission->save();

        return redirect()->route('permission.index')->with('message', 'Permission Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Devmus\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        Permission::where('id', $permission->id)->delete();

        return redirect()->back();
    }
}
