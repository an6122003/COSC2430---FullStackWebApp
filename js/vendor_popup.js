popupBox = document.getElementById('pop')

seeDetailsAlotBtn = document.getElementsByClassName('btnDetail')

for (let i = 0 ; i< seeDetailsAlotBtn.length;i++){
    const button = seeDetailsAlotBtn[i]
    button.addEventListener('click',displayImg)
}

function displayImg(event){
    button = event.target
    shopitem = button.parentElement
    shopitemitem = shopitem.parentElement

    itemName = shopitemitem.getElementsByClassName('name')[0].innerText
    itemPrice = shopitemitem.getElementsByClassName('price')[0].innerText
    itemImg = shopitemitem.getElementsByClassName('img')[0].src
    itemDescription = shopitemitem.getElementsByClassName('description')[0].innerText

    function openPopUp()
    {
        popupcontent =
        `
        <img src="${itemImg}" alt=""><br>
        <h2>${itemName}</h2>
        <h3>${itemPrice}</h3>
        <p>${itemDescription}</p>
        <button class='btnVendor p-2' onclick="closePopUp()">Close</button>
        `
        popupBox.innerHTML = popupcontent
        popupBox.classList.add("openPopup");
    }
    openPopUp()
}


function closePopUp(){
    popupBox.classList.remove("openPopup")
}