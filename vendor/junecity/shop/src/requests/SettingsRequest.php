<?php

namespace junecity\shop\requests;

use junecity\shop\requests\Request;

class SettingsRequest extends Request
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


              'tax' => 'max:10000|numeric',
              'shipping' => 'max:10000|numeric',
              'business_name' => 'required|min:3|max:255',
              'shop_name' => 'required|min:3|max:60|unique:settings,shop_name,'.$this->id,
              'business_address' => 'max:255',
              'business_address2' => 'max:255',
              'business_city' => 'max:255',
              'business_state' => 'max:255',
              'business_zip_code' => 'max:255',
              'business_website' => 'max:1000',
              'business_phone' => 'max:255',             
              'business_facebook_page' => 'max:1000',
              'business_twitter_page' => 'max:1000',             
              'open_monday' => 'max:255',
              'close_monday' => 'max:255',             
              'open_tuesday' => 'max:255',
              'close_tuesday' => 'max:255',             
              'open_wednesday' => 'max:255',
              'close_wednesday' => 'max:255',             
              'open_thursday' => 'max:255',
              'close_thursday' => 'max:255',             
              'open_friday' => 'max:255',
              'close_friday' => 'max:255',             
              'open_saturday' => 'max:255',
              'close_saturday' => 'max:255',             
              'open_sunday' => 'max:255',
              'close_sunday' => 'max:255',
              'business_about' => 'max:2000',
              'stripe_secret_key' => 'max:255',
              'stripe_public_key' => 'max:255',

        ];
    }
}
