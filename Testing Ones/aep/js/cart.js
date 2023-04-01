import {cardCounter, cartBtn, items, total} from "../main";

export const cardCounterUpdate = function (){
    let count = parseInt(cardCounter[0].innerText)
    cardCounter.forEach(current => current.innerText = count +1 )
}

export const costTotal = function (){
    let all = document.querySelectorAll('.cart-cost');
    total.innerHTML = [...all].reduce((pv,cv)=>pv+parseFloat(cv.innerHTML),0);
}


window.inc = function (event,price){
    let currentCart = event.target.closest(".item-in-cart");
    let cartQuantity = currentCart.querySelector(".cart-quantity");
    let cartCost = currentCart.querySelector(".cart-cost");

    cartQuantity.valueAsNumber += 1;
    cartCost.innerText = cartQuantity.valueAsNumber *price;
    costTotal();
}
window.dec = function (event,price){
    let currentCart = event.target.closest(".item-in-cart");
    let cartQuantity = currentCart.querySelector(".cart-quantity");
    let cartCost = currentCart.querySelector(".cart-cost");
    cartQuantity.valueAsNumber -= 1;
    if(cartQuantity.valueAsNumber >= 1){
        cartCost.innerText = price/cartQuantity.valueAsNumber;
        total.innerHTML = 0
    }
    costTotal();
}

export const createItemInCart = function ({id,title,price,image}){
    const div = document.createElement('div');
    div.classList.add("item-in-cart","mb-3")
    div.innerHTML = `
             <div class="p-3 border rounded">
                 <div class="m-2">
                    <img src="${image}" class="cart-item-img" alt="">
                </div>
                <p class="fw-bold small"> ${title}</p>
                <div class="row ">
                <div class="col-5">
                   <p class="mb-0">$ <span class="cart-cost">${price}</span></p>
                </div>
                 <div class="col-7">
                  <div class="cart-item-quality input-group input-group-sm">
                    <button class="btn btn-primary" onclick="dec(event,${price})">
                      <i class="bi bi-dash pe-none"></i>
                   </button>
                   <input type="number" class="form-control form-control-sm text-end cart-quantity" value="1">
                   <button class="btn btn-primary" onclick="inc(event,${price})">
                      <i class="bi bi-plus pe-none"></i>
                   </button>
                </div>
               </div>
                </div>
            </div>
       
    
    `
    cartBox.append(div)
}

export const addToCart = function (e){
    let currentItemCard = e.target.closest('.item-card');
    let itemId = currentItemCard.getAttribute('item-id');
    let itemDetail = items.find(item => item.id === parseInt(itemId));

    let currentImg = currentItemCard.querySelector('.item-img');

    let newImg = new Image();
    newImg.src = currentImg.src;
    newImg.style.position = "fixed";
    newImg.style.transition = 1 + "s";
    newImg.style.height = 150 + "px";
    newImg.style.zIndex = 2000;
    newImg.style.top = currentImg.getBoundingClientRect().top+"px";
    newImg.style.left = currentImg.getBoundingClientRect().left+"px";

    document.body.append(newImg);

    setTimeout(_=>{
        newImg.style.height = 0 + "px";
        newImg.style.transform = "rotate(360deg)";
        newImg.style.top = (cartBtn.querySelector('.bi').getBoundingClientRect().top)+10+"px";
        newImg.style.left = (cartBtn.querySelector('.bi').getBoundingClientRect().left)+10+"px";
    },10 )

    setTimeout(_=>{
        cartBtn.classList.add("animate__jello");
        cardCounterUpdate()
        newImg.remove();
        createItemInCart(itemDetail);
        costTotal();

    },800)
    cartBtn.addEventListener('animationend',_=>{
        cartBtn.classList.remove("animate__jello")
    })

}