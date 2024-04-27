<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $sliders = Slider::where('status', 1)->orderBy('serial', 'asc')->get();
    return View('frontend.home.home', compact('sliders'));
  }
}