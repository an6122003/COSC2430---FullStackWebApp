var cartProductsID = JSON.parse(localStorage.getItem("data")); 
var box = [];
var del = [];
var price = [];
var priceField = document.getElementById("priceField");
var totalPrice = 0;
var submitOrderButton = document.getElementById("orderSubmitButton");

submitOrderButton.addEventListener('click', finishOrder);

function finishOrder(){
    localStorage.removeItem("data");
    alert("Your order has been submitted");
}

for (let i = 1; i < prodCount + 1; i++){
    // get modal div and product div of all the products
    var cartProductsID = JSON.parse(localStorage.getItem("data")); 
    box[i] = document.getElementById("box" + i);
    del[i] = document.getElementById("del" + i);
    price[i] = Number(document.getElementById("price" + i).innerHTML.replace("$", ""));

    for (let j = 0; j < cartProductsID.length; j++){
        if (i == cartProductsID[j]){
            // create item
            box[cartProductsID[j]].style.display = "flex";
            totalPrice += price[cartProductsID[j]];
            // delete item
            del[i].addEventListener('click', delBox);
            function delBox(){
                // hide box
                box[i].style.display = "none";
                
                // update total price
                totalPrice -= price[cartProductsID[j]];
                updatePriceField();
                

                // remove item from cart in local storage
                cartProductsID.splice(j, 1);
                localStorage.setItem("data", JSON.stringify(cartProductsID));

                // update cart number
                fillForm();
                update();
                
            }
        }
    }
    
}

function updatePriceField(){
    if (totalPrice == 0){
        priceField.innerHTML = 0;
    }
    else{
        priceField.innerHTML = totalPrice;
    }
    
}


updatePriceField();
update();
