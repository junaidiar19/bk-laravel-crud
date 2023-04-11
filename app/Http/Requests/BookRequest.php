<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
        // define image rule
        $image = 'required|image|mimes:jpeg,png,jpg|max:2048';

        // check if http method is PUT or PATCH
        if ($this->method() == 'PUT' || $this->method() == 'PATCH') {
            // define new image rule
            $image = 'nullable|image|mimes:jpeg,png,jpg|max:2048';
        }
        
        // define rules
        $rules = [
            'title' => 'required',
            'publisher' => 'required',
            'qty' => 'required|numeric',
            'category_id' => 'required|numeric',
            'image' => $image,
        ];

        return $rules;
    }
}
