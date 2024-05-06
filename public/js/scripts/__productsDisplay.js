

var whish_list_btn = document.querySelectorAll(".whishlist_add span");
var empty_hear_icon = document.querySelector(".whishlist_add .empty_heart_icon");
var full_heart_icon = document.querySelector(".whishlist_add .full_heart_icon");

whish_list_btn.forEach( btn => {
    btn.addEventListener('click' , () => {
        btn.childNodes.forEach( child => {
            child.classList.toggle("hidde");
            child.classList.toggle("active");
        })
    })
})


//products list or grid


var list_icon = document.querySelector(".list_icon");
var grid_icon = document.querySelector(".grid_icon");
var products_list = document.querySelector("#products_list");
var products_grid = document.querySelector("#products_grid");

if (list_icon !== null && grid_icon !== null)
{
    list_icon.addEventListener("click" , () => {
        products_list.classList.toggle("display_sys")
        products_grid.classList.toggle("close_display")
        products_list.classList.toggle("close_display")
        products_grid.classList.toggle("display_sys")
    })
    grid_icon.addEventListener("click" , () => {
        products_list.classList.toggle("display_sys")
        products_grid.classList.toggle("close_display")
        products_list.classList.toggle("close_display")
        products_grid.classList.toggle("display_sys")
    })
}

//open and close the filtering sidebar

var small_screens_filter = document.querySelector(".small_screens_filter");
var close_filter_sidebar = document.querySelector(".close_filter_sidebar");


if (small_screens_filter !== null && small_screens_filter !== undefined && close_filter_sidebar !== null && close_filter_sidebar !== undefined)
{
     small_screens_filter.addEventListener('click' , () => {
         document.querySelector(".products_filtering").classList.remove("close_filtering_products");
         document.querySelector(".products_filtering").classList.add("open_filtering_products");
         document.querySelector("body").classList.add("body_shadow");
     })

     document.querySelector(".products_filtering").addEventListener('click' ,() =>{
         document.querySelector(".products_filtering").classList.add("close_filtering_products");
         document.querySelector(".products_filtering").classList.remove("open_filtering_products");
         document.querySelector("body").classList.remove("body_shadow");
     })

     close_filter_sidebar.addEventListener('click' , () => {
         document.querySelector(".products_filtering").classList.add("close_filtering_products");
         document.querySelector(".products_filtering").classList.remove("open_filtering_products");
         document.querySelector("body").classList.remove("body_shadow");
     })
}


