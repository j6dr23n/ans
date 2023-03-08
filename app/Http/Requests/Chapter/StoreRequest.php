<?php

namespace App\Http\Requests\Chapter;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'chapter_no' => 'required|numeric',
            'anime_id' => 'required|numeric',
            'dl_link' => 'required|url',
            'pdf_file' => 'required|mimes:pdf'
        ];
    }
}
