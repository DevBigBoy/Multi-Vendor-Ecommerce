<?php

namespace App\Http\Requests\Vendor;

use Illuminate\Validation\Rule;
use App\Rules\EgyptianPhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVendorShopProfileRequest extends FormRequest
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
    $vendorId = $this->route('shop_profile');

    return [
      'banner' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
      'phone' => ['required', 'string', new EgyptianPhoneNumber()],
      'email' => ['required', 'email', 'max:200', Rule::unique('vendors', 'email')->ignore($vendorId)],
      'address' => ['required', 'string'],
      'description' => ['required', 'string'],
      'shop_name' => ['required', 'string', 'max:200'],
      'fb_link' => ['nullable', 'url'],
      'insta_link' => ['nullable', 'url'],
      'tw_link' => ['nullable', 'url'],
      'status' => ['required', 'boolean'],
    ];
  }

  public function messages()
  {
    return [
      'fb_link' => 'The Facebook link must be a valid URL',
      'insta_link' => 'The Instgram link must be a valid URL.',
      'tw_link' => 'The Twitter link must be a valid URL',
    ];
  }
}