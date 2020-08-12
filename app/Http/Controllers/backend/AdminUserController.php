<?php

namespace App\Http\Controllers\backend;

use App\User;
use App\AdminUser;
use Illuminate\Http\Request;

class AdminUserController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = AdminUser::all();
        $userCount = AdminUser::count();
        return view("backend.blog.AdminUser.index",compact("user","userCount"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.blog.AdminUser.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $this->validate(request(), [
                'name' => 'required',
                //  'file' => 'required|image|mimes:jpg,jpeg,png,gif'
            ]);

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('public');
            }
            else {
                $path = '';
            }
            AdminUser::create([
                'name' => request()->get('name'),
                'file' => $path,
            ]);

        } catch (Throwable $e) {
            dd($e);
        }
        return redirect()->to("/backend/AdminUser");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminUser  $adminUser
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = AdminUser::findOrFail($id);

        return view('backend.blog.AdminUser.destroy', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminUser  $adminUser
     * @return \Illuminate\Http\Response
     */
    public function edit($id,AdminUser $adminUser)
    {

        $user =AdminUser::find($id);
        if (!$user){
            abort(404);
        }
        return view('backend.blog.AdminUser.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminUser  $adminUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminUser $adminUser,$id)
    {

        $user = AdminUser::find($id);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public');
        }
        else {
            $path = $user->file;
        }
        $this->validate($request,[
            'name' => 'required',
        ]);
        $user -> name = $request->name;
        $user -> file = $path;

        $user->save();
        return redirect("/backend/AdminUser");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminUser  $adminUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,AdminUser $adminUser)
    {
        $user = AdminUser::find($id);
        $user->delete();

        return redirect('/backend/AdminUser');
    }
}
