<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ModuleController extends Controller
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
        if(Auth::user()->roles_id == 1){
        $modules = Module::latest()->paginate(5);
            
    
        return view('module.index',compact('modules'))
            ->with('i', (request()->input('page', 1) - 1) * 2);
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
        return view('module.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Module $module)
    {
        $request->validate([
            'modules_name' => 'required|min:3',            
        ],[
                'modules_name.required' => 'module name is required',                
            ]);
        $module = new Module;
        $module->modules_name = $request->modules_name;
        $module->save();

        return redirect()->route('module.index')
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
    public function edit(Module $module)
    {
        return view('module.edit',compact('module'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $request->validate([
            'modules_name' => 'required|min:3',            
        ],[
                'modules_name.required' => 'module name is required',                
            ]);

            $module->modules_name = $request->modules_name;
           
            $module->update();
       
    
        return redirect()->route('module.index')
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
        Module::find($id)->delete();
    
        return redirect()->route('module.index')
                        ->with('success','Product deleted successfully');
    }
}
