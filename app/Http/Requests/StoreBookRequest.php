<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
        return [
            'title' => 'required|string|max:255',
            'favorite' => 'required|boolean',
            'publicationDate' => 'required|date',
            'src' => 'required|string|max:255',
            'briefDescription' => 'required|string',
        ];

        
    }

    public function messages()
    {
        return [
            'category_id.exists' => 'The category ID must exist.',
            'author_id.exists' => 'The author ID must exist.',
            'rate_id.exists' => 'The rate ID must exist.',
            'title.required' => 'Title is required.',
            'title.string' => 'Title must be a string.',
            'title.max' => 'Title may not be greater than 255 characters.',
            'favorite.required' => 'Favorite status is required.',
            'favorite.boolean' => 'Favorite status must be a boolean.',
            'publicationDate.required' => 'Publication Date is required.',
            'publicationDate.date' => 'Publication Date must be a valid date.',
            'src.required' => 'Source URL is required.',
            'src.string' => 'Source URL must be a string.',
            'src.max' => 'Source URL may not be greater than 255 characters.',
            'briefDescription.required' => 'Brief Description is required.',
            'briefDescription.string' => 'Brief Description must be a string.',
        ];
    }
}
