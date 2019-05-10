<?php

namespace junecity\shop\requests;

use junecity\shop\requests\Request;

class RegisterRequest extends Request
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

             'name' => 'required|max:255', 
             'email' => 'required|email|max:255|unique:users',
             'password' => 'required|confirmed|min:6',
             'address' => 'max:255',
             'address2' => 'max:255',
             'city' => 'max:255',
             'state' => 'max:255',
             'zip_code' => 'max:255',
             'phone' => 'max:255',
             
        ];
    }
}
