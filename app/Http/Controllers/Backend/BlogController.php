<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('backend.blog.index', [
            'blogs' => $blogs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.blog.create');
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
        $blog->title = $request->title;

        if ($request->hasFile('banner')) {

            $file = $request->file('banner');
            $extention = $file->getClientOriginalExtension();

            //naming file
            $filename = time() . '.' . $extention;
            $file->move('uploads/images/', $filename);

            $blog->banner = $filename;
        }

        $blog->meta_title = $request->meta_title;
        $blog->meta_description = $request->meta_description;
        $blog->keywords = $request->keywords;
        // $blog->slug = Str::slug($request->title, '-');
        $blog->slug = $request->slug;
        $blog->summary = $request->summary;
        $blog->content = $request->content;
        $blog->is_published = 1;

        if ($blog->save()) {
            session()->flash('success', 'Blog created succesfully!');
        } else {
            session()->flash('warning', 'Error creating blog!');
        }

        return redirect()->route('admin.blog.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('backend.blog.edit', [
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->title = $request->title;

        if ($request->hasFile('banner')) {

            $file = $request->file('banner');
            $extention = $file->getClientOriginalExtension();

            //naming file
            $filename = time() . '.' . $extention;
            $file->move('uploads/images/', $filename);

            unlink('uploads/images/' . $blog->banner);

            $blog->banner = $filename;
        }

        $blog->meta_title = $request->meta_title;
        $blog->slug = $request->slug;
        $blog->meta_description = $request->meta_description;
        $blog->keywords = $request->keywords;
        $blog->summary = $request->summary;
        $blog->content = $request->content;
        $blog->is_published = 1;

        if ($blog->save()) {
            session()->flash('success', 'Blog updated succesfully!');
        } else {
            session()->flash('warning', 'Error updating blog!');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        File::delete(public_path('uploads/images/' . $blog->banner));

        if ($blog->delete()) {
            session()->flash('success', 'Blog deleted succesfully!');
        } else {
            session()->flash('warning', 'Error deleting blog!');
        }

        return redirect()->back();
    }

    public function changeStatus(Blog $blog)
    {
        $blog->is_published = !$blog->is_published;

        if ($blog->save()) {
            if ($blog->is_published == 1) {
                return '0';
                // return json_encode('Blog published successfully');
            } else {
                return json_encode('Blog is now unpublished successfully');
            }
        } else {
            return false;
        }
    }
}
