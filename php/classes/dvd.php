<?php

require_once(__DIR__ . "/../abstract/product.php");

class DVD implements Product
{
    private $size;

    public function __construct()
    {
    }

    public function getDescription()
    {
        return $this->size;
    }
    public function getDescriptionType()
    {
        return "Size";
    }
    public function setDescription($description)
    {
        $this->size = $description;
    }

    public function setAttributes($attributes)
    {
        $this->sku = $attributes['sku'];
        $this->name = $attributes['name'];
        $this->price = $attributes['price'];
        $this->size = $attributes['size'];
    }
    public function createDBEntry($crud)
    {
        $firstInsert = ["sku" => $this->sku, "name" => $this->name, "price" => $this->price, "type" => "DVD"];
        $secondInsert = ["sku" => $this->sku, "description" => $this->size];
        $crud->create($firstInsert, $secondInsert);
    }
    public function readDbEntry($crud)
    {
        $result = $crud->read("sku, name, price, description", "sku = " . $this->sku);
        return $result;
    }
}
