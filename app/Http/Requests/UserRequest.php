<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->isMethod('post')) {
            return [
                'name' => [
                    'required', 'min:3'
                ],
                'email' => [
                    'required', 'email', 'unique:users,email'
                ],
                'password' => [
                    $this->route()->user ? 'required_with:password_confirmation' : 'required', 'nullable', 'confirmed', 'min:6'
                ],
            ];
        } elseif ($this->isMethod('put')) {
            return [
                'name' => [
                    'required', 'min:3'
                ],
                'email' => [
                    'email'
                ]
            ];
        }

        
    }
}
