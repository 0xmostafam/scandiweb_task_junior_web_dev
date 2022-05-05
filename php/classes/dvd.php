<?php

require_once(__DIR__ . "/../abstract/product.php");

class DVD extends Product
{
    private $sku;
    private $name;
    private $price;
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

    public function createDBEntry($crud)
    {
        $firstInsert = ["sku" => $this->getSKU(), "name" => $this->getName(), "price" => $this->getPrice(), "type" => "Dvd"];
        $secondInsert = ["sku" => $this->getSKU(), "description" => $this->getDescription()];
        $crud->create($firstInsert, $secondInsert);
    }
    public function readDbEntry($crud)
    {
        $result = $crud->read("sku, name, price, description", "sku = " . $this->getSKU());
        return $result;
    }
}
