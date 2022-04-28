<?php

require_once(__DIR__ . '/book.php');
require_once(__DIR__ . '/dvd.php');
require_once(__DIR__ . '/furniture.php');

class ProductSelector {

    public function __construct() {
    }

    public function createObject($product) {
        $objectMap = ["BOOK" => new Book(), "DVD" => new Dvd(), "FURNITURE" => new Furniture()];
        $object = $objectMap[$product["type"]];
        $object->setSKU($product["sku"]);
        $object->setName($product["name"]);
        $object->setPrice($product["price"]);
        $object->setDescription($product["description"]);
        return $object;
    }
}