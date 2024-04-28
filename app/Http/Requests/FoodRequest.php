<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FoodRequest extends FormRequest
{
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'food.food_name' => 'required|string|max:50',
            'food.expiration_date' => 'required',
            'food.remaining_amount' => 'required|string|max:50',
            'food.category_id' => 'required',
            'food.search_recipie_name' => 'max:50',
            'food.note' => 'max:200',
        ];
    }
}
