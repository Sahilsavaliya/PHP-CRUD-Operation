<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {        
        $data = Product::latest()->paginate(5);        
        $a = Category::get('cname');
        return view('welcome',compact('data','a'))
            ->with('i', (request()->input('page', 1) - 1) * 2);

    }
    public function filterProduct(Request $request)
    {
        $query = Product::query();
        $categories = Category::all();
        if ($request->ajax()) {
            if (empty($request->category)) {
                $products = $query->get();
            }
            else{
            $products = $query->where(['category_id' => $request->category])->get();
            }
            return response()->json($products);
        }
    }
   
}
