<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateSliderRequest;
use App\Models\Slider;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SliderController extends Controller
{
  use ImageUploadTrait;
  /**
   * Display a listing of the resource.
   */
  public function index(SliderDataTable $dataTable)
  {
    return $dataTable->render('admin.slider.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.slider.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(CreateSliderRequest $request): RedirectResponse
  {
    $slider = new Slider();
    /** handle file upload */
    $imagePath =  $this->uploadImage($request, 'banner', 'uploads/sliders/');

    $slider->banner = $imagePath;
    $slider->type = $request->type;
    $slider->title = $request->title;
    $slider->starting_price = $request->starting_price;
    $slider->btn_url = $request->btn_url;
    $slider->serial = $request->serial;
    $slider->status = $request->status;

    $slider->save();

    toastr()->success('Created Successfully!');
    return back();
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(string $id)
  {
    $slider = Slider::findOrFail($id);
    return view('admin.slider.edite')->with('slider');
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    //
  }
}
