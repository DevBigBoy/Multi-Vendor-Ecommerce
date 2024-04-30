<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
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
      'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
      'name' => ['required', 'string', 'max:255'],
      'is_featured' => ['required', 'boolean'],
      'status' => ['required', 'boolean'],
    ];
  }
}