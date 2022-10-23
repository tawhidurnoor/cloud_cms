<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return view('frontend.blogs.index', [
            'blogs' => $blogs,
        ]);
    }

    public function details($blog_slug)
    {
        $blog = Blog::where('slug', $blog_slug)->firstOrFail();

        return view('frontend.blogs.details', [
            'blog' => $blog,
        ]);
    }
}
