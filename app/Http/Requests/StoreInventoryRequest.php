<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5',
            'description' => 'required|min:10'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Sila isi nama',
            'name.min' => 'Sila isi panjang nama melebihi 5 patah perkataan',
            'description.required' => 'Sila isi description',
            'description.min' => 'Sila isi panjang description melebihi 10 patah perkataan'
        ];
    }
}
