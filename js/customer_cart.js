var cartNum = [];
var cartClickedBool = new Array(prodCount);
var cartItems = [];
//var cartNumberItems =0 ;

for (let i = 1; i < prodCount + 1; i++) {
    cartNum[i] = document.getElementById("cart" + i);
    cartNum[i].addEventListener('click', addToCounter);
    function addToCounter(){
        cartItems.push(i);
        cartNumberItems++;
        cartNum[i].removeEventListener('click', addToCounter);
        localStorage.setItem("data", cartItems);
        //localStorage.setItem("cartNumberItems", cartNumberItems);
        update();
    }
}

//function update(){
    //document.getElementById("cartCounter").innerHTML = localStorage.getItem("cartNumberItems");
//}

//update();