const btnShop = document.querySelector(".shop_cart");
const cartOverlay =document.querySelector(".cart-overlay");
const cart = document.querySelector(".cart");
const closCart =document.querySelector("span .fa-window-close");


console.log(btnShop,cartOverlay,closCart);

btnShop.addEventListener("click",function(){cartOverlay.classList.add('transparentBcg');
cart.classList.add("showCart");})

closCart.addEventListener("click",function(){cartOverlay.classList.remove('transparentBcg');
cart.classList.remove("showCart");})

