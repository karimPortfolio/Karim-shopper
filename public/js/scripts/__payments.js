

var cardNumInput = document.querySelector(".card-number");
var cardsImg = document.querySelector(".creditCardVisa");
var cardsImg2 = document.querySelector(".creditCardMasterC");
cardNumInput.onkeyup = () => {
    var value = cardNumInput.value;
    if (value[0] === "5")
    {
        cardNumInput.style.paddingLeft = "50px"
        cardsImg2.style.display = "block";
    } else if (value[0] === "4") {
        cardNumInput.style.paddingLeft = "50px"
        cardsImg.style.display = "block";
    } else{
        cardsImg.style.display = "none";
        cardsImg2.style.display = "none";
        cardNumInput.style.paddingLeft = "12px"
    }
}

cardNumInput.onchange = () => {
    var value = cardNumInput.value;
    if (value[0] === "5")
    {
        cardNumInput.style.paddingLeft = "50px"
        cardsImg2.style.display = "block";
    } else if (value[0] === "4") {
        cardNumInput.style.paddingLeft = "50px"
        cardsImg.style.display = "block";
    } else{
        cardsImg.style.display = "none";
        cardsImg2.style.display = "none";
        cardNumInput.style.paddingLeft = "12px"
    }
}


//

var error_handler = document.querySelector(".error_handler");
var payment_form = document.querySelector("#payment-form");
var all_inputs = document.querySelectorAll("#payment-form input");
payment_form.onsubmit = (e) => {

    var isEmpty = false;
    all_inputs.forEach( input => {
        if (input.value === "")
        {
            e.preventDefault();
            isEmpty = true;
        } else {
            isEmpty = false;
        }
    })
    if (isEmpty)
    {
        error_handler.style.display = "flex";
        console.log(error_handler+" "+isEmpty)
    } else {
        error_handler.style.display = "none";
        console.log(error_handler+" "+ isEmpty)
    }
}
