<?php

namespace App\Http\Controllers;
use App\Http\model;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use PhpParser\Node\Stmt\Catch_;
use Prophecy\Call\Call;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        
        $data = Product::latest()->paginate(5);
        $newedata['newdata'] = "";       
    
        return view('wlecome',compact('data','newdata'))
            ->with('i', (request()->input('page', 1) - 1) * 2);
            

    }

    public function index(Request $request)
    {
        if ($request->has('trashed')) {
            $data = Product::onlyTrashed()->paginate(5);
        $a = Category::where('active', 'yes')->get();
        }else {
            $data= Product::latest()->paginate(5);
        }    
    
        return view('product.index',compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $a = Category::get();
        return view('product.create',compact('a'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , Product $product)
    {

        $request->validate([
            'image'=>'required | image |mimes : JPEG,png,jpg|max:20048',
            'pname' => 'required',
            'category_id' => 'required',
            'active_status' => 'required',

        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('public/images'), $imageName);
        $product=$request->all();
        $product['image'] = $imageName;
        Product::create($product);
        return redirect()->route('product.index')
                        ->with('success','product Added successfully.');
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $a = Category::get('cname');
        return view('product.edit',compact('product','a'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \app\models\Product $product
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {  
        $request->validate([
            'image'=>' image |mimes : JPEG,png,jpg|max:20048',
            'pname' => 'required',
            'category_id' => 'required',
            'active_status' => 'required',

        ]);      
        
        if(!empty($request->image)) {

             unlink(public_path('public/images/'.$product->image));
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('public/images/'), $imageName);
            $product->pname = $request->pname;
            $product->category_id = $request->category_id;
            $product->active_status = $request->active_status;
            $product['image'] = $imageName;
            $product->update();
            return redirect('product')
                        ->with('success','Product updated.');

        }else{
            $product->pname = $request->pname;
            $product->category_id = $request->category_id;
            $product->active_status = $request->active_status;
            $product->update();
            return redirect('product')
                        ->with('success','Post created successfully.');

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
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
    
        return redirect()->route('product.index')
                        ->with('success','Product deleted successfully');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forcedlt($id)
    {
    //    Product::withTrashed()->find($id)->delete();
       Product::onlyTrashed()->find($id)->forceDelete();
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
        Product::withTrashed()->find($id)->restore();
  
        return redirect()->back()->with('success','Restore Successfully');;
    }

        /**
     * restore all post
     *
     * @return response()
     */
    public function restoreAll()
    {
        Product::onlyTrashed()->restore();
  
        return redirect()->back()->with('success','Restore All Deleted data');;
    }

       
}