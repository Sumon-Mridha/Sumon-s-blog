<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Auth;

class BlogController extends Controller
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

    public function index()
    {
        $blogs = Auth::user()->blogs;
        $role = Auth::user()->roles->role_name;
        if ($role == 'admin') {
            $blogs = Blog::orderBy('created_at', 'desc')->get();
        }
        return view('blogs',['blogs'=>$blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Cblogs');
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
            'title' => 'required|max:255',
            'subject' => 'required|max:255',
            'body' => 'required',
        ]);

         $role = Blog::create([
            'title'=>$request->title,
            'subject'=>$request->subject,
            'body'=>$request->body,
            'user_id'=>Auth::user()->id,
            
        ]);
        
        return redirect('blogs/')->with('success','Blog posted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
        return view('blog',['blog'=>$blog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(blog $blog)
    {
        // dd($blog->user_id);
        if (Auth::user()->id == $blog->user_id) {
            return view('Ublogs')->with('blog',$blog);
        }
        else{
            return redirect('blogs/')->with('danger','Unauthorized Access..!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blog $blog)
    {
        $request->validate([
            'title' => 'required|max:255',
            'subject' => 'required|max:255',
            'body' => 'required',
        ]);        
         // dd($blog);
  
        $blog->update($request->all());
  
        return redirect('blogs/')->with('success','Blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog $blog)
    {
        $blog->delete();
       return redirect('blogs/')->with('success','Blog deleted successfully');
    }
}
