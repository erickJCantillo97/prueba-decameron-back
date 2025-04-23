<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHotelRequest extends FormRequest
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
            'name' => 'required|unique:hotels,name,' . $this->route('hotel')->id,
            'location' => 'required',
            'city' => 'required',
            'nit' => 'required|unique:hotels,nit,'. $this->route('hotel')->id,
            'total_rooms' => 'required|integer',
        ];
    }
}
