<?php

namespace junecity\shop\models;

use Illuminate\Database\Eloquent\Model;

class Imager extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */


	protected $table = 'images';

	protected $fillable = ['user_id', 
	                       'original_url', 
	                       'image_url', 
	                       'medium_url', 
	                       'thumb_url', 
	                       ];


    public function imageable()
    {
        return $this->morphTo();
    }
}
