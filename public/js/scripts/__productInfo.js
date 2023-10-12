

var product_large_img = document.querySelector(".product_large_img");
var product_image = document.querySelector(".product_image");
var close_btn = document.querySelector(".close_effect");

if (product_image)
{
    product_image.addEventListener("click" , () => {
        product_large_img.style.display = "block";
        document.querySelector("body").style.overflowY="hidden";
    })

    close_btn.addEventListener("click" , () => {
        product_large_img.style.display = "none";
        document.querySelector("body").style.overflowY="scroll";
    })
}

//handle quantity
//handle price by quantity

const addQuantityBtn = document.querySelector(".addQuantity");
const lessQuantityBtn = document.querySelector(".lessQuantity");
const input_quantite = document.querySelector(".input_quantite");
const quantity = document.querySelector(".quantity");
const addToCart = document.querySelector("#addToCart");
const price = document.querySelector(".prod_price");
const product_pricing = document.querySelector(".product_pricing");
const buying_btn = document.querySelector(".buying_btn");


if (addQuantityBtn)
{
    addQuantityBtn.addEventListener("click" , () => {
        if (input_quantite.value <= 99)
        {
            input_quantite.value++
            quantity.value++
            let total = parseInt(product_pricing.innerHTML) * parseInt(input_quantite.value);
            price.innerHTML = total;
            buying_btn.innerHTML = total;
        }
    })
}

if (lessQuantityBtn)
{
    lessQuantityBtn.addEventListener("click" , () => {
        if (input_quantite.value > 1)
        {
            input_quantite.value--
            quantity.value--
            let total = parseInt(product_pricing.innerHTML) * parseInt(input_quantite.value);
            price.innerHTML = total;
            buying_btn.innerHTML = total;
        }
    })
}







