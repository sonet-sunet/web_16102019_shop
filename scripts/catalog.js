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
    constructor(id, name, catalog_id, value){
        this.id = id;
        this.name = name;
        this.catalog_id = catalog_id;
        this.value = value;
    }
}

class Catalog{
    constructor(){
        this.el = document.querySelector('.catalog');
        this.id = this.el.getAttribute('data-catalog-id');
        this.products = [];
        this.filters = [];
        this.path = '/handlers/catalog_handler.php';
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
            data.filters.forEach((item)=>{
                this.filters.push(new Filter(
                    item.id, item.name, item.catalog_id, item.value
                ));
            });
            this.hiderPreloader();
            this.render(data);
        });
    }
    render(data){
        this.renderProducts();
        if (rendered == false){
            this.renderFilters();
        }
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
            if(filter.catalog_id == 1){
                filtersFirstList.innerHTML+=  `
                <option value="${filter.name}">${filter.name}</option>
            `;
            }else if (filter.catalog_id == 2) {
                filtersSecondList.innerHTML+=  `
                <option value="${filter.name}">${filter.name}</option>
            `;
            }else if(filter.catalog_id == 3){
                filtersThirdList.innerHTML+=  `
                <option value="${filter.value}">${filter.name}</option>
            `;
            };
        });
        rendered = true;
        let categories, sizes, prices;
        filtersFirstList.addEventListener('change',function(){
            categories = filtersFirstList.value;
            catalog.load(1 ,categories, sizes, prices);
        });
        filtersSecondList.addEventListener('change',function(){
            sizes = filtersSecondList.value;
            catalog.load(1 ,categories, sizes, prices);
        });
        filtersThirdList.addEventListener('change',function(){
            prices = filtersThirdList.value;
            catalog.load(1 ,categories, sizes, prices);
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
let rendered = false;
let catalog = new Catalog();
catalog.load();
