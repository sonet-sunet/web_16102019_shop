class Products{
    constructor(id, active, name, price, photo, sku, description){
        this.id = id;
        this.active = active;
        this.name = name;
        this.price = price;
        this.photo = photo;
        this.sku = sku;
        this.description = description;
    }
    getElement(){
        let el = document.createElement('a');
        el.href = `/product.php?id=${this.id}`;
        el.classList.add('catalog-products-item');
        el.innerHTML = `
            <div class='catalog-products-item-photo' style='background-image: url(${this.photo})'></div>
            <div class='catalog-products-item-name'>${this.name}</div>
            <div class='catalog-products-item-price'>${this.price} руб.</div>
        `;

        return el;
    }
}

class Catalog{
    constructor(){
        this.el = document.querySelector('.catalog');
        this.id = this.el.getAttribute('data-catalog-id');
        this.products = [];
        this.path = '/handlers/catalog_handler.php';
    }
    load(nowPage = 1){
        this.showPreloader();
        let xhr = new XMLHttpRequest();

        xhr.open('GET', this.path + `?id=${this.id}&now_page=${nowPage}`);
        xhr.send();

        xhr.addEventListener('load', ()=>{
            this.clear();
            let data = JSON.parse(xhr.responseText);

            data.products.forEach((item)=>{
                this.products.push(new Products(
                    item.id, item.active, item.name, item.price, item.photo, item.sku, item.description
                ));    
            });

            this.hiderPreloader();
            this.render(data);
        });
    }
    render(data){
        this.renderProducts();
        this.renderFilters();
        this.renderPagination(data.pagination);
    }
    renderProducts(){
        let catalogProductsEl = this.el.querySelector('.catalog-products');
        this.products.forEach((product)=>{
            catalogProductsEl.appendChild( product.getElement() );
        });
    }
    renderFilters(){

    }
    renderPagination(dataPagination){
        let paginationEl = this.el.querySelector('.catalog-pagination');

        for(let i = 1; i <= dataPagination.countPage; i++){
            let paginationItem = document.createElement('a');
            paginationItem.href='#';
            paginationItem.classList.add('catalog-pagination-item');

            if( i == dataPagination.nowPage ){
                paginationItem.classList.add('active');
            }

            paginationItem.innerHTML = i;

            paginationEl.appendChild(paginationItem);

            paginationItem.addEventListener('click', (e)=>{
                e.preventDefault();
                // e.target - элемент, на который я кликнул.
                // это также, как мы использовали this, но здесь он не указывает
                // на элемент, на который я кликнул, а явлется объектом catalog
                // поэтому мы идем через e.target

                let num = e.target.innerHTML;
                console.log(num);
                this.load(num);
            });

        }

    }
    clear(){
        this.el.querySelector('.catalog-products').innerHTML = '';
        this.el.querySelector('.catalog-pagination').innerHTML = '';
        this.products = [];
    }
    showPreloader(){
        this.el.querySelector('.catalog-preloader').style.display = 'block';
    }
    hiderPreloader(){
        this.el.querySelector('.catalog-preloader').style.display = 'none';
    }
}

let catalog = new Catalog();
catalog.load();

// let xhr = new XMLHttpRequest();

// xhr.open('GET', '/handlers/catalog_handler.php');
// xhr.send();

// xhr.addEventListener('load', ()=>{
//     let data = JSON.parse(xhr.responseText);
//     // let data1 = data.products[0];
//     // let data2 = data.products[1]
//     // console.log(data);

//     // let product = new Products(data1.id, data1.active, data1.name, 
//     //     data1.price, data1.photo, data1.sku, data1.description);

//     // let product2 = new Products(data2.id, data2.active, data2.name, 
//     //     data2.price, data2.photo, data2.sku, data2.description);
    
//     // document.querySelector('.catalog-products').appendChild( product.getElement() );
//     // document.querySelector('.catalog-products').appendChild( product2.getElement() );

//     data.products.forEach((item)=>{
//         let product = new Products(item.id, item.active, item.name, 
//             item.price, item.photo, item.sku, item.description); 

//         document.querySelector('.catalog-products').appendChild( product.getElement() );      
//     });
// });


/**
 * Создать класс Products
 * Свойста такие же как в БД
 */