<?php

namespace junecity\shop\requests;

use junecity\shop\requests\Request;

class CategoryRequest extends Request
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
             'name' => 'required|min:3|max:60', 
             'description' => 'max:200', 
             'url_link' => 'max:200', 
             'meta_keywords' => 'max:200', 
             'meta_description' => 'max:200',
             'meta_title' => 'max:60', 
             'display_order'=> 'numeric',
             
        ];
    }
}
