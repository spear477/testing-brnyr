import {excerpt} from "./uilitites";


export const createItemUi = function ({id,title,image,description,price}){
    let itemDiv = document.createElement('div');
    itemDiv.classList.add("col-lg-4","col-md-6")
    itemDiv.innerHTML=`
             <div class="card item-card " item-id="${id}">
                <div class="card-body d-flex flex-column">
                    <div class="">
                      <img class="item-img" src="${image}" alt="">
                    </div>
                    <h5 class="card-title fw-bold text-truncate">${title}</h5>
                    <p class="card-text">
                       ${excerpt(description)}
                    </p>
                       <div class="d-flex mt-auto justify-content-between align-items-center">
                       <p class="fw-bold mb-0">$ <span>${price}</span></p>
                       <button class="btn btn-outline-primary add-cart">
                          <i class="bi bi-cart-plus"></i>Add Cart
                        </button>
                    </div>

                </div>
            </div>
          
          `;
    return itemDiv;
}