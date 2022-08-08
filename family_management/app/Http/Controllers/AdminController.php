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

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        if(Auth::user()->usertype == "0"){

        // $user = User::where('aprove', '0')->where('usertype', '1')->latest()->paginate(5);
        // $user = UserDailyworks::join('users','users.id','=','user_daily_works.user_id')->join('daily_works','daily_works.id','=','user_daily_works.work_id')->get();
        // DB::enableQueryLog();
        // $user = User::with('dailyworks')->get();
        $user = User::with('dailyworks')->where('aprove','1')->where('status','0')->where('usertype','1')->get();
        // die($user);
        // dd(DB::getQueryLog());
        // echo $user;
        // die();
        return view('admin.index', compact('user'))->with('i', (request()->input('page', 1) - 1) * 5);
        
    }else{
        return view('home');
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
       $user =  UserDailyworks::all();
       $work = UserDailyworks::join('users','users.id','=','user_daily_works.user_id')->join('daily_works','daily_works.id','=','user_daily_works.work_id')->get();
    //    dd ($work);
        echo '<pre>';
        print_r($work);
       die();
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
    public function update(Request $request, $id)
    {
        //
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

    public function active($id) {
        // dd($id);
        $user =  User::find($id);
        $user->status= "0";
        $user->save(); 
        return redirect()->route('user.index');
    }

    

    
}
