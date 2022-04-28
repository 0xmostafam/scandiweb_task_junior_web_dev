const handleSubmitDelete = async (e) => {
    e.preventDefault();
    const form = document.getElementById("items-form");
    const formData = new FormData(form);
    const data = [];
    formData.forEach((value, key) => {
      data.push(key);
    });

    if (data.length <= 0) {
        alert("Please select an item to delete");
        return;
    }

    const result = await fetch("php/delete.php", {
        method: 'POST', 
        body: JSON.stringify(data),
        headers:{
          'Accept': 'application/json, text/plain, */*',
          'Content-Type': 'application/json'
        }})
        
    const response = await result.text();
    if (response === "Success") {
        window.location.reload();
    } else {
        alert(response);
    }

}

const form = document.getElementById("items-form");
form.addEventListener("submit", handleSubmitDelete);