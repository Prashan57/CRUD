<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\backend\BackendController;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Setting = Setting::all();
        $SettingCount = Setting::count();
        return view("backend.blog.Setting.index",compact("Setting","SettingCount"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.blog.Setting.create");
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
                'sidebar' => 'required',
                'copyright' => 'required',
                'link' => 'required',
                'linkname' => 'required',
                //'file' => 'required|image|mimes:jpg,jpeg,png,gif'
            ]);

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('public');
            }
            else {
                $path = '';
            }
            Setting::create([
                'sidebar' => request()->get('sidebar'),
                'copyright' => request()->get('copyright'),
                'link' => request()->get('link'),
                'linkname' => request()->get('linkname'),
                'file' => $path,
            ]);

        } catch (Throwable $e) {
            dd($e);
        }
        return redirect()->to("/backend/Setting");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Setting = Setting::findOrFail($id);
        return view('backend.blog.Setting.destroy', compact("Setting"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit($id,Setting $setting)
    {
        $Setting =Setting::find($id);
        if (!$Setting){
            abort(404);
        }
        return view('backend.blog.Setting.edit',compact('Setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting,$id)
    {
        $Setting = Setting::find($id);
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public');
        }
        else {
            $path = $Setting->file;
        }
        $this->validate($request,[
            'sidebar' => 'required',
            'copyright' => 'required',
            'link' => 'required',
            'linkname' => 'required',
        ]);
        $Setting -> sidebar = $request->sidebar;
        $Setting -> copyright = $request->copyright;
        $Setting -> link = $request->link;
        $Setting -> linkname = $request->linkname;
        $Setting -> file = $path;

        $Setting->save();
        return redirect("/backend/Setting");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Setting = Setting::find($id);
        $Setting->delete();

        return redirect('/backend/Setting');
    }
}
