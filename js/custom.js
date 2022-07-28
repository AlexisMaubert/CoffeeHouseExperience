function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("ifNav").style.opacity = 0;
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("ifNav").style.opacity = 1;
}

function openCart(){
    document.getElementById("carritoCompra").style.height = "50%";
    document.getElementById("carritoCompra").style.width = "20%";
    document.getElementById("carritoCompra").style.paddingBottom = "6rem";
    document.getElementById("carritoBox").style.width = "20%";

}
function closeCart(){
    document.getElementById("carritoCompra").style.height = "0";
    document.getElementById("carritoCompra").style.width = "0";
    document.getElementById("carritoCompra").style.paddingBottom = "0";
    document.getElementById("carritoBox").style.width = "0";

}


function showContent() {
    element = document.getElementById("newCard");
    check = document.getElementById("tarjeta");
    if (check.checked) {
        element.style.width ="80%";
        element.style.height ="auto";
    }
    else {
        element.style.width ="0";
        element.style.height ="0";
    }
}


(function ($) {
    // Instantiate MixItUp:
    $('#Container').mixItUp();
    
})(jQuery);