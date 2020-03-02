let size = -1;

let addToCart = document.querySelector('.product-addtocart');
addToCart.addEventListener('click', function(){
    if( size != -1  ){
        let id = this.getAttribute('data-product-id');
        let xhr = new XMLHttpRequest();
        xhr.open('GET', `/handlers/product_handler.php?id=${id}&size_id=${size}`);
        xhr.send();
    
        xhr.addEventListener('load',()=>{
            
        });

    }else{
        let el = document.querySelector('.product-sizes-box-ujas');
        
            el.innerHTML = `
            <div class="product-sizes-error">
            <h4 class="product-sizes-error-h4">Вы не добавили размер</h4>
            <button class="product-sizes-error-button">OK</button>
            </div>  
            `;
        
        document.querySelector('.product-sizes-h5').style.color = 'red';
    }
    let el = document.querySelector('.product-sizes-error-button');
    el.addEventListener('click', function(){ 
    document.querySelector('.product-sizes-error').style.display = 'none';  
    
});
});

let arr = document.querySelectorAll('.product-sizes-box-item');

arr.forEach((el, index) => {
    el.addEventListener('click', function(){
        let id = this.getAttribute('data-id');
        size = id;
        console.log(id);     
    });
});

let es = document.querySelector('.product-sizes-box-item');
es.addEventListener('click', function(){
    this.style.backgroundColor = 'orange';
})