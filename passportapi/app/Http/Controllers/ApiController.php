<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use phpseclib3\Crypt\RC2;
use Illuminate\Support\Facades\Password;


class ApiController extends Controller
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:10',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|string|min:4|max:8|confirmed',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $user =  User::create($data);

        $token = [];
        $token['token'] = $user->createToken('Laravel CreateToken')->accessToken;
        $token['name'] = $user->name;


        return response()->json($token, 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $user = User::where(['email' => request('email')])->first();
        
        if ($user) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $token = [];
                $token['token'] = $user->createToken('Laravel CreateToken')->accessToken;
                return response()->json(['success' => 'Successfully login', 'token' => $token]);
            }
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function product(Request $request)
    {
        $data = DB::table('products')->get();

        return (response()->json($data));
    }

    public function category(Request $request)
    {
        $data = DB::table('categories')->get();

        return (response()->json($data));
    }

    // public function forgot(Request $request){
    //     $input = $request->only('email');
    //     $validator = Validator::make($input, [
    //         'email' => "required|email"
    //     ]);
    //     if ($validator->fails()) {
    //         return response()->json($validator->errors());
    //     }
    //     $response = Password::sendResetLink($input);
        
    //     $message = $response()->json([
    //         'message' => 'send the link',
    //     ]);
        
    //     return response()->json($message);
    // }
}

