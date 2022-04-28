const handleSelection = (value) => {
  const form = document.getElementById("product-form");
  const subform = document.getElementById("form-container");
  const children = subform.children;
  Array.from(children).forEach((element) => {
    if (element.id === value) {
      element.style.display = "block";
    } else {
      element.style.display = "none";
    }
  });
};

const isAlphaNumeric = (str) => {
  const regex = /^[a-zA-Z0-9]+$/;
  return regex.test(str);
};

const isNumeric = (str) => {
  const regex = /^[0-9.]+$/;
  return regex.test(str);
};

const isAlphabet = (str) => {
  const regex = /^[a-zA-Z]+$/;
  return regex.test(str);
};

const handleSubmitAdd = async (e) => {
  e.preventDefault();
  const form = document.getElementById("product-form");
  const formData = new FormData(form);
  const data = {};
  formData.forEach((value, key) => {
    data[key] = value;
  });

  if (data.type_switcher === "") {
    alert("Please select a product type");
    return;
  }
  if (!isAlphaNumeric(data.SKU) || data.SKU === "") {
    alert("SKU can't be empty and must be alphanumeric");
    return;
  }
  if (!isAlphabet(data.name) || data.name === "") {
    alert("name can't be empty and must be alphabet");
    return;
  }
  if (!isNumeric(data.price) || data.price === "") {
    alert("Price can't be empty and must be numeric");
    return;
  }
  if (data.type_switcher === "dvd-form" && (!isNumeric(data.size) || data.size === "")) {
    alert("Size can't be empty and must be numeric");
    return;
  }
  if (data.type_switcher === "book-form" && (!isNumeric(data.weight) || data.weight === "")) {
    alert("Weight can't be empty and must be numeric");
    return;
  }
  if (data.type_switcher === "furniture-form") {
    if (!isNumeric(data.height) || data.height === "") {
      alert("Height can't be empty and must be numeric");
      return;
    }
    if (!isNumeric(data.width) || data.width === "") {
      alert("Width can't be empty and must be numeric");
      return;
    }
    if (!isNumeric(data.length) || data.length === "") {
      alert("Length can't be empty and must be numeric");
      return;
    }
  }

  const result = await fetch("save.php", {
    method: 'POST', 
    body: JSON.stringify(data),
    headers:{
      'Accept': 'application/json, text/plain, */*',
      'Content-Type': 'application/json'
    }})

  const response = await result.text();

  if (response === "Sku already exists"){
    alert(response);
  } else {
    window.location.href = "../";
  }
};

const form = document.getElementById("product-form");
form.addEventListener("submit", handleSubmitAdd);
