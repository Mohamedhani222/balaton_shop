<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        $roles =[];
        if ($this->has('use_user_address')) {
            $roles = [];
        }else{
            $roles= [
                "first_name" => "required|string",
                "last_name" => "required|string",
                "address1" => "required|string",
                "address2" => "required|string",
                "phone" => "required|numeric",
                'pincode' => 'numeric',
                'delivery_notes' => 'string',
                "country_id" => "numeric",
            ];

        }
return $roles;
    }
}
