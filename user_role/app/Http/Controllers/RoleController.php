<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
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
        if(Auth::user()->roles_id == 2||Auth::user()->roles_id == 5||Auth::user()->roles_id == 6){
        $roles = Role::with('modules')->get();
            
    
        return view('role.index',compact('roles'))
            ->with('id', (request()->input('page', 1) - 1) * 2);
        // $roles = Role::with('modules')->get();
        // die($roles);
        }else{
            echo 'You are not allowed to permission to access this page.';
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->roles_id == 2){
        $modules = Module::get();
        
        return view('role.create',compact('modules'));
        }
        else{
            echo 'You are not allowed to permission to access this page.';
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Role $role)
    {
        $role = new Role;
        $role->roles_name = $request->roles_name;
        $role->module_id = $request->module_id;
        $role->save();

        return redirect()->route('role.index')
                         ->with('success','Admin Added successfully.');
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
    public function edit(Role $role,Module $modules)
    {
        if(Auth::user()->roles_id == 5){
        
        $modules = Module::all();
        
        return view('role.edit',compact('modules','role'));
        }else{
            echo 'You are not allowed to permission to access this page.';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request ,Role $role)
    {
        $request->validate([
            'roles_name' => 'required|min:3',            
        ],[
                'roles_name.required' => 'role name is required',                
            ]);

            $role->roles_name = $request->roles_name;
            $role->module_id = $request->module_id;
            $role->update();
       
    
        return redirect()->route('role.index')
                        ->with('success','Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::find($id)->delete();
    
        return redirect()->route('role.index')
                        ->with('success','Product deleted successfully');
    }
}
