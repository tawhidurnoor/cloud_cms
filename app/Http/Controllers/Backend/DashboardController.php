<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DashboardController extends Controller
{
    public function index()
    {
        $pages = Page::all();
        $blogs = Blog::all();
        $files = Upload::all();
        return view('backend.dashboard', [
            'pages' => $pages,
            'blogs' => $blogs,
            'files' => $files,
        ]);
    }

    public function clear()
    {
        Artisan::call('cache:clear');

        session()->flash('success', 'Cache cleared succesfully!');

        return redirect()->back();
    }
}
