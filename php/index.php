<?php

require_once(__DIR__ . "/classes/crud.php");
require_once(__DIR__ . "/classes/productSelector.php");

$crud = new CRUD();
$productSelector = new ProductSelector();
$result = $crud->readAll();
$objects = [];

foreach ($result as $row) {
    array_push($objects, $productSelector->createObject($row));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="../styles/listStyles.css" />
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
        <a href="add.php"><button>add</button></a>
      </li>
      <li><button type="submit" form="items-form">mass delete</button></li>
    </ul>
  </nav>
  <form action="delete.php/" id="items-form" method="post">
    <div id="products">
      <?php foreach ($objects as $object) { ?>
      <div class="product">
        <?php
        echo "<input type=\"checkbox\" class=\"delete-checkbox\" name=\"".$object->getSKU()."\" />";
        echo "<p>".$object->getSKU()."</p>";
        echo "<p>".$object->getName()."</p>";
        echo "<p>".$object->getPrice()."</p>";
        echo "<p>".$object->getDescriptionType()." : ".$object->getDescription()."</p>";
        ?>
      </div>
      <?php } ?>
    </div>
  </form>
</body>

</html>
<script src="../js/delete.js"></script>