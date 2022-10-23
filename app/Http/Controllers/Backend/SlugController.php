<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\HardwareProduct;
use App\Models\Page;
use App\Models\Service;
use Illuminate\Http\Request;

class SlugController extends Controller
{
    public function checkBlogSlug(Request $request)
    {
        $blog_counter = Blog::where('slug', $request->slug);

        if (isset($request->id)) {
            $blog_counter = $blog_counter->where('id', '!=', $request->id);
        }

        $blog_counter = $blog_counter->count();

        if ($blog_counter == 0) {
            return "OK";
        } else {
            return "NOK";
        }
    }

    public function checkSlug(Request $request)
    {
        $slug_counter = 0;

        //page
        $page_counter = Page::where('slug', $request->slug);

        if (isset($request->page_id)) {
            $page_counter = $page_counter->where('id', '!=', $request->page_id);
        }

        $page_counter = $page_counter->count();
        $slug_counter += $page_counter;


        //service
        $service_counter = Service::where('slug', $request->slug);

        if (isset($request->service_id)) {
            $service_counter = $service_counter->where('id', '!=', $request->service_id);
        }

        $service_counter = $service_counter->count();
        $slug_counter += $service_counter;


        //hardware product
        $product_counter = HardwareProduct::where('slug', $request->slug);

        if (isset($request->product_id)) {
            $product_counter = $product_counter->where('id', '!=', $request->product_id);
        }

        $product_counter = $product_counter->count();
        $slug_counter += $product_counter;


        if ($slug_counter == 0) {
            return "OK";
        } else {
            return "NOK";
        }
    }
}
