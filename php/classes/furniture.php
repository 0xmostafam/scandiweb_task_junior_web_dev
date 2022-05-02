<?php

require_once(__DIR__ . "/../abstract/product.php");

class Furniture extends Product
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
        $firstInsert = ["sku" => $this->getSKU(), "name" => $this->getName(), "price" => $this->getName(), "type" => "Furniture"];
        $secondInsert = ["sku" => $this->getSKU(), "description" => $this->getDescription()];
        $crud->create($firstInsert, $secondInsert);
    }

    public function readDbEntry($crud)
    {
        $result = $crud->read("sku, name, price, description", "sku = " . $this->getSKU());
        return $result;
    }
}
