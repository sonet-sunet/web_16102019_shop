let addToCart = document.querySelector('.product-addtocart');
addToCart.addEventListener('click', function(){
    let id = this.getAttribute('data-product-id');
    let xhr = new XMLHttpRequest();
    xhr.open('GET', `/handlers/product_handler.php?id=${id}`);
    xhr.send();

    xhr.addEventListener('load',()=>{
        
    });
});