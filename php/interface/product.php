<?php

interface Product
{
    public function setSKU($sku);
    public function setName($name);
    public function setPrice($price);
    public function setDescription($description);
    public function setAttributes($attributes);
    public function getSKU();
    public function getName();
    public function getPrice();
    public function getDescription();
    public function getDescriptionType();
    public function createDBEntry($crud);
    public function readDbEntry($crud);
}
