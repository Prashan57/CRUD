<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

class AdminController extends BackendController
{
    public function index(){
        $admin = admin::latest()->paginate(6);
        $adminCount = admin::count();
        return view("backend/blog/admin",compact("admin","adminCount"));
    }

    public function store(){
            /*
        $this->validate(request(), [
            'title' => 'required',
            'file' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $fileName = null;
        if (request()->hasFile('file')) {
            $file = request()->file('file');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('/backend/img', $fileName);
        }

        $admins = new admin();

        $admins->type = request('type');
        $admins->title = request('title');
        $admins->body = request('body');
        $admins->reply = request('reply');
        $admins->image = request($fileName);

        $admins->save();

        return redirect('/backend/blog/admin');
*/

        $this->validate(request(), [
            'type' => 'required',
            'title' => 'required',
            'body' => 'required',
            'reply' => 'required',
            'file' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);

        $fileName = null;
        if (request()->hasFile('file')) {
            $file = request()->file('file');
            $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('/backend/img', $fileName);
        }

        admin::create([
            'type' => request()->get('type'),
            'title' => request()->get('title'),
            'body' => request()->get('body'),
            'reply' => request()->get('reply'),
            'admin_img' => $fileName,
            'admin_status' => "DEACTIVE"
        ]);

        return redirect()->to('/backend/blog');
    }

    public function edit(){
        dd("edit");
    }

    public function destroy(){
        dd("destroy");
    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function imageUploadPost()

    {


    }
}
