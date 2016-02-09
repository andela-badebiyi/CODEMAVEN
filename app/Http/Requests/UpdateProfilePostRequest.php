<?php

namespace App\Http\Requests;

class UpdateProfilePostRequest extends Request
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
            'occupation' => 'max:100',
            'location'   => 'max:140',
            'dob'        => 'date',
            'avatar'     => 'mimes:jpeg,jpg,png,gif,bmp|max:3000',
        ];
    }

    public function messages()
    {
        return [
            'dob.date'     => 'You entered an invalid date of birth (Format: "YYYY-mm-dd")',
            'avatar.mimes' => 'Picture format is invalid',
            'avatar.max'   => 'File too large',
        ];
    }
}
