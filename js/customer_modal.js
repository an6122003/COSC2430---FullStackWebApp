var modal = [];
var btn = [];
var closeBtn = document.getElementsByClassName("btn-close")[0];

for (let i = 1; i < prodCount + 1; i++) {
    // get modal div and product div of all the products
    modal[i] = document.getElementById("modal" + i);
    btn[i] = document.getElementById("btn" + i);

    // event listener of the buttons
    btn[i].addEventListener('click', showModal);
    closeBtn.addEventListener('click', closeModal);
    window.addEventListener('click', clickOut);

    // functions to show and close modal
    function showModal() {
        modal[i].style.display = "block";
    }
    function closeModal() {
        modal[i].style.display = "none";
    }
    function clickOut(event) {
        if (event.target == modal[i]) {
        modal[i].style.display = "none";
        }
    }
}