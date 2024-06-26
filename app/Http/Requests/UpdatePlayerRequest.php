<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePlayerRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|max:255',
            'phone_number' => 'sometimes',
            'age' => 'sometimes',
            'club' => 'sometimes',
            'parent_phone_number' => 'sometimes',
            'height' => 'sometimes',
            'address' => 'sometimes'
        ];
    }

}
