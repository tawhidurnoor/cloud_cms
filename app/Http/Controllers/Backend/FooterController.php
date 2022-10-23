<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Footer;
use Illuminate\Http\Request;
use Dotlogics\Grapesjs\App\Traits\EditorTrait;

class FooterController extends Controller
{
    use EditorTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footers = Footer::all();
        return view('backend.footer.index', [
            'footers' => $footers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $footer =  new Footer();
        $footer->title = $request->title;
        if ($request->is_active == "on") {
            Footer::where('is_active', 1)
                ->update(['is_active' => 0]);
            $footer->is_active = 1;
        } else {
            $footer->is_active = 0;
        }

        if ($footer->save()) {
            session()->flash('success', 'Footer created succesfully!');
        } else {
            session()->flash('warning', 'Error creating footer!');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function show(Footer $footer)
    {
        $footer = Footer::where('id', $footer->id)->select('id', 'title', 'is_active')->first();
        return $footer;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function edit(Footer $footer)
    {
        //
    }

    public function editor(Request $request, Footer $footer)
    {
        return $this->show_gjs_editor($request, $footer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Footer $footer)
    {
        $footer->title = $request->title;
        if ($request->is_active == "on") {
            Footer::where('is_active', 1)
                ->update(['is_active' => 0]);
            $footer->is_active = 1;
        } else {
            $footer->is_active = 0;
        }

        if ($footer->save()) {
            session()->flash('success', 'Footer updated succesfully!');
        } else {
            session()->flash('warning', 'Error updaing footer!');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Footer $footer)
    {
        if ($footer->delete()) {
            session()->flash('success', 'Footer deleted succesfully!');
        } else {
            session()->flash('warning', 'Error deleting footer!');
        }

        return redirect()->back();
    }
}
