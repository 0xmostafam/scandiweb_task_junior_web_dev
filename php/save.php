<?php

require_once(__DIR__ . '/classes/book.php');
require_once(__DIR__ . '/classes/dvd.php');
require_once(__DIR__ . '/classes/furniture.php');
require_once(__DIR__ . '/classes/crud.php');
require_once(__DIR__ . '/classes/productFactory.php');

$crud = new Crud();

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
$decoded = [];

if ($contentType === "application/json") {
    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);
}
$type = $decoded["type_switcher"]. "Factory";
$object = getObject(new $type(), $decoded);

if (count($crud->read($object->getSKU())) !== 0) {
    http_response_code(400);
    echo "Sku already exists";
    exit();
} else {
    $object->createDBEntry($crud);
    http_response_code(201);
    echo "Created";
    exit();
}

echo "Failed";
