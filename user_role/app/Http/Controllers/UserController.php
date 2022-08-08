<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
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
        if(Auth::user()->roles_id == 1||Auth::user()->roles_id == 3||Auth::user()->roles_id == 4){

        $user = User::with('roles')->get();
        // foreach($user as $u){
        //     echo "<pre>";print_r($u->roles);die();
        // }
     
        // $user = User::latest()->paginate(5);
            
    
        return view('user.index',compact('user'));
        //     ->with('i', (request()->input('page', 1) - 1) * 2);
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
        if(Auth::user()->roles_id == 1){
        $roles = Role::get();
        return view('user.create',compact('roles'));
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
    public function store(Request $request,User $user)
    {
        $request->validate([
        'name' => 'required|min:3',
        'email' => 'required|unique:users,email,'.$user->id.',id',  
        
    ],[
            'name.required' => 'Title is required',
            'email.required' => 'Email is required',
            'email.unique' => 'Email is already exists!!'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->roles_id = $request->roles_id;
        $user->password = Hash::make($request->password);
        $user->save();
        $password = Hash::make('password');
        //  return $user;
        return redirect()->route('user.index')
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
    public function edit(User $user)
    {
        if(Auth::user()->roles_id == 3){
        $roles = Role::all();
        return view('user.edit',compact('user','roles'));
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
    public function update(Request $request, User $user)
    {            
                // echo $user->id;
                $request->validate([
                    'name' => 'required|min:3',
                    'email' => 'required|unique:users,email,'.$user->id.',id',  
                    
                ],[
                        'name.required' => 'Title is required',
                        'email.required' => 'Email is required',
                        'email.unique' => 'Email is already exists!!'
                    ]);
        
                    $user->name = $request->name;
                    $user->email = $request->email;
                    $user->roles_id = $request->roles_id;
                    $user->password = Hash::make($request->password);
                    $user->update();
                $password = Hash::make('password');        
               
            
                return redirect()->route('user.index')
                                ->with('success','User updated successfully');
            
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
    
        return redirect()->route('user.index')
                        ->with('success','Product deleted successfully');
    }

    public function excel(){
        return Excel::download(new UsersExport, 'users.xlsx');

    }
}
