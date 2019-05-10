<?php

namespace junecity\shop\models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'items';


    protected $fillable = [
                           'name',
                           'description',
                           'show_on_home_page',
                           'meta_keywords',
                           'meta_description',
                           'meta_title',
                           'published',
                           'sku',
                           'manufacturer_part_number',
                           'gtin',
                           'stock_quantity',
                           'order_minimum_quantity',
                           'order_maximum_quantity',
                           'disable_buy_button',
                           'price',
                           'old_price',
                           'weight',
                           'length',
                           'width',
                           'height',
                           'display_order',
                           'upload_file'
                           ];




    public function User()
    {
        return $this->belongsTo('junecity\shop\models\User');
    }


    public function Category()
    {
        return $this->belongsToMany('junecity\shop\models\Category');
    }


    public function Size()
    {
        return $this->belongsToMany('junecity\shop\models\Size');
    }


     public function Color()
    {
        return $this->belongsToMany('junecity\shop\models\Color');
    }

    /**
     * Get all of the item images.
     */

    public function imagers()
    {
        return $this->morphMany('junecity\shop\models\Imager', 'imageable');
    }


    public function Original()
    {
        return $this->belongsToMany('junecity\shop\models\Original');
    }



}
