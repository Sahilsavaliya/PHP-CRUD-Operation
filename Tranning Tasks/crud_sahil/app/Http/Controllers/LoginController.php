<?php

namespace App\Http\Controllers;
use Illuminate\support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Redirect;
use App\Models\User;
use App\Models\Product;
use Illuminate\Auth\Events\Login as EventsLogin;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {        
        $data = User::where('usertype','0')->latest()->paginate(5);        
    
        if ($request->has('trashed')) {
            $data = User::onlyTrashed()->paginate(5);
        }else {
            $data= User::latest()->paginate(5);
        }    
    
        return view('crud.index',compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    
    {
        
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email'=>'required',
            'password' => 'required'
        ]);


        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->hobbies = $request->hobbies;
        $user->password = Hash::make($request->password);
        $user->save();
        $password = Hash::make('password');
        // User::create($user);
        return redirect()->route('crud.index')
                         ->with('success','Admin Added successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $crud)
    {
        return view('crud.edit',compact('crud'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $crud)
    {
        {
            echo $crud->id;
            $request->validate([
                'name' => 'required|min:3',
                'email' => 'required|unique:users,email,'.$crud->id.',id',  
                
            ],[
                    'name.required' => 'Title is required',
                    'email.required' => 'Email is required',
                    'email.unique' => 'Email is already exists!!'
                ]);
    
            $request_data = $request->all();
            $password = Hash::make('password');        
            $crud->update($request_data);
        
            return redirect()->route('crud.index')
                            ->with('success','Post updated successfully');
        }
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        User::find($id)->delete();
    
        return redirect()->route('crud.index')
                        ->with('success','Post deleted successfully');
    }

            /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forcedlt($id)
    {
       User::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()
                        ->with('success','permanent deleted successfully');
    }


                /**
     * restore specific post
     *
     * @return void
     */
    public function restore($id)
    {
        User::withTrashed()->find($id)->restore();
  
        return redirect()->back()->with('success','Restore Successfully');;
    }

        /**
     * restore all post
     *
     * @return response()
     */
    public function restoreAll()
    {
        User::onlyTrashed()->restore();
  
        return redirect()->back()->with('success','Restore All Deleted data');;
    }



}