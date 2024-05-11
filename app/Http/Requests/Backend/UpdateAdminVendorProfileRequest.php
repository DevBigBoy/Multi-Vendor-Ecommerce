<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdminVendorProfileRequest extends FormRequest
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
      'phone' => ['required', 'string', 'max:50'],
      'email' => ['required', 'email',  Rule::unique('vendors')->ignore($this->vendor_profile)],
      'address' => ['required', 'string'],
      'description' => ['required'],
      'banner' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
      'fb_link' => ['nullable', 'url'],
      'insta_link' => ['nullable', 'url'],
      'tw_link' => ['nullable', 'url'],
      'status' => ['required', 'boolean'],
    ];
  }
}
