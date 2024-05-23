<?php

namespace App\Http\Requests\Vendor;

use App\Rules\EgyptianPhoneNumber;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreVendorShopProfileRequest extends FormRequest
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
      'banner' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
      'phone' => ['required', 'string', new EgyptianPhoneNumber()],
      'email' => ['required', 'email', 'max:200', Rule::unique('vendors', 'email')],
      'address' => ['required', 'string'],
      'description' => ['required', 'string'],
      'facebook_url' => ['nullable', 'url'],
      'twitter_url' => ['nullable', 'url'],
      'instagram_url' => ['nullable', 'url'],
      'status' => ['required', 'boolean'],
    ];
  }
}