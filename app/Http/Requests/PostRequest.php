<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'body' => 'required',
            'image_url' => 'nullable|url',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
            'tags' => 'required|array',
            'tags.*' => 'exists:tags,id',
        ];
    }
}
