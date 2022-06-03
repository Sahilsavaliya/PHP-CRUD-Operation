<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
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

        
        $data = Post::latest()->paginate(10);
        
    
        return view('posts.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'fname' => 'require',
            'lname' => 'require',
            'email' => 'require',
            'designation' => 'require',
            'description' => 'require',
        ],[
            'fname.required' => 'firstname is required',
            'lname.required' => 'lastname is required',
            'email.required' => 'firstname is required',
            'designation.required' => 'lastname is required',
            'description.required' => 'lastname is required'
        ]);
   
        // $request->validate([
        //     'fname' => 'required|min:3|max:10',
        //     'lname' => 'required|min:3|max:10',
        //     'email' => 'required|email|unique:posts',
        //     'description' => 'required|max:50',
        //     'designation' => 'required',
        // ],[
        //          'fname.required' => 'firstname is required',
        //         'fname.min' => 'Minimum 4 charachers require!!',
        //         'fname.max' => 'MAximum 10 charachers require!!',

        //         'lname.required' => 'lastname is required',
        //         'lname.min' => 'Minimum 4 charachers require!!',
        //         'lname.max' => 'MAximum 10 charachers require!!',
        //         'email.required' => 'Email is required',
        //         'email.unique' => 'Email is already exists!!'
        //     ]);
    
        Post::create($request->all());
     
        return redirect()->route('posts.index')
                        ->with('success','Post created successfully.');

    }
    //Controller will be like this.



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        return view('posts.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        echo $post->id;
        $request->validate([
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'email' => 'required|unique:posts,email,'.$post->id.',id',  
            'description' => 'required|max:50',
            'designation' => 'required',
        ],[
                'fname.required' => 'Title is required',
                'email.required' => 'Email is required',
                'email.unique' => 'Email is already exists!!'
            ]);

        
        $request_data = $request->all();
        // $request_data['gender'] = 'active'; 
    
        $post->update($request_data);
    
        return redirect()->route('posts.index')
                        ->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
    
        return redirect()->route('posts.index')
                        ->with('success','Post deleted successfully');
    }

    public function logout(Request $request)
    {
       
        auth()->logout();
        return redirect()->route('login');
    }

    
}
