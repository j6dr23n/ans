<?php

namespace App\Http\Requests\Episode;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'epi_link' => 'nullable',
            'epi_720p_link' => 'nullable',
            'drive' => 'nullable',
            'epi_number' => 'required',
            'resolution' => 'required',
            'embed_link' => 'nullable'
        ];
    }
}
