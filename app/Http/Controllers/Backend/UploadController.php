<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Upload;
use Illuminate\Http\Request;
use Image;

class UploadController extends Controller
{
    public function index()
    {
        $uploads = Upload::orderBy('id', 'desc')->get();
        return view('backend.file_manager.index', [
            'uploads' => $uploads,
        ]);
    }

    public function uploadIndex()
    {
        return view('backend.file_manager.upload');
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $file_original_name = $file->getClientOriginalName();
            $file_extension = $file->getClientOriginalExtension();
            $file_size = $file->getSize();

            //naming file
            $filename = time() . '.' . $file_extension;
            $file->move('uploads/images/', $filename);

            $upload = new Upload();
            $upload->file_original_name = $file_original_name;
            $upload->file_name = $filename;
            $upload->file_extension = $file_extension;
            $upload->file_size = $file_size;

            //thumbnailing

            $upload->save();

            return response()->json([
                'fileName' => $filename,
                'uploaded' => 1,
                'url' => 'uploads/images/' . $filename
            ]);
        }
    }

    public function destroy(Upload $upload)
    {
        if ($upload->delete()) {
            session()->flash('success', 'File deleted succesfully!');
        } else {
            session()->flash('warning', 'Error deleting file!');
        }

        return redirect()->back();
    }
}
