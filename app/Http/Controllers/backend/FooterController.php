<?php

namespace App\Http\Controllers\backend;

use App\Footer;
use Illuminate\Http\Request;
use Throwable;

class FooterController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer = Footer::latest()->paginate(7);
        $footerCount = Footer::count();
        return view("backend.blog.footer.index",compact("footer","footerCount"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = Footer::all();
        return view("backend.blog.footer.create",compact("footer"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
            try {
                $this->validate(request(), [
                    'caption' => 'required',
                    'location' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    'fb' => 'required',
                ]);

                Footer::create([
                    'caption' => request()->get('caption'),
                    'location' => request()->get('location'),
                    'email' => request()->get('email'),
                    'phone' => request()->get('phone'),
                    'fb' => request()->get('fb'),
                ]);

            } catch (Throwable $e) {
                dd($e);
            }
            return redirect()->to("/backend/footer");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $footer = Footer::findOrFail($id);
        return view("backend.blog.footer.destroy",compact("footer"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $footer =Footer::find($id);
        if (!$footer){
            abort(404);
        }
        return view("backend.blog.footer.edit",compact("footer"));
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
        {
            $footer = Footer::find($id);

            $this->validate($request,[
                'caption' => 'required',
                'location' => 'required',
                'email' => 'required',
                'fb' => 'required',
                'phone' => 'required',
            ]);
            $footer -> caption = $request->caption;
            $footer -> location = $request->location;
            $footer -> email = $request->email;
            $footer -> fb = $request->fb;
            $footer -> phone = $request->phone;

            $footer->save();
            return redirect("/backend/footer");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $footer = Footer::find($id);
        $footer->delete();

        return redirect('/backend/footer');
    }
}
