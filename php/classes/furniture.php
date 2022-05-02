<?php

require_once(__DIR__ . "/../abstract/product.php");

class Furniture implements Product
{

    private $length;
    private $width;
    private $height;

    public function __construct()
    {
    }

    public function getDescription()
    {
        return $this->width . "X" . $this->height . "X" . $this->length;
    }
    public function getDescriptionType()
    {
        return "Dimensions";
    }
    public function setDescription($description)
    {
        $values = explode("X", $description);
        $this->width = $values[0];
        $this->height = $values[1];
        $this->length = $values[2];
    }
    public function setAttributes($attributes)
    {
        $this->sku = $attributes['sku'];
        $this->name = $attributes['name'];
        $this->price = $attributes['price'];
        $this->length = $attributes['length'];
        $this->width = $attributes['width'];
        $this->height = $attributes['height'];
    }

    public function createDBEntry($crud)
    {
        $firstInsert = ["sku" => $this->sku, "name" => $this->name, "price" => $this->price, "type" => "FURNITURE"];
        $secondInsert = ["sku" => $this->sku, "description" => "" . $this->width . "X" . $this->height . "X" . $this->length . ""];
        $crud->create($firstInsert, $secondInsert);
    }

    public function readDbEntry($crud)
    {
        $result = $crud->read("sku, name, price, description", "sku = " . $this->sku);
        return $result;
    }
}
