<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\support\Facades\Hash;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
    
    public function index(Request $request)
    {        
        if ($request->has('trashed')) {
            $data = Category::onlyTrashed()->get();
        }else {
            $data= Category::get();
        }    
    
        return view('category.index',compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all([
            'cname' => 'required|min:3|max:10',
            'active' => 'required',
        ],[
                 'cname.required' => 'name is required',
            ]);
         $input = $request->cname;
         $input = $request->active;
         $input = Hash::make($request->password);
         $input = $request->all();
          Category::create($input);
        return redirect()->route('category.index')
                     ->with('success','category created successfully.');
                     
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit',compact('category'));  

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        {
            echo $category->id;
            $request->validate([

                'cname' => 'required',
                'active' => 'required',  
                
            ]);    
            
            $request_data = $request->all();        
            $category->update($request_data);
        
            return redirect()->route('category.index')
                            ->with('success','category updated successfully');
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
    public function destroy($id)
    {
        Category::find($id)->delete();
    
        return redirect()->route('category.index')
                        ->with('success','Post deleted successfully');
    }

                /**
     * restore specific post
     *
     * @return void
     */
    public function restore($id)
    {
        Category::withTrashed()->find($id)->restore();
  
        return redirect()->back();
    }

        /**
     * restore all post
     *
     * @return response()
     */
    public function restoreAll()
    {
        Category::onlyTrashed()->restore();
  
        return redirect()->back();
    }

}
