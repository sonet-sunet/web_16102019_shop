
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
class Filter{
    constructor(id, name, list){
        this.id = id;
        this.name = name;
        this.list = list
    }
}

class Catalog{
    constructor(){
        this.el = document.querySelector('.catalog');
        this.id = this.el.getAttribute('data-catalog-id');
        this.products = [];
        this.filters = [];
        this.path = '/handlers/catalog_handler.php';

        this.initFilters();
    }

    initFilters(){
        let filtersFirstList = this.el.querySelector('.catalog-filters-form-first');
        let filtersSecondList = this.el.querySelector('.catalog-filters-form-second');
        let filtersThirdList = this.el.querySelector('.catalog-filters-form-third');

        filtersFirstList.addEventListener('change',function(){
            if( filtersFirstList.classList.contains('proccessing') ) return;
            categories = filtersFirstList.value;
            catalog.load(1 ,categories, sizes, prices);
            categories = 0;
        });
        filtersSecondList.addEventListener('change',function(){
            sizes = filtersSecondList.value;
            catalog.load(1 ,categories, sizes, prices);
            sizes = 0;
        });
        filtersThirdList.addEventListener('change',function(){
            prices = filtersThirdList.value;
            catalog.load(1, categories, sizes, prices);
            prices = 0;
        });
    }
    load(nowPage = 1, categ = 1, size = 1, price = 1){
        
        this.showPreloader();
        let xhr = new XMLHttpRequest();

        xhr.open('GET', this.path + `?id=${this.id}&now_page=${nowPage}&categories=${categ}&sizes=${size}&prices=${price}`);
        xhr.send();
        console.log(categ, size, price);
        
        
        xhr.addEventListener('load', ()=>{
            this.clear();
            let data = JSON.parse(xhr.responseText);

            data.products.forEach((item)=>{
                this.products.push(new Products(
                    item.id, item.active, item.name, item.price, item.photo, item.sku, item.description
                ));    
            });
            data.filters.categories.forEach((item)=>{
                this.filters.push(new Filter(
                    item.id, item.name, item.list = "categories"
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
        let filtersFirstList = this.el.querySelector('.catalog-filters-form-first');
        let filtersSecondList = this.el.querySelector('.catalog-filters-form-second');
        let filtersThirdList = this.el.querySelector('.catalog-filters-form-third');

        this.filters.forEach(filter => {
            if (filter.list == "categories"){
                filtersFirstList.innerHTML+=  `
                <option value="${filter.name}">${filter.name}</option>
            `;
            }
        
            // }else if (filter.catalog_id == 2) {
            //     filtersSecondList.innerHTML+=  `
            //     <option value="${filter.name}">${filter.name}</option>
            // `;
            // }else if(filter.catalog_id == 3){
            //     filtersThirdList.innerHTML+=  `
            //     <option value="${filter.value}">${filter.name}</option>
            // `;
            
        });
        
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
                this.load(num, categories, sizes, prices);
            });

        }

    }
    clearFilters(){
        this.filters = [];
        this.el.querySelector('.catalog-filters-form-first').innerHTML = "<option disabled selected>Категория</option>";
        this.el.querySelector('.catalog-filters-form-second').innerHTML = "<option disabled selected>Размер</option>";
        this.el.querySelector('.catalog-filters-form-third').innerHTML = "<option disabled selected>Стоимость</option>";
    }
    clear(){
        this.el.querySelector('.catalog-products').innerHTML = '';
        this.el.querySelector('.catalog-pagination').innerHTML = '';
        this.products = [];
        this.clearFilters();
        
        console.log(catalog);
    }
    showPreloader(){
        this.el.querySelector('.catalog-preloader').style.display = 'block';
    }
    hiderPreloader(){
        this.el.querySelector('.catalog-preloader').style.display = 'none';
    }
}
 
var categories, sizes, prices;
let catalog = new Catalog();
catalog.load();

