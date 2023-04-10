<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'Title' => ['sometimes', 'string', 'max:255'],
            'Topic' => ['sometimes', 'string', 'max:2000'],
            'Image' => ['sometimes', 'image', 'mimes:png,jpeg,jpg', 'max:2048'],
            'Category_id' => ['sometimes', 'integer'],
        ];
    }
}