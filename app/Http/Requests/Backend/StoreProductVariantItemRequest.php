<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductVariantItemRequest extends FormRequest
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
      'product_id' => ['required', 'exists:products,id'],
      'variant_id' => ['required', 'exists:product_variants,id'],
      'name' => ['required', 'string', 'max:255'],
      'price' => ['required', 'integer'],
      'is_default' => ['required', 'boolean'],
      'status' => ['required', 'boolean'],
    ];
  }
}
