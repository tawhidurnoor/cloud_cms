<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('backend.profile.index');
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($user->save()) {
            session()->flash('success', 'Information updated succesfully!');
        } else {
            session()->flash('warning', 'Error updating information!');
        }

        return redirect()->back();
    }

    public function passwordUpdate(Request $request)
    {
        if (Hash::check($request->old_password, Auth::user()->password)) {
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($request->new_password);

            if ($user->save()) {
                session()->flash('success', 'Password updated succesfully!');
            } else {
                session()->flash('warning', 'Error updating password!');
            }
        } else {
            session()->flash('warning', 'Password did not matched with current password!');
        }

        return redirect()->back();
    }
}
