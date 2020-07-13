<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\backend\admin;
use Illuminate\Http\Request;
use Throwable;

class AdminController extends BackendController
{
    public function index()
    {
        $admin = admin::latest()->paginate(8);
        $adminCount = admin::count();
        return view("backend.blog.admin", compact("admin", "adminCount"))
        ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function show($id) {

        $admins = admin::findOrFail($id);

        return view('backend.blog.show', ['admin' => $admins]);
    }

    public function store(Request $request)
    {
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
>>>>>>> 1fd5cd7d97abe34ff843a1632118589f30ff1d8d

$admins = new admin();

$admins->type = request('type');
$admins->title = request('title');
$admins->body = request('body');
$admins->reply = request('reply');
$admins->image = request($fileName);

$admins->save();

return redirect('/backend/blog/admin');
*/
        try {
            $this->validate(request(), [
                'type' => 'required',
                'title' => 'required',
                'body' => 'required',
                'reply' => 'required',

                //    'file' => 'required|image|mimes:jpg,jpeg,png,gif'
            ]);
            /*
            $fileName = null;
            if (request()->hasFile('file')) {
                $file = request()->file('file');
                $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
                $file->move('/backend/img', $fileName);
            }
            */

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('public');
            } else {
                $path = '';
            }
            admin::create([
                'type' => request()->get('type'),
                'title' => request()->get('title'),
                'body' => request()->get('body'),
                'reply' => request()->get('reply'),
                'file' => $path,
            ]);

        } catch (Throwable $e) {
            dd($e);
        }
        return redirect()->to("/backend/blog/admin");
    }

    public function edit($id,admin $admins)
    {
        $admins =admin::find($id);
        if (!$admins){
            abort(404);
        }
        return view('backend.blog.update',compact('admins'));
    }

    public function update($id,Request $request, admin $admins)
    {
        /*
        $admins = admin::findOrFail($id);
        request()->validate([
            //    'type' => 'required',
            'title' => 'required',
            'reply' => 'required',
            'body' => 'required',
            ///    'file' => 'required',
        ]);

        $admins->update($request->all()->save());

        return redirect("/backend/blog/admin")
            ->with('success','Product updated successfully');
        */
        /*
        if($request->file != ''){
            $path = public_path().'/uploads/images/';

            //code for remove old file
            if($admins->file != ''  && $admins->file != null){
                $file_old = $path.$admins->file;
                unlink($file_old);
            }

            //upload new file
            $file = $request->file;
            $filename = $file->getClientOriginalName();
            $file->move($path, $filename);

            //for update in table
            $admins->update(['file' => $filename]);
        }
*/
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public');
        } else {
            $path = '';
        }
        $this->validate($request,[
            'type' => 'required',
            'title' => 'required',
            'reply' => 'required',
            'body' => 'required',
            'file' => $path
        ]);
        $admins = admin::find($id);
        $admins -> type = $request->type;
        $admins -> title = $request->title;
        $admins -> reply = $request->reply;
        $admins -> body = $request->body;
        $admins -> file = $path;

        $admins->save();
        return redirect("/backend/blog/admin");
    }

    public function destroy($id)
    {
        $admins = admin::find($id);
        $admins->delete();

        return redirect('/backend/blog/admin');
    }

}
