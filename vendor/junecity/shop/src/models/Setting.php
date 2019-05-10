<?php

namespace junecity\shop\models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */


	protected $table = 'settings';

	protected $fillable = ['tax',
                           'shipping',
                           'business_name',
                           'business_address',
                           'business_address2',
                           'business_city',
                           'business_state',
                           'business_zip_code',
                           'business_website',
                           'business_phone',

                           'business_facebook_page',
                           'business_twitter_page',

                           'open_monday',
                           'close_monday',

                           'open_tuesday',
                           'close_tuesday',

                           'open_wednesday',
                           'close_wednesday',

                           'open_thursday',
                           'close_thursday',

                           'open_friday',
                           'close_friday',

                           'open_saturday',
                           'close_saturday',

                           'open_sunday',
                           'close_sunday',
                           
                           'shop_name',
                           'business_about',
                           'stripe_secret_key',
                           'stripe_public_key',
	                       ];

    public function User()
    {
        return $this->belongsTo('junecity\shop\models\User');
    }

    public function Original()
    {
        return $this->belongsToMany('junecity\shop\models\Original');
    }

}
