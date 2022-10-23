<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Header;
use App\Models\HeaderSubMenu;
use Illuminate\Http\Request;

class HeaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $headers = Header::all();
        $header = Header::findOrFail(1);
        return view('backend.header.index', [
            'header' => $header,
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
        $header = new Header();
        $header->text = $request->text;
        if ($request->link == null) {
            $header->link = "";
        } else {
            $header->link = $request->link;
        }

        $header = Header::findOrFail(1);
        $header->header_content = $request->header_content;

        if ($header->save()) {
            session()->flash('success', 'Header created succesfully!');
        } else {
            session()->flash('warning', 'Error creating header!');
        }

        return redirect()->back();
    }

    public function subMenuStore(Request $request)
    {
        $header_sub_menu = new HeaderSubMenu();

        $header_sub_menu->header_id = $request->header_id;
        $header_sub_menu->text = $request->text;
        if ($request->link == null) {
            $header_sub_menu->link = "";
        } else {
            $header_sub_menu->link = $request->link;
        }

        if ($header_sub_menu->save()) {
            session()->flash('success', 'Header submenu created succesfully!');
        } else {
            session()->flash('warning', 'Error creating header submenu!');
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function show(Header $header)
    {
        return $header;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function edit(Header $header)
    {
        $sub_menus = HeaderSubMenu::where('header_id', $header->id)->get();
        return view('backend.header.header_sub_menu', [
            'headers' => $sub_menus,
            'header' => $header,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Header $header)
    {
        $header->text = $request->text;
        if ($request->link == null) {
            $header->link = "";
        } else {
            $header->link = $request->link;
        }

        $header->header_content = $request->header_content;

        if ($header->save()) {
            session()->flash('success', 'Header updated succesfully!');
        } else {
            session()->flash('warning', 'Error updating header!');
        }

        return redirect()->back();
    }

    public function updateHeaderContent(Request $request)
    {
        $header_content = $request->header_content;
        $header = Header::findOrFail(1);
        $header->header_content = $header_content;

        if ($header->save()) {
            session()->flash('success', 'Header created succesfully!');
        } else {
            session()->flash('warning', 'Error creating header!');
        }

        return redirect()->back();
    }

    public function getdateHeaderContent()
    {
        $header = Header::findOrFail(1);
        return json_encode($header->header_content);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Header  $header
     * @return \Illuminate\Http\Response
     */
    public function destroy(Header $header)
    {
        //
    }
}
