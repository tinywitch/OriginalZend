<?php

/**
 * Created by PhpStorm.
 * User: thuyninh
 * Date: 19/06/2017
 * Time: 10:31
 */

namespace Product\Model;


class Product
{
    public $id;
    public $name;
    public $price;
    public $image;

    public function exchangeArray($data)
    {
        $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->name = (isset($data['name'])) ? $data['name'] : null;
        $this->price = (isset($data['price'])) ? $data['price'] : null;
        $this->image = (isset($data['image'])) ? $data['image'] : null;
    }
}