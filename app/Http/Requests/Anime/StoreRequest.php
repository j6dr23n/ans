<?php

namespace App\Http\Requests\Anime;

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
            'title' => 'required',
            'page_id' => 'nullable',
            'info' => 'required',
            'poster' => ['required','regex:/(\.jpg|\.webp|\.png|\.gif|\.jpeg)$/i'],
            'type' => 'required',
            'release_year' => 'required',
            'condition' => 'required',
            'genres' => 'required',
            'sub_genres' => 'required',
            'season' => 'required',
            'rating' => 'required',
            'paid' => 'nullable',
            'trailer'=> 'nullable',
            'age_rating' => 'required',
        ];
    }
}
