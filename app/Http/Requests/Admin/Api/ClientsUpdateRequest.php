<?php

namespace App\Http\Requests\Admin\Api;

use Illuminate\Foundation\Http\FormRequest;

class ClientsUpdateRequest extends FormRequest
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

    public function messages()
    {
        return [
            'is_active.boolean' => 'is active must be (online or offline)'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => 'min:3|max:50|required',
            'last_name' => 'min:3|max:100|required',
            'phone_number' => 'min:8|max:200|required',
            'mobile_number' => 'min:11|max:200|required',
            'client_type' => 'int|required',
            'address' => 'required',
            'title' => 'required|max:250',
            'country' => 'required|max:250',
            'notes' => 'required',
            'institution_id' => 'int|required'
        ];
    }
}
