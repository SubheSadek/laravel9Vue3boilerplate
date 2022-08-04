<?php

namespace App\Http\Controllers\Role;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255|unique:roles,name',
        ];
        if ($this->isMethod('put')) {
            $rules['name'] = 'required|string|max:255|unique:roles,name,' . $this->role->id;
        }
        return $rules;
    }

    public function messages()
    {
        return [];
    }
}
