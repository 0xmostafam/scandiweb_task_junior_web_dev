<?php

abstract class Product
{
    private $sku;
    private $name;
    private $price;

    public function setSKU($sku){
        $this->sku = $sku;
    }
    public function setName($name){
        $this->name = $name;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    public function getSKU(){
        return $this->sku;
    }
    public function getName(){
        return $this->name;
    }
    public function getPrice(){
        return $this->price;
    }
    abstract public function setDescription($description);
    abstract public function setAttributes($attributes);
    abstract public function getDescription();
    abstract public function getDescriptionType();
    abstract public function createDBEntry($crud);
    abstract public function readDbEntry($crud);
}
