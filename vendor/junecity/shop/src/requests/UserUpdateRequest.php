<?php

namespace junecity\shop\requests;

use junecity\shop\requests\Request;

class UserUpdateRequest extends Request
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
              
             'email' => 'required|email|max:255|unique:users,email,'.$this->id,
             'name' => 'required|max:255', 
             'address' => 'max:255',
             'address2' => 'max:255',
             'city' => 'max:255',
             'state' => 'max:255',
             'zip_code' => 'max:255',
             'phone' => 'max:255',
             'role' => 'max:255',
             
        ];
    }
}
