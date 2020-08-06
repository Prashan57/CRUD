<?php

namespace App\Http\Controllers\backend;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = category::latest()->paginate(7);
        $categoryCount = category::count();
        return view("backend.blog.category.index", compact("category", "categoryCount"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.blog.category.create");
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
            ]);

            category::create([
                'name' => request()->get('name'),
            ]);

        } catch (Throwable $e) {
            dd($e);
        }
        return redirect()->to("/backend/category");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = category::findOrFail($id);
        return view("backend.blog.category.show",compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category =category::find($id);
        if (!$category){
            abort(404);
        }
        return view("backend.blog.category.update",compact("category"));
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
        $category = category::find($id);

        $this->validate($request,[
            'name' => 'required',
                    ]);
        $category -> name = $request->name;

        $category->save();
        return redirect("/backend/category");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = category::find($id);
        $category->delete();

        return redirect('/backend/category');

    }
}
