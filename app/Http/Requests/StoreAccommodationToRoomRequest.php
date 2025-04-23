<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAccommodationToRoomRequest extends FormRequest
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
            'hotel_id' => 'required|exists:hotels,id',
            'total_rooms' =>'required|integer|min:1',
            'room_type' =>'required|string|in:ESTANDAR,JUNIOR,SUITE',
            'accommodation' => 'required|string|in:SENCILLA,TRIPLE,DOBLE,CUADRUPLE'
        ];
    }
}
