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
      'banner' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
      'type' => ['nullable', 'string', 'max:100'],
      'title' => ['nullable', 'string', 'max:255'],
      'starting_price' => ['nullable', 'string',],
      'btn_url' => ['nullable', 'url'],
      'serial' => ['nullable', 'integer'],
      'status' => ['required', 'boolean'],
    ];
  }
}
