<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Blog;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        // dd($user);
        return view('users',['users'=>$user]);
       // return 'someting';
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
    public function edit($id)
    {
        $user = User::where('id',$id)->get();
        return view('user',['user'=>$user[0]]);
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
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'sex' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'age' => ['required', 'int'],
            'address' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'role_name' => ['required', 'string'],
        ]); 
             
        $user = User::find($id);
        $user->name = $request->name;
        $user->sex = $request->sex;
        $user->age = $request->age;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->save();


        $role = Role::find($user->roles->id);
        $role->role_name = $request->role_name;
        $role->save();

        return redirect('admin/')->with('success','User Info updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $role = Role::find($user->roles->id);
        $blogs = Blog::where('user_id',$id)->get();
        if(sizeof($blogs) > 0)
            foreach ($blogs as $blog) {
               $user_blog = Blog::find($blog->id);
               $user_blog->delete();
            }
        $role->delete();
        $user->delete();
       return redirect('admin/')->with('success', 'Successfuly Deleted User');
    }
}
