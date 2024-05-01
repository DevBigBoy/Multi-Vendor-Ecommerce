<?php

namespace App\Http\Requests\Backend;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSubCategoryRequest extends FormRequest
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
      'category' => ['required', 'exists:categories,id'],
      'name' => ['required', 'string', 'max:255', Rule::unique('sub_categories')->ignore($this->subcategory)],
      'status' => ['required'],
    ];
  }

  public function messages()
  {
    return [
      'name.required' => 'The Sub-Category name is missing, where is it?',
      'name.unique' => 'Somebody already owns this name, please find a new one',
    ];
  }
}
