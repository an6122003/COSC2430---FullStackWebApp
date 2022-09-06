var cartBtn = [];
var cartClickedBool = new Array(prodCount);
var cartItems = [];

for (let i = 1; i < prodCount + 1; i++) {
    cartBtn[i] = document.getElementById("cart" + i);
    cartBtn[i].addEventListener('click', addToCounter);
    function addToCounter(){
        document.getElementById("cartCounter").innerHTML = parseInt(document.getElementById("cartCounter").innerHTML) + 1;
        cartItems[i-1] = i;
        cartBtn[i].removeEventListener('click', addToCounter);
        localStorage.setItem("data", cartItems);
    }
}