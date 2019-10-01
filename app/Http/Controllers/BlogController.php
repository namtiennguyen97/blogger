<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = Blog::all();
        return view('blog.list', compact('blog'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $blog = new Blog();
    $blog->title = $request->input('title');
    $blog->content = $request->input('content');
    $blog->due_date= $request->input('due_date');
        $blog->image = $request->input('image');
    $blog->save();
    Session::flash('success','Compeleted a new Post!');
    return redirect()->route('blogger.index');
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
        $blog = Blog::findOrFail($id);
        return view('blog.edit', compact('blog'));
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
        $blog = Blog::findOrFail($id);
        $blog->title = $request->input('title');
        $blog->content = $request->input('content');
        $blog->due_date = $request->input('due_date');
        $blog->image = $request->input('image');
        $blog->save();
        Session::flash('success','Update is completed!');
        return redirect()->route('blogger.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        Session::flash('success','Deleted!');
        return redirect()->route('blogger.index');
    }
}
