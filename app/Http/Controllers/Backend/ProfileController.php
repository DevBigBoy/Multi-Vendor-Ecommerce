<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
    ]);

    $user->name = $request->name;
    $user->username = $request->username;
    $user->email = $request->email;
    $user->phone = empty($request->phone) ? $user->phone : $request->phone;

    $user->save();

    return response()->json(['message' => 'User updated successfully'], 200);
  }
}
