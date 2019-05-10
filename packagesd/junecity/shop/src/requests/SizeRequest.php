<?php

namespace junecity\shop\requests;

use junecity\shop\requests\Request;

class SizeRequest extends Request
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

             'size' => 'required|min:3|max:200', 
             'description' => 'min:3|max:200', 
             
        ];
    }
}
