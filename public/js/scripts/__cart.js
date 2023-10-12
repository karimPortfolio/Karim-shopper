

const lessQuantityBtn = document.querySelector(".all_cart_products .lessQuantityBtn");
const moreQuantityBtn = document.querySelector(".all_cart_products .moreQuantityBtn");
var productQuantity = document.querySelector(".all_cart_products .productQuantity");

if (lessQuantityBtn !== null && lessQuantityBtn !== undefined && moreQuantityBtn !== null && moreQuantityBtn !== undefined)
{
    moreQuantityBtn.addEventListener('click' , () => {
        productQuantity.value++
    })
    lessQuantityBtn.addEventListener('click' , () => {
        productQuantity.value--
    })
}
