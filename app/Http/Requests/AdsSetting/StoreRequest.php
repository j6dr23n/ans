<?php

namespace App\Http\Requests\AdsSetting;

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
            'adsblock' => 'nullable',
            'popup_ads' => 'nullable',
            'social_bar_ads' => 'nullable',
            'top_720x90_ads' => 'nullable',
            'feature_160x300_ads' => 'nullable',
            'post_160x300_ads' => 'nullable',
            'episode_160x300_ads' => 'nullable',
            'dl_720x90_ads' => 'nullable',
            'native_ads' => 'nullable'
        ];
    }
}
