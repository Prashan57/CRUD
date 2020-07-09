<?php

namespace App\Http\Controllers\backend;

use App\blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = blog::latest()->paginate(6);
        $blogCount = blog::count();
        return view("backend.blog.index",compact("blog","blogCount"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.blog.create");
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
     //   $users = DB::select('select * from blogs where id = ?',[$id]);
     //   return view('backend/blog/update',['users'=>$users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(/*Request $request,*/$id) {
 //       $name = $request->input('name');
 //       $type = $request->input('type');
 //       $email = $request->input('email');
 //       $base = $request->input('base');
 //       $design = $request->input('design');
 //       $body = $request->input('body');
//$data=array('first_name'=>$first_name,"last_name"=>$last_name,"city_name"=>$city_name,"email"=>$email);
//DB::table('student')->update($data);
// DB::table('student')->whereIn('id', $id)->update($request->all());
 //       DB::update('update blogs set name = ?,type=?,email=?,base=?,design=?,body=? where id = ?',[$name,$type,$email,$base,$design,$body,$id]);
  ///      echo "Record updated successfully.
//";
  //      echo 'Click Here to go back.';
        User::where('user_id', 1)->update( array('username'=>'admin', 'status'=>'active') );
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
        $blogs = blog::findOrFail($id);
        $blogs->delete();
        return redirect('/backend/blog');

    }
}
