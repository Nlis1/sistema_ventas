let inputText =  document.getElementById('texto');
let productList = document.getElementById('listar-products');
let categoriesListHeader = document.getElementById('listar-categories-header');
let categoriesList = document.getElementById('listar-categories');
let ordersList =  document.getElementById('listar_orders');


let url = `${route}products/listar`

document.addEventListener("DOMContentLoaded", () => {
  // Carga inicial de todos los productos
  listarProducts(url);

})

async function listarProducts(url) {
  console.log(url)
    const res = await fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' }});
    const data = await res.json();
    products = data;
    console.log(data)
    renderProducts(products)
}

function renderProducts(products){

  const productsRender =  products.map((prod) => `
        <div class="col-lg-3 col-md-6">
          <div class="product-item">
              <div class="product-image">  
                <a href="${baseUrl}/product-detail/${prod.id}">
                <img src="${storageUrl}/${prod.image_product}" alt="Product Image" class="img-fluid" loading="lazy">
                </a>
                <div class="product-actions">
                  <button class="action-btn wishlist-btn">
                    <i class="bi bi-heart"></i>
                  </button>
                </div>
              </div>
              <div class="product-info">  
                <div class="product-category">${prod.name_category}</div>
                <h4 class="product-name"><a href="product-details.html">${prod.name}</a></h4>
                <div class="product-price">${prod.price_venta += prod.price_venta * prod.iva / 100}</div>
              </div>
            </div>
          </div>
        </div>
      `).join("");
    productList.innerHTML = productsRender;
}

async function listarCategories(){
   const res = await fetch(`${route}categories/listar`, { headers: { 'X-Requested-With': 'XMLHttpRequest' }});
    const data = await res.json();
    categories = data;
    console.log(categories);
    renderCategories(categories);
}

function renderCategories(categories){
    const CategoriesRender = categories.map((category) => `
          <li><button class="btn" onclick="listarCategoriosporProductos(${category.id})" >${category.name}</button></li>
    `).join("");

    categoriesListHeader.innerHTML = CategoriesRender;
    categoriesList.innerHTML = CategoriesRender;
}

async function listarCategoriosporProductos(category_id){
    const res = await fetch(`${route}category/${category_id}`, { headers: { 'X-Requested-With': 'XMLHttpRequest' }});
    const data = await res.json();
    products = data;
    if (Array.isArray(products) && products.length === 0) {
      productList.innerHTML = '<h3>No hay productos en esta categoría</h3>';
    } else {
        renderProducts(products); // tu función que pinta productos
    }

}

async function listarOrders(){
    const res = await fetch(`${route}orders/listar`, { headers: { 'X-Requested-With': 'XMLHttpRequest' }});
    const data = await res.json();
    orders = data;
    console.log(orders)
    renderOrders(orders);
}

function renderOrders(orders){
    const OrdersRender = orders.map((order) => {
        const productsHtml= order.details.map(detail => `
              <div class="item">
                 <img src="${baseUrl}/storage/${detail.image}" alt="Product" loading="lazy">
                     <div class="item-info">
                        <h6>${detail.product.name}</h6>
                        <div class="item-meta">
                          <span class="qty">Qty: ${detail.quantity}</span>
                        </div>
                      </div>
                    <div class="item-price">${detail.price.toLocaleString('es-CO', { style: 'currency', currency: 'COP' })}</div>
                </div>
          `).join("");
      
        return  `
            <div class="order-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="order-header">
                          <div class="order-id">
                            <span class="label">Order ID:</span>
                            <span class="value">#${order.code_order}</span>
                          </div>
                          <div class="order-date">${order.created_at}</div>
                        </div>
                        <div class="order-content">
                          <div class="order-info">
                            <div class="info-row">
                              <span>Status</span>
                              <span class="status processing">${order.status}</span>
                            </div>
                            <div class="info-row">
                              <span>Total</span>
                              <span class="price">${order.total.toLocaleString('es-CO', { style: 'currency', currency: 'COP' })}</span>
                            </div>
                          </div>
                        </div>
                        <div class="order-footer">
                          <button type="button" class="btn-details" data-bs-toggle="collapse" data-bs-target="#details1" aria-expanded="false">View Details</button>
                        </div>

                        <!-- Order Details -->
                        <div class="collapse order-details" id="details1">
                          <div class="details-content">
                            <div class="detail-section">
                              <h5>Informacion del pedido</h5>
                             
                            </div>

                            <div class="detail-section">
                             
                              <div class="order-items">
                                ${productsHtml}
                              </div>
                            </div>

                            <div class="detail-section">
                              <h5>Price Details</h5>
                              <div class="price-breakdown">
                                <div class="price-row">
                                  <span>Subtotal</span>
                                  <span>${order.subtotal.toLocaleString('es-CO', { style: 'currency', currency: 'COP' })}</span>
                                </div>
                                <div class="price-row">
                                  <span>Iva</span>
                                  <span>${order.iva.toLocaleString('es-CO', { style: 'currency', currency: 'COP' })}</span>
                                </div>
                                <div class="price-row total">
                                  <span>Total</span>
                                  <span>${order.total.toLocaleString('es-CO', { style: 'currency', currency: 'COP' })}</span>
                                </div>
                              </div>
                            </div>

                          </div>
                        </div>
                      </div>
      `}).join("");

    ordersList.innerHTML =  OrdersRender;
}

function Buscador(e){
  e.preventDefault()  
  const texto = inputText.value.trim();
  console.log("texto", texto);
  if(texto == ""){
      listarProducts(url); 
      console.log('entro')
  }else{
      const urlSearch=`${url}?search=${encodeURIComponent(texto)}`
      listarProducts(urlSearch);
      console.log(urlSearch)
  }
}

listarCategories()
 listarOrders()