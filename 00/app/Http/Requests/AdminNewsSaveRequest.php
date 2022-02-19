<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminNewsSaveRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:100|unique:news',
            'text' => 'required|min:10|max:1000',
            'category_id' => 'required|integer|exists:categories,id',
        ];
    }
}
