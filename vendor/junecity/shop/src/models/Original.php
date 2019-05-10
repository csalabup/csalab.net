<?php

namespace junecity\shop\models;

use Illuminate\Database\Eloquent\Model;

class Original extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */


	protected $table = 'originals';

	protected $fillable = ['user_id', 
	                       'original_url', 
	                       ];

    public function Item()
    {
        return $this->belongsToMany('junecity\shop\models\Item');
    }

    public function Setting()
    {
        return $this->belongsToMany('junecity\shop\models\Setting');
    }

}
