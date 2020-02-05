class BasketItem{
    constructor(productInfo, basket){
        this.id = productInfo.id;
        this.acitve = productInfo.acitve;
        this.name = productInfo.name;
        this.price = productInfo.price;
        this.photo = productInfo.photo;
        this.sku = productInfo.sku;
        this.description = productInfo.description;
        this.count = productInfo.count;
        this.fullPrice = productInfo.fullPrice;

        this.basket = basket;
    }
    getElement(){
        this.el = document.createElement('div');
        this.el.classList.add('basket-item');
        this.el.innerHTML = `
            <div class='basket-item' style='background-image: url(${this.photo})'></div>
            <div class='basket-item-name'>${this.name}</div>
            <div class='basket-item-sku'>Арт.: ${this.sku}</div>
            <div class='basket-item-price'>${this.price} руб.<div>
            <button class='basket-item-add'>+</button>
            <b class='basket-item-count'>${this.count}</b>
            <button class='basket-item-minus'>-</button>
            <button class='basket-item-delete'>Удалить</button>
            <hr>
        `;

        this.el.querySelector('.basket-item-delete').addEventListener('click', ()=>{
            this.delete();
        });

        this.el.querySelector('.basket-item-add').addEventListener('click', ()=>{
            this.changeCount(parseInt(this.count) + 1);
        });
        this.el.querySelector('.basket-item-minus').addEventListener('click', ()=>{
            let newCount = this.count - 1;
            if( newCount == 0 ){
                if( confirm('Вы точно хотите удалить товар из корзины?') ){
                    this.delete();
                }
            }else{
                this.changeCount(newCount);
            }
        });

        return this.el;
    }
    delete(){
        this.basket.delete(this.id);
    }
    changeCount(count){
        this.basket.changeCount(this.id, count);
    }
}
class Basket{
    constructor(){
        this.el = document.querySelector('.basket');
        this.basketItems=[];
        this.pathHandler = '/handlers/basket_handler.php';
    }
    load(){
        let xhr = new XMLHttpRequest();
        xhr.open('GET', this.pathHandler);
        xhr.send();

        xhr.addEventListener('load', ()=>{
            this.prepare(xhr.responseText);
        });
        
    }
    render(){
        // this.el.appendChild( this.basketItems[0].getElement() );
        if( this.basketItems.length > 0 ){
            this.basketItems.forEach((basketItem)=>{
                this.el.appendChild(basketItem.getElement());
            });
        }else{
            let div = document.createElement('div');
            div.classList.add('basket-empty');
            div.innerHTML = 'Ваша корзина пуста';

            this.el.appendChild(div);
        }
    }
    prepare(responseText){
        this.clear();
        let data = JSON.parse(responseText);
        console.log(data);

        data.products.forEach((productItem)=>{
            this.basketItems.push( new BasketItem(productItem, this) );
        })

        this.render();
    }
    clear(){
        this.el.innerHTML = ``;
        this.basketItems = [];
    }
    delete(id){
        let xhr = new XMLHttpRequest();
        xhr.open('GET', this.pathHandler + `?delete=yes&id=${id}`);
        xhr.send();   

        xhr.addEventListener('load', ()=>{
            this.prepare(xhr.responseText);
        });
    }
    changeCount(id, count){
        let xhr = new XMLHttpRequest();
        xhr.open('GET', this.pathHandler + `?change=yes&id=${id}&count=${count}`);
        xhr.send();

        xhr.addEventListener('load', ()=>{
            this.prepare(xhr.responseText);
        });
    }
}

let basket = new Basket();
basket.load();