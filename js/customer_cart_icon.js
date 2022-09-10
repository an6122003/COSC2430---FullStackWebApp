var cartNum = [];
var cartItems = [];

for (let i = 1; i < prodCount + 1; i++) {
    cartNum[i] = document.getElementById("cart" + i);
    cartNum[i].addEventListener('click', addToCounter);
    function addToCounter(){
        cartItems.push(i);
        cartNum[i].removeEventListener('click', addToCounter);
        localStorage.setItem("data", JSON.stringify(cartItems));
        update();
        alert("Item added");
    }
}

function update(){
    var cartBox = document.getElementById("cartCounter");
    if (localStorage.getItem("data") == null){
        cartBox.innerHTML = 0;
    }
    else{
        cartBox.innerHTML = (JSON.parse(localStorage.getItem("data"))).length;
    }
    
}

update();