<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'code' => 'required|max:4',
            'name' => 'required|min:10|max:40',
            'publisher' => 'required|min:10|max:40',
            'year' => 'nullable|digits:4',
            'author' => 'required|min:10|max:40',
        ];
    }

    public function messages()
    {
        return [
            'code.required' => 'Book code is required.',
            'code.max' => 'Book code may not be greater than 4 characters.',
            'name.required' => 'Book name is required.',
            'name.min' => 'Book name must be at least 10 characters.',
            'name.max' => 'Book name may not be greater than 40 characters.',
            'publisher.required' => 'Publisher is required.',
            'publisher.min' => 'Publisher must be at least 10 characters.',
            'publisher.max' => 'Publisher may not be greater than 40 characters.',
            'year.digits' => 'Year must be 4 digits.',
            'author.required' => 'Author is required.',
            'author.min' => 'Author must be at least 10 characters.',
            'author.max' => 'Author may not be greater than 40 characters.',
        ];
    }
}
