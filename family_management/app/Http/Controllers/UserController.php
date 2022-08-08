<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\support\Facades\Hash;
use App\Models\Daily_Works;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use function PHPSTORM_META\registerArgumentsSet;
use function Ramsey\Uuid\v1;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UserExport;
use App\Models\UserDailyworks;
use App\Http\Requests\StoreUserRequest;
use Dflydev\DotAccessData\Data;

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
    public function index(Request $request, User $user)
    {
        if (Auth::user()->usertype == '0') {
            $works = Daily_Works::all();
            $filter = $request->filter;
           // print_r($filter);die();

            if (empty($filter)) {
                $works = Daily_Works::all();
                $user = User::with('dailyworks')->where('usertype', '1')->sortable()->paginate(5);
            } else {
               // echo 1;die();
                $user = User::with('dailyworks')->whereHas('dailyworks',function($user) use ($filter) { 
                    $user->where('work_id',$filter);
                })->sortable()->paginate(5);
                // print_r($user);die();
                // die($user);
            }
            // echo"<pre>";   print_r($user);die();
            return view('user.index', compact('user', 'works'))
                ->with('i', (request()->input('page', 1) - 1) * 5);

        } if (Auth::user()->usertype == '1') {
            $works = Daily_Works::all();

            if (Auth::user()->aprove == '0' || Auth::user()->aprove == '1') {
                if (empty($filter)) {
                    $works = Daily_Works::all();
                    $user = User::where('id', Auth::user()->id)->sortable()->paginate(5);
                    
                } else {
                    $user = User::with('dailyworks')->whereHas('dailyworks',function($user) use ($filter) { 
                        $user->where('work_id',$filter);
                    })->sortable()->paginate(5);
                }
                
                return view('user.index', compact('user', 'works'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
            } else {
                $works = Daily_Works::all();
                $user = User::where('usertype', '1')->where('status', '0')->where('aprove', '2')->latest()->paginate(5);

                return view('user.index', compact('user', 'works'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        if (Auth::user()->usertype == 0) {
            return view('user.create', compact('user'));
        } else {
            return back();
        }
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
            'name' => 'required|min:3|max:20',
            'email' => 'required|unique:users,email,' . $user->id . ',id',
            'password' => 'required|min:6|max:10',
            'status' => 'required',

        ], [
            'name.required' => 'Title is required',
            'name.min' => 'name is minimum 3 characters',
            'name.max' => 'name is maximum 20 characters',
            'email.required' => 'Email is required',
            'email.unique' => 'Email is already exists!!',
            'status.required' => 'Status is required',
            'password.required' => 'Password is required',
            'password.min' => 'password is minimum 6 characters',
            'password.max' => 'password is maximum 10 characters',

        ]);


        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->status = $request->status;
        $user->usertype = $request->usertype;
        $user->aprove = "0";
        $user->password = Hash::make($request->password);
        $user->save();
        $password = Hash::make('password');
        // User::create($user);
        return redirect()->route('user.index')
            ->with('success', 'Admin Added successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // $users = User::with('dailyworks')->get();
        $works = DB::table('daily_works')->select('id', 'work_name')->get();

        return view('user.edit', compact('user', 'works'));
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
        $request->validate([
            'name' => 'required|min:3|max:20',
            'email' => 'required|email',
            'image' => 'required | image |mimes : JPEG,png,jpg|max:20048',




        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('public/images/users'), $imageName);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $request->image;
        $user->gender = $request->gender;
        $user->aprove = "1";
        $user['image'] = $imageName;
        $input['services'] = $request->input('services');
        $user->age = $request->age;


        // print_r($user);die();
        $user->update();

        // foreach($request->input('services') as $service){
        //     $dailywork = new UserDailyworks();
        //     // print_r($dailywork);die();
        //     $dailywork->work_id = $service;
        //     $dailywork->user_id = Auth::user()->id;
        //     $dailywork->save();
        // }

        $variable = $request->services;
        $user->dailyworks()->sync($variable);
        return redirect()->route('user.index');
        // return view('user.index', compact('user'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function aprove($id)
    {
        $user =  User::find($id);
        $user->aprove = "2";
        $user->update();
        return redirect()->route('admin.index');
    }




    public function get_user_data()
    {
        return Excel::download(new UserExport, 'user.xlsx');
    }

    public function show_aprove(User $user)
    {
        $user = User::where('aprove', '0')->where('usertype', '1')->latest()->paginate(5);
        return view('user.show_aprove', compact('user'))->with('i', (request()->input('page', 1) - 1) * 5);;
    }
}
