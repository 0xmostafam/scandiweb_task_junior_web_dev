<?php

require_once(__DIR__ . "/../abstract/product.php");

class Book extends Product
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

    public function createDBEntry($crud)
    {
        $firstInsert = ["sku" => $this->getSKU(), "name" => $this->getName(), "price" => $this->getPrice(), "type" => "Book"];
        $secondInsert = ["sku" => $this->getSKU(), "description" => $this->getDescription()];
        $crud->create($firstInsert, $secondInsert);
    }
    public function readDbEntry($crud)
    {
        $result = $crud->read("sku, name, price, description", "sku = " . $this->getSKU());
        return $result;
    }
}
