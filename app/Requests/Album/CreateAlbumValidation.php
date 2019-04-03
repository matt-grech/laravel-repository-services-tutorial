<?php

namespace App\Requests\Album;

use Illuminate\Foundation\Http\FormRequest;

class CreateAlbumValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; //false if need to be logged in
    }

    /**
     * Get the validation rules that apply to the request.
     * To validate collections see https://ericlbarnes.com/2015/04/04/laravel-array-validation/
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:albums,name|max:255',
            'artist' => 'required|max:255',
            'genre' => 'required|max:255',
            'condition' => 'required|max:255',
            'is_active' => 'required',
        ];
    }
}
