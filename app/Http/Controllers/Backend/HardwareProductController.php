<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HardwareProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HardwareProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hardware_products = HardwareProduct::all();
        return view('backend.hardware_products.index', [
            'hardware_products' => $hardware_products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.hardware_products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hardwareProduct = new HardwareProduct();
        $hardwareProduct->title = $request->title;
        $hardwareProduct->price = $request->price;
        $hardwareProduct->content = $request->content;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file_extension = $file->getClientOriginalExtension();

            //naming file
            $filename = time() . '.' . $file_extension;
            $file->move('uploads/images/', $filename);


            $hardwareProduct->image = $filename;
        }

        $hardwareProduct->slug = $request->slug;

        if ($hardwareProduct->save()) {
            session()->flash('success', 'Product added succesfully!');
        } else {
            session()->flash('warning', 'Error adding page!');
        }

        return redirect()->route('admin.hardware.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HardwareProduct  $hardwareProduct
     * @return \Illuminate\Http\Response
     */
    public function show(HardwareProduct $hardwareProduct)
    {
        return $hardwareProduct;
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HardwareProduct  $hardwareProduct
     * @return \Illuminate\Http\Response
     */
    public function edit($hardwareProduct)
    {
        $hardwareProduct = HardwareProduct::findOrFail($hardwareProduct);
        return view('backend.hardware_products.edit', [
            'hardwareProduct' => $hardwareProduct,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HardwareProduct  $hardwareProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HardwareProduct $hardwareProduct)
    {
        $hardwareProduct = HardwareProduct::findOrFail($request->id);
        $hardwareProduct->title = $request->title;
        $hardwareProduct->price = $request->price;
        $hardwareProduct->content = $request->content;

        if ($request->hasFile('image')) {

            if (File::exists(public_path('uploads/images/' . $hardwareProduct->image))) {
                // dd('File does exists.');
                File::delete(public_path('uploads/images/' . $hardwareProduct->image));
            } else {
                // dd('File does not exists.');
            }

            $file = $request->file('image');
            $file_extension = $file->getClientOriginalExtension();

            //naming file
            $filename = time() . '.' . $file_extension;
            $file->move('uploads/images/', $filename);


            $hardwareProduct->image = $filename;
        }

        $hardwareProduct->slug = $request->slug;

        if ($hardwareProduct->save()) {
            session()->flash('success', 'Product updated succesfully!');
        } else {
            session()->flash('warning', 'Error updating page!');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HardwareProduct  $hardwareProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(HardwareProduct $hardwareProduct)
    {
        //
    }
}
