<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UserRequest extends FormRequest
{
    protected $errorBag = 'manageUserForm';

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
        $rules =  [
            'name' => ['required', 'string'],
            'email' => [Rule::unique(User::class)->whereNull('deleted_at')->ignore($this->id), Rule::requiredIf(function () {
                    return $this->isMethod('post');
                }),
                'unique:users', 
                'lowercase', 
                'string',
            ],
            'password' => [Rule::requiredIf(function () {
                return $this->isMethod('post');
            }),
            'confirmed', 
            Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
            ],
        ];

        if($this->isMethod('put') && $this->password == null) {
            unset($rules['password']);
        }

        return $rules;
    }
}