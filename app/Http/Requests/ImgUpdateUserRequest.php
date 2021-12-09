<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImgUpdateUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'pict' => 'image|dimensions:ratio=1/1|mimes:png,jpg,jpeg,webp,svg'
        ];
    }
}
