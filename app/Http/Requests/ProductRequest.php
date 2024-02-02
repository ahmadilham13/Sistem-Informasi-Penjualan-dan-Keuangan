<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Spatie\MediaLibrary\Support\File as SupportFile;

class ProductRequest extends FormRequest
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
        $rules = [
            'product_id'        => ['string'],
            'product_name'      => ['required', 'string'],
            'harga_jual'        => ['required'],
            'stock'             => ['required'],
            'description'       => ['nullable', 'string'],
            'product_image'  => [
                'nullable',
                File::types(config('filesystems.allowed_extensions_avatar'))
                    ->max((int) config('filesystems.maximum_filesize'))
            ]
        ];

        if ($this->method() === "POST") {
            $rules['product_id'][] = 'required';
            $rules['product_id'][] = Rule::unique('product_bibits', 'product_id')->whereNull('deleted_at');
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
            'product_image.*' => 'Attahment #:position failed to upload. Please check if attachment isnt more than '. SupportFile::getHumanReadableSize((int) config('filesystems.maximum_filesize') * 1024) .' and is a supported file type',
        ];
    }
}
