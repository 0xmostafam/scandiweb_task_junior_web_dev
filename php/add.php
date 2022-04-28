<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="../styles/addStyles.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet" />
  <title>Add Products</title>
</head>

<body>
  <nav>
    <ul>
      <li>
        <h1>Product List</h1>
      </li>
      <li><button type="submit" form="product-form">save</button></li>
      <li>
        <a href="index.php"><button>cancel</button></a>
      </li>
    </ul>
  </nav>
  <form action="save.php" method="post" id="product-form">
    <div class="form-group">
      <label for="sku">SKU</label>
      <input class="input" type="text" name="sku" id="sku" required />
    </div>
    <div class="form-group">
      <label for="name">Name</label>
      <input class="input" type="text" name="name" id="name" required />
    </div>
    <div class="form-group">
      <label for="price">Price</label>
      <input class="input" type="number" name="price" id="price" required />
    </div>
    <select class="form-group" name="type_switcher" id="productType" onChange="handleSelection(value)">
      <option value="">Please choose an option</option>
      <option value="dvd-form">DVD</option>
      <option value="book-form">Book</option>
      <option value="furniture-form">Furniture</option>
    </select>
    <div id="form-container">
      <div class="form-group" style="display: none;" id="dvd-form">
        <label for="size">Size(MB)</label>
        <input class="input" type="number" name="size" id="size" />
      </div>
      <div class="form-group" style="display: none;" id="book-form">
        <label for="weight">Weight(KG)</label>
        <input class="input" type="number" name="weight" id="weight" />
      </div>
      <div id="furniture-form" style="display: none;">
        <div class="form-group" id="height-div">
          <label for="height">Height(CM)</label>
          <input class="input" type="number" name="height" id="height" />
        </div>
        <div class="form-group" id="width-div">
          <label for="width">Width(CM)</label>
          <input class="input" type="number" name="width" id="width" />
        </div>
        <div class="form-group" id="length-div">
          <label for="length">Length(CM)</label>
          <input class="input" type="number" name="length" id="length" />
        </div>
      </div>
    </div>
  </form>
</body>

</html>
  <script src="../js/add.js"></script>