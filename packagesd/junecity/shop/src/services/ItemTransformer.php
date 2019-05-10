<?php

namespace junecity\shop\services;

class ItemTransformer extends Transformer {


   public function transform($item)
    {
        

            return [

              'name'                        => $item['name'],
              'description'                 => $item['description'],
              'meta-keywords'               => $item['meta_keywords'],
              'meta-description'            => $item['meta_description'],
              'meta-title'                  => $item['meta_title'],
              'sku'                         => $item['sku'],
              'mpn'                         => $item['manufacturer_part_number'],
              'gtin'                        => $item['gtin'],
              'quantity'                    => (integer)$item['stock_quantity'],
              'buy-buttom'                  => (boolean) $item['disable_buy_button'],
              'price'                       => (double) $item['price'],
              'old-price'                   => (double) $item['old_price'],
              'weight'                      => (double) $item['weight'],
              'length'                      => (double) $item['length'],
              'width'                       => (double) $item['width'],
              'height'                      => (double) $item['height'],
              'display-order'               => (integer)$item['display_order']



            ];

        
    }


}