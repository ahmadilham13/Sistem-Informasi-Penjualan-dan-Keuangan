<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;
use Spatie\MediaLibrary\Support\File as SupportFile;

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
            'avatar'  => [
                'nullable',
                File::types(config('filesystems.allowed_extensions_avatar'))
                    ->max((int) config('filesystems.maximum_filesize'))
            ]
        ];

        if($this->isMethod('put') && $this->password == null) {
            unset($rules['password']);
        }

        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'avatar' => 'Avatar is failed to upload. Please check if file isnt more than '. SupportFile::getHumanReadableSize((int) config('filesystems.maximum_filesize') * 1024) .' and is a supported file type',
        ];
    }
}
