var randomHubId = Math.floor(Math.random() * 3) + 1;



// console.log(cartItems);

function fillForm(){
    var cartItems = JSON.parse(localStorage.getItem("data"));
    document.getElementById('hubId').value = randomHubId;
    document.getElementById('productIds').value = cartItems;
    document.getElementById('totalPrice').value = totalPrice;
    document.getElementById('status').value = "active";
}

fillForm();