<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\SliderDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\CreateSliderRequest;
use App\Http\Requests\Backend\UpdateSliderRequest;
use App\Models\Slider;
use App\Traits\ImageDeleteTrait;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SliderController extends Controller
{
  use ImageUploadTrait, ImageDeleteTrait;

  /**
   * Display a listing of the resource.
   */

  private $imageFolder = 'uploads/sliders/';

  public function index(SliderDataTable $dataTable)
  {
    return $dataTable->render('admin.sliders.index');
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.sliders.create');
  }

  /**
   * Store a newly created resource in storage.
   */

  public function store(CreateSliderRequest $request): RedirectResponse
  {

    $data = $request->except('banner');

    if ($request->hasFile('banner')) {
      $imagePath =  $this->uploadImage($request, 'banner', $this->imageFolder);
      $data['banner'] = $imagePath;
    }

    Slider::create($data);

    toastr()->success('Slider Created Successfully!');
    return redirect()->route('admin.sliders.index');
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
    return view('admin.sliders.edit', ['slider' => $slider]);
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateSliderRequest $request, string $id): RedirectResponse
  {
    $slider = Slider::findOrFail($id);

    $data = $request->except('banner');

    $imagePath =  $this->updateImage($request, 'banner', $this->imageFolder, $slider->banner);
    $data['banner'] = $imagePath ?? $slider->banner;

    $slider->update($data);

    toastr()->success('Updated Successfully!');
    return redirect()->route('admin.sliders.index');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $slider = Slider::findOrFail($id);
    $this->deleteImage($slider->banner);
    $slider->delete();

    return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
  }
}
