<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
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
      'banner' => ['nullable', 'mimes:png,jpg', 'max:2048'],
      'type' => ['string', 'max:255'],
      'title' => ['required', 'string', 'max:255'],
      'starting_price' => ['max:200'],
      'btn_url' => ['url'],
      'serial' => ['required', 'integer'],
      'status' => ['required'],
    ];
  }
}