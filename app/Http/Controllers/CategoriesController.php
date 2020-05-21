<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Category::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Category::class);
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(session()->all());
        // $this->authorize('create', Category::class);

        $this->validate($request, [
            'cat_name' => 'required',
            'cat_desc' => 'required',
            'cat_fee' => 'required',
            'cat_distance' => 'required',
            'cat_starttime' => 'required',
            'cat_limit' => 'required',
            'cat_prize' => 'required',
            'cat_gender' => 'required'
        ]);


        // Create Category
        $category = new Category;
        $category->cat_name = $request->input('cat_name');
        $category->cat_desc = $request->input('cat_desc');
        $category->cat_fee = $request->input('cat_fee');
        $category->cat_distance = $request->input('cat_distance');
        $category->cat_starttime = $request->input('cat_starttime');
        $category->cat_limit = $request->input('cat_limit');
        $category->cat_prize = $request->input('cat_prize');
        $category->cat_gender = $request->input('cat_gender');
        $category->post_id = $request->post_id;
        $category->save();

        return redirect('/posts')->with('success', 'Event Published !');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Category::class);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Category::class);
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
        $this->authorize('update', Category::class);

        $this->validate($request, [
            'cat_name' => 'required',
            'cat_desc' => 'required',
            'cat_fee' => 'required',
            'cat_distance' => 'required',
            'cat_starttime' => 'required',
            'cat_limit' => 'required',
            'cat_prize' => 'required',
            'cat_gender' => 'required'
        ]);


        // Create Category
        $post = new Category;
        $post->cat_name = $request->input('cat_name');
        $post->cat_desc = $request->input('cat_desc');
        $post->cat_fee = $request->input('cat_fee');
        $post->cat_distance = $request->input('cat_distance');
        $post->cat_starttimee = $request->input('cat_starttime');
        $post->cat_limit = $request->input('cat_limit');
        $post->cat_prize = $request->input('cat_prize');
        $post->cat_gender = $request->input('cat_gender');

        return redirect('/posts')->with('success', 'Categories Updated!');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', Category::class);
    }
}
