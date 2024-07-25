<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'banner' => ['image', 'max:2048'],
            'title_one' => ['required', 'string', 'max:200'],
            'title_two' => ['string', 'max:200'],
            'starting_price' => ['max:200'],
            'link' => ['url'],
            'serial' => ['required', 'integer'],
            'status' => ['required']
        ];
    }
}
