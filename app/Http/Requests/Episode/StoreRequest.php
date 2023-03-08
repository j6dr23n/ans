<?php

namespace App\Http\Requests\Episode;

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
            'episodes.*.epi_link' => 'nullable' ,
            'episodes.*.epi_720p_link' => 'nullable' ,
            'episodes.*.drive' => 'nullable' ,
            'episodes.*.resolution' => 'nullable' ,
            'episodes.*.epi_number' => 'required' ,
            'episodes.*.embed_link' => 'nullable',
            'streamsb' => 'nullable',
            'streamtape' => 'nullable',
            'upstream' => 'nullable'
        ];
    }
}
