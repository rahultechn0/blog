<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function create()
    {
        $id = Auth::user()->id;

        $userData = User::find($id);
        return view('admin.profile', compact('userData'));
    }

    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        $userData->name = $request->name;
        $userData->email = $request->email;
        $userData->username = $request->username;

        if ($request->file('image')) {
            $file = $request->file('image');

            $fileName = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/adminProfile'), $fileName);
            $userData['image'] = $fileName;
        }
        $userData->save();

        $notification = array('message'=>'Admin Profile is updated successfully','alert-type'=>'success');
        return redirect()->route('adminProfile')->with($notification);
    }

    public function edit()
    {
        $id = Auth::user()->id;

        $userData = User::find($id);
        return view('admin.profileEdit', compact('userData'));
    }

    public function update()
    {
        return view('admin.changePassword');
    }

    public function passwordUpdate(Request $request)
    {
        $validate = $request->validate([
            'oldpassword'=>'required',
            'newpassword'=>'required',
            'confirm_password'=>'required|same:newpassword',
        ]);

        $checkPass = Auth::user()->password;
        if (Hash::check($request->oldpassword,$checkPass)) {
            $users = User::find(Auth::user()->id);
            $users->password = bcrypt($request->newpassword);
            $users->save();
            session()->flash('message','Password Updated Successfully');
            return redirect()->back();
        }else{
            session()->flash('message','Old Password was invalid');
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function profile(Request $request)
    {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('admin.body.sidebar',compact('userData'));
    }

    public function contact(Request $request)
    {
        $contacts = Contact::Paginate(5);
        return view('admin.contact.index',compact('contacts'));
    }
}
