<?php

require_once(__DIR__ . '/book.php');
require_once(__DIR__ . '/dvd.php');
require_once(__DIR__ . '/furniture.php');

interface ProductFactory {
    public function createObject($product);
}

class BookFactory implements ProductFactory {
    public function createObject($product) {
        $object = new Book();
        $object->setSKU($product["sku"]);
        $object->setName($product["name"]);
        $object->setPrice($product["price"]);
        $object->setDescription($product["description"]);
        return $object;
    }
}

class DvdFactory implements ProductFactory {
    public function createObject($product) {
        $object = new Dvd();
        $object->setSKU($product["sku"]);
        $object->setName($product["name"]);
        $object->setPrice($product["price"]);
        $object->setDescription($product["description"]);
        return $object;
    }
}

class FurnitureFactory implements ProductFactory {
    public function createObject($product) {
        $object = new Furniture();
        $object->setSKU($product["sku"]);
        $object->setName($product["name"]);
        $object->setPrice($product["price"]);
        $object->setDescription($product["description"]);
        return $object;
    }
}

function getObject($factory, $product) {
    return $factory->createObject($product);
}