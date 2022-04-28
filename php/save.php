<?php

require_once(__DIR__ . '/classes/book.php');
require_once(__DIR__ . '/classes/dvd.php');
require_once(__DIR__ . '/classes/furniture.php');
require_once(__DIR__ . '/classes/crud.php');

$crud = new Crud();
$objectMap = ["book-form" => new Book(), "dvd-form" => new Dvd(), "furniture-form" => new Furniture()];
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
$decoded = [];

if ($contentType === "application/json") {
    $content = trim(file_get_contents("php://input"));
    $decoded = json_decode($content, true);
}

$type = $decoded["type_switcher"];
$objectMap[$type]->setAttributes($decoded);

if (count($crud->read($objectMap[$type]->getSKU())) !== 0) {
    http_response_code(400);
    echo "Sku already exists";
    exit();
} else {
    $objectMap[$type]->createDBEntry($crud);
    http_response_code(201);
    echo "Created";
    exit();
}

echo "Failed";
