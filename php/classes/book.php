<?php

require_once(__DIR__ . "/../abstract/product.php");

class Book implements Product
{

    private $weight;

    public function __construct()
    {
    }

    public function getDescription()
    {
        return $this->weight;
    }
    public function getDescriptionType()
    {
        return "Weight";
    }
    public function setDescription($description)
    {
        $this->weight = $description;
    }

    public function setAttributes($attributes)
    {
        $this->sku = $attributes['sku'];
        $this->name = $attributes['name'];
        $this->price = $attributes['price'];
        $this->weight = $attributes['weight'];
    }
    public function createDBEntry($crud)
    {
        $firstInsert = ["sku" => $this->sku, "name" => $this->name, "price" => $this->price, "type" => "BOOK"];
        $secondInsert = ["sku" => $this->sku, "description" => $this->weight];
        $crud->create($firstInsert, $secondInsert);
    }
    public function readDbEntry($crud)
    {
        $result = $crud->read("sku, name, price, description", "sku = " . $this->sku);
        return $result;
    }
}
