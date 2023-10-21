
//navbar

window.onscroll =  () => {
    const navbar = document.querySelector("#navbar");
    const navbarMob = document.querySelector("#navbar_mob");
    if (window.scrollY >= 350 )
    {
         if (window.innerWidth > 992)
         {
            navbar.style.position = "fixed";
            navbar.style.top = 0;
            navbar.style.background = "#FFFF";
            navbar.style.zIndex = "150";
            navbar.classList.add("navShadow");
         }

         else{
            navbarMob.style.position = "fixed";
            navbarMob.style.top = 0;
            navbarMob.style.background = "#FFFF";
            navbarMob.style.zIndex = "150";
            navbarMob.classList.add("navShadow");
         }

    } else{
        navbar.style.position = "relative";
        navbar.classList.remove("navShadow");
        navbar.style.zIndex = "150";
        navbar.style.background = "#e6fde6";
        navbarMob.style.position = "relative";
        navbarMob.classList.remove("navShadow");
        navbarMob.style.zIndex = "150";
        navbarMob.style.background = "#e6fde6";
    }
};


var hamburger_btn = document.querySelector(".hamburger_menu");
const navbarMob = document.querySelector("#navbar_mob");
if (hamburger_btn !== null && hamburger_btn !== undefined)
{
    const navbarMob = document.querySelector("#navbar_mob");
    hamburger_btn.addEventListener("click" , () => {
        var nav_collapse = document.querySelector("#nav_collapse");
        nav_collapse.classList.toggle("all-app-navs-close");
        nav_collapse.classList.toggle("all-app-navs-open");
        document.querySelector("body").classList.add("body_shadow");
        //navbarMob.style.zIndex = 0;
    })
}


var close_btn = document.querySelector(".close_icon");
if (close_btn !== null && close_btn !== undefined)
{
    close_btn.addEventListener("click" , () => {
        const navbarMob = document.querySelector("#navbar_mob");
        var nav_collapse = document.querySelector("#nav_collapse");
        nav_collapse.classList.toggle("all-app-navs-close");
        nav_collapse.classList.toggle("all-app-navs-open");
        document.querySelector("body").classList.remove("body_shadow");
        //navbarMob.style.zIndex = 150;
    })
}



// search bar open & close

var searchIcon = document.querySelector(".search_icon");
var searchIcon2 = document.querySelector(".search_icon2");

if (searchIcon !== null && searchIcon !== undefined)
{
    searchIcon.addEventListener('click' , () => {
        document.querySelector(".search").classList.toggle("search_close");
        document.querySelector(".search").classList.toggle("search_open");
        document.querySelector("body").classList.toggle("body_shadow");
    })
    searchIcon2.addEventListener('click' , () => {
        document.querySelector(".search2").classList.toggle("search_close2");
        document.querySelector(".search2").classList.toggle("search_open2");
        document.querySelector("body").classList.toggle("body_shadow");
    })
    document.querySelector(".close_search_bar").addEventListener('click' , () => {
        document.querySelector(".search").classList.toggle("search_close");
        document.querySelector(".search").classList.toggle("search_open");
        document.querySelector("body").classList.remove("body_shadow");
    })
    document.querySelector(".close_search_bar2").addEventListener('click' , () => {
        document.querySelector(".search2").classList.toggle("search_close2");
        document.querySelector(".search2").classList.toggle("search_open2");
        document.querySelector("body").classList.remove("body_shadow");
    })
    window.addEventListener( 'keydown', (event) => {
        if (event.metaKey && (event.key === 'k' || event.key === 'K'))
        {
            document.querySelector(".search").classList.remove("search_close");
            document.querySelector(".search").classList.add("search_open");
            document.querySelector("body").classList.add("body_shadow");
        }
        else if (event.key === 'Escape')
        {
            document.querySelector(".search").classList.add("search_close");
            document.querySelector(".search").classList.remove("search_open");
            document.querySelector("body").classList.remove("body_shadow");
        }
    })
}
