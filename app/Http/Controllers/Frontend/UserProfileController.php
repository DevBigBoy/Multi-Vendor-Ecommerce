<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Password;

class UserProfileController extends Controller
{
  public function index()
  {
    return view('frontend.dashboard.profile');
  }

  public function updateProfile(Request $request)
  {
    $user = Auth::user();

    $request->validate([
      'name' => ['required', 'string', 'max:255'],
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
      $image->move(public_path('uploads/users/'), $imageName);

      $path = "/uploads/users/" . $imageName;

      $user->image = $path;
    }

    $user->name = $request->name;
    $user->email = $request->email;
    $user->phone = empty($request->phone) ? $user->phone : $request->phone;

    $request->user()->save();

    toastr()->success('Profile updated successfully!');
    return back();
  }

  public function updatePassword(Request $request)
  {
    $validated = $request->validate([
      'current_password' => ['required', 'current_password'],
      'password' => ['required', Password::defaults(), 'confirmed'],
    ]);

    $request->user()->update([
      'password' => bcrypt($validated['password']),
    ]);

    toastr()->success('Password updated successfully!');
    return back();
  }
}
