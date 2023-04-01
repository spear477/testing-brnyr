import './style.scss'
import {removeLoader, showLoader} from "./js/loader";
import {createItemUi} from "./js/item";
import {addToCart} from "./js/cart";
import  "bootstrap/dist/js/bootstrap.bundle"


showLoader();

export let items = [];
export const itemRow = document.querySelector('.item-row');
export const cartBtn = document.querySelector('.cart-btn');
export const cardCounter = document.querySelectorAll('.card-counter');
export const cartBox = document.querySelector('#cartBox');
export const total = document.querySelector('#total');


fetch('https://fakestoreapi.com/products')
    .then(res=>res.json())
    .then(json=>{

        items = json

        items.forEach(item =>{

          itemRow.append(createItemUi(item))
        })

        removeLoader()
    })
// window.addToCart = event => {
//     console.log("u")
// }


itemRow.addEventListener('click',e =>{
    if(e.target.classList.contains('add-cart')){
       addToCart(e)
    }
})