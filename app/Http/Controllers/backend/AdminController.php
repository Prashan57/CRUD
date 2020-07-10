<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Throwable;

class AdminController extends BackendController
{
    public function index()
    {
        $admin = admin::latest()->paginate(6);
        $adminCount = admin::count();
        return view("backend/blog/admin", compact("admin", "adminCount"));
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
                dd("hello");
                $path = $request->file('image')->store('public');
            } else {
                $path = '';
            }
            dd(request()->all());

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

    public function edit()
    {
        dd("edit");
    }


    public
    function destroy()
    {
        dd("destroy");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public
    function imageUploadPost()

    {


    }
}
