<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
  public function index()
  {
    return view('admin.profile.index');
  }

  public function updateProfile(Request $request)
  {
    // Retrieve the existing user from the database
    $user = Auth::user();

    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
      'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
      'phone' => ['nullable', 'max:100'],
      'image' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
    ]);

    if ($request->hasFile('image')) {
      if (File::exists(public_path($user->image))) {
        File::delete(public_path($user->image));
      }

      $image = $request->image;
      $imageName = rand() . '_' . $image->getClientOriginalName();
      $image->move(public_path('uploads/admins/'), $imageName);

      $path = "/uploads/admins/" . $imageName;

      $user->image = $path;
    }

    $user->name = $request->name;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->phone = empty($request->phone) ? $user->phone : $request->phone;

    $user->save();

    return redirect()->back();
  }
}
