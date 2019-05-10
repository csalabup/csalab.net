<?php

namespace junecity\shop\requests;

use junecity\shop\requests\Request;

class ColorRequest extends Request
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

             'color' => 'required|min:3|max:255', 
             'description' => 'min:3|max:255', 
             
        ];
    }
}
