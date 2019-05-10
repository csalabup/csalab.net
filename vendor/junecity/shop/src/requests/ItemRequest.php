<?php

namespace junecity\shop\requests;

use junecity\shop\requests\Request;

class ItemRequest extends Request
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

             'name' => 'required|min:3|max:255', 
             'description' => 'min:3|max:600', 
             'url_link' => 'max:255', 
             'meta_keywords' => 'max:255', 
             'meta_description' => 'max:255',
             'meta_title' => 'max:255', 
             'sku' => 'max:255',
             'manufacturer_part_number' => 'max:255',
             'gtin' => 'max:255',
             'order_minimum_quantity' => 'max:10000|numeric',
             'order_maximum_quantity' => 'max:10000|numeric',
             'price' => 'max:10000|numeric',
             'old_price' => 'max:10000|numeric',
             'weight' => 'max:10000|numeric',
             'length' => 'max:10000|numeric',
             'height' => 'max:10000|numeric',
             'display_order'=> 'max:10000|numeric',
        ];
    }
}
