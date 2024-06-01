<?php

namespace App\Http\Requests\Vendor;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVendorProductRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
      'name' => ['required', 'string', 'max:255'],
      'category' => ['required'],
      'sub_category' => ['required'],
      'child_category' => ['required'],
      'brand' => ['required'],
      'qty' => ['required'],
      'price' => ['required'],
      'short_description' => ['required', 'max:1500'],
      'long_description' => ['required'],
      'product_type' => ['required'],
      'status' => ['required'],
      'video_link' => ['nullable', 'url'],
      'sku' => ['nullable'],
      'offer_price' => ['nullable'],
      'offer_start_date' => ['nullable', 'date'],
      'offer_end_date' => ['nullable', 'date'],
      'seo_title' => ['nullable', 'string', 'max:200'],
      'seo_decription' => ['nullable', 'string', 'max:250'],
    ];
  }
}