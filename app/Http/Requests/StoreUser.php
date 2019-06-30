<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return 
        [
            'name.required' => __('user.name_required'),
            'email.required' => __('user.email_required'),
            'email.unique' => __('user.email_unique'),
            'password.required' => __('user.password_required'),
            'password.confirmed' => __('user.password_confirmed')
        ];
        
    }
}
