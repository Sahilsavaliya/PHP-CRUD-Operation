<?php

namespace App\Http\Controllers;

use App\Models\Authuser;
use App\Models\Category;
use App\Models\Product;
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
use PHPUnit\Util\Xml\SuccessfulSchemaDetectionResult;

use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;

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
        $token['name'] = $user->name;
        $token['token'] = $user->createToken('Laravel CreateToken')->accessToken;
        


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


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $token = [];
            $token['name'] = $user->name;
            $token['token'] = $user->createToken('Laravel CreateToken')->accessToken;
            return response()->json(['success' => 'Successfully login', 'token' => $token]);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message'   =>  'Successfully logged out.'
        ]);
    }





    //----------------------------------------------Category--------------------------------
    public function category(Request $request)
    {
        $data = DB::table('categories')->get();

        return (response()->json($data));
    }

    public function create_category(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'cname' => 'required|min:4|max:15|String',
            'active' => 'required|in:yes,no',
        ],
        [
            'cname.required' => 'The category name field is required.',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $data = $request->all();
        $user =  Category::create($data);
        return Response()->json(['message' => 'Successfully created category']);
    }

    public function update_category(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'cname' => 'required',
                'active' => 'required',
            ],
            [
                'cname.required' => 'The category name field is required.',
            ]
        );
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $user = Category::find($id);
        $user->cname = $request->input('cname');
        $user->active = $request->input('active');
        $user->save();
        return response()->json(['message' => 'Successfully updated record']);
    }

    public function delete_category($id)
    {
        $user = Category::find($id);
        $test = $user->delete($id);
        if ($test) {
            return ['result' => 'successfully deleted record'];
        } else {
            return ['result' => 'failed to delete record'];
        }
    }

    //----------------------------------product-------------------------------------------


    public function product(Request $request)
    {
        $data = DB::table('products')->get();

        return (response()->json($data));
    }


    public function create_product(Request $request)
    {
        // print_r($request->file('image'));die();
        $validator = Validator::make($request->all(), [
            'image' => ' image |mimes : JPEG,png,jpg',
            'pname' => 'required|min:4|max:20',
            'category_id' => 'required',
            'active_status' => 'required|in:yes,no',

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        // $file = $request->file('image');
        $imageName = time() . '.' . $request->image->extension();
        //  print_r($request->image->getClientOriginalExtension());die();
        // $url = Storage::putFileAs('images', $file, $imageName . '.' . $file->extension());

        $imageName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('\images'), $imageName);

        $product = new Product;
        $product->pname = $request->input('pname');
        $product->active_status = $request->input('active_status');
        $product->image = $request->input('image');
        $product->created_by_email = auth()->guard('api')->user()->id;
        $product['image'] = $imageName;

        $p1 = $request->input('category_id');
        $category = Category::where('cname', '=', $p1)->get('cname');
        if (!$category->isEmpty()) {
            $product->category_id = $request->input('category_id');
            $product->save();
            return Response()->json(['message' => 'Successfully created product'], 200);
        } else {
            return Response()->json(['message' => 'Dose not match category'], 400);
        }
    }


    public function update_product(Request $request, Product $product, $id)
    {
        $validator = Validator::make($request->all(), [
            'image' => ' image |mimes : JPEG,png,jpg',
            'pname' => 'required',
            'category_id' => 'required',
            'active_status' => 'required',

        ]);
        
        {

            $product = Product::find($id);

            if (!empty($request->image)) {

                unlink(public_path('images/' . $product->image));

                $imageName = time() . '.' . $request->image->getClientOriginalExtension();

                $request->image->move(public_path('\images'), $imageName);

                $product->pname = $request->pname;

                $product->category_id = $request->category_id;

                $product->active_status = $request->active_status;

                if ($product->created_by_email == null) {
                    $product->created_by_email =  auth()->guard('api')->user()->id;
                }

                $product['image'] = $imageName;

                $product->update();
            } else {

                $product->pname = $request->pname;

                $product->category_id = $request->category_id;

                $product->active_status = $request->active_status;

                if ($product->created_by_email == null) {
                    $product->created_by_email = auth()->guard('api')->user()->id;
                }
                $product->update();
            }
            return response()->json(['message' =>   'Successfully updated product']);
        }
    }





    public function delete_product($id)
    {
        $user = Product::find($id);
        unlink(public_path('images/' . $user->image));
        
        $product = $user->delete($id);
        if ($product) {
            return ['result' => 'successfully deleted record'];
        } else {
            return ['result' => 'failed to delete record'];
        }
    }


    public function created_by_email(Request $request)
    {


        $data = $request->all();
        $user =  Product::create($data);
        return Response()->json(['message' => 'Successfully created Authuser'], 200);
    }
}
