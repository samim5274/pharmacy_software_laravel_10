<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Auth;
use App\Models\Admin;
use Session;

class UserController extends Controller
{
    public function profile(){
        return view('user.user-profile');
    }

    public function editView($id){
        $user = Admin::where('id', $id)->first();
        return view('user.edit-user', compact('user'));
    }

    public function updateProfile(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email,' . $id,
            'phone' => 'required|string|min:10|max:15',
            'dob' => 'nullable|date|before:today',
            'address' => 'nullable|string|max:500',
            // 'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Admin::where('id', $id)->first();

        $name = $request->input('name', '');
        $email = $request->input('email', '');
        $phone = $request->input('phone', '');
        $dob = $request->input('dob', '');
        $address = $request->input('address', '');

        $user->name = $name;
        $user->email = $email;
        $user->phone = $phone;
        $user->address = $address;
        $user->dob = $dob;

        if($request->file('profile_photo')){

            if($user->photo){
                $path = public_path('img/employee/' . $user->photo);
                logger("Trying to delete: " . $path);
                if (file_exists($path)) {
                    unlink($path);
                } else {
                    logger("File not found: " . $path);
                }
            }

            $file = $request->file('profile_photo');

            if ($file->isValid()) {
                $ext = $file->getClientOriginalExtension();
                $fileName = 'user-' . time() . '.' . $ext;

                $location = public_path('img/employee/');

                if (!file_exists($location)) {
                    mkdir($location, 0755, true);
                }

                $file->move($location, $fileName);
                $user->photo = $fileName;
            }
        }
        $user->save();
        return redirect()->route('profile.view')->with('success','Phone information updated successfully.');
    }

    public function passView(){
        return view('user.change-password');
    }

    public function changePass(Request $request, $id){
        
        $oldPass = $request->input('txtPass1','');
        $newPass = $request->input('txtPass2','');
        $reTypePass = $request->input('txtPass3','');

        if($newPass === $reTypePass) {
            $user = Admin::find($id);

            if (!$user) {
                return redirect()->back()->with('error', 'User not found.');
            }

            if (!Hash::check($oldPass, $user->password)) {
                return back()->with('error', 'Current password is incorrect.');
            } 
            
            $user->password = Hash::make($newPass);
            $user->update();
            return redirect()->route('profile.view')->with('success', 'Password changed successfully.');

        } else {
            return redirect()->back()->with('warning', 'Password not match successfully.');
        }
    }
}
