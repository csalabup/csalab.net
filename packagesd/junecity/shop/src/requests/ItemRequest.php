<?php

namespace junecity\shop\Requests;

use junecity\shop\Requests\Request;

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

             'name' => 'required|min:3|max:200', 
             'description' => 'min:3|max:600', 
             'url_link' => 'max:200', 
             'meta_keywords' => 'max:200', 
             'meta_description' => 'max:200',
             'meta_title' => 'max:200', 
             'sku' => 'max:200',
             'manufacturer_part_number' => 'max:200',
             'gtin' => 'max:200',
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
