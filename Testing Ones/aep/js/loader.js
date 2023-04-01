

export function showLoader(){
    const loader = document.createElement('div');
    loader.classList.add('loader',"animate__animated","animate__fadeIn")
    loader.innerHTML = `
       <div class="min-vh-100 d-flex justify-content-center align-items-center">
            <div class="spinner-border data-loader"  role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
       </div> 
    `;
    document.body.append(loader);
}

export function removeLoader(){
   const selectCurrent = document.querySelector('.loader');
   selectCurrent.classList.replace("animate__fadeIn","animate__fadeOut");
   selectCurrent.addEventListener('animationend',_=>selectCurrent.remove())
}