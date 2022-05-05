<?php

require_once(__DIR__ . "/php/classes/crud.php");
require_once(__DIR__ . "/php/classes/book.php");
require_once(__DIR__ . "/php/classes/furniture.php");
require_once(__DIR__ . "/php/classes/dvd.php");

$crud = new CRUD();
$result = $crud->readAll();
$objects = [];

foreach ($result as $row) {
  $type = $row["type"];
  $product = new $type();
  $product->setAttributes($row);
  array_push($objects, $product);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="styles/listStyles.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet" />
  <title>List Products</title>
</head>

<body>
  <nav>
    <ul>
      <li>
        <h1>Product List</h1>
      </li>
      <li>
        <a href="php/add.php"><button>ADD</button></a>
      </li>
      <li><button type="submit" form="items-form">MASS DELETE</button></li>
    </ul>
  </nav>
  <form action="php/delete.php/" id="items-form" method="post">
    <div id="products">
      <?php foreach ($objects as $object) { ?>
        <div class="product">
          <?php
          echo "<input type=\"checkbox\" class=\"delete-checkbox\" name=\"" . $object->getSKU() . "\" />";
          echo "<p> SKU : " . $object->getSKU() . "</p>";
          echo "<p> Name : " . $object->getName() . "</p>";
          echo "<p> Price : " . $object->getPrice() . " $</p>";
          echo "<p>" . $object->getDescriptionType() . " : " . $object->getDescription() . "</p>";
          ?>
        </div>
      <?php } ?>
    </div>
  </form>
</body>

</html>
<script src="js/delete.js"></script>