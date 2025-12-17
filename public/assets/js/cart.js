let listarProductsCarrito= document.getElementById("product-cart");
let contadorCarrito =  document.getElementById('cart-count')
let listarResumenCarrito =  document.getElementById('resumen-cart')


async function obtenerCart(){
   const res= await fetch(`${route}cart/listar`, { headers: { 'X-Requested-With': 'XMLHttpRequest' }})
    const data = await res.json()
    mostrarCarrito(data)
}

 function addCart(productId){
    console.log(`${route}cart/add/${productId}`)
    fetch(`${route}cart/add/${productId}`, {
         method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                  'Content-Type': 'application/json',
                  'Accept': 'application/json'
            },
            body: JSON.stringify({}) // opcional, si mandas más datos
        })
        .then(res => res.json())
        .then(data => {
            console.log(data)
            if(data.message === "Unauthenticated."){
              alert('Debe iniciar sesion para continuar');
               window.location.href = '/login';
            }
           contadorCarrito.innerText = data.cart_count;
        })
        .catch(err => console.log(err))
}



function mostrarCarrito(data){  
    productosCarrito = data.items || {};
    contadorCarrito.innerHTML = data.cart_count || 0;
    if(Object.keys(productosCarrito).length === 0){
       listarProductsCarrito.innerHTML =  '<h1>No hay productos en el carrito</h1>'
       resumenCarrito(data);
    }else{
        const productoCarritoRender =  Object.entries(productosCarrito).map(([id, product]) => `
         <div class="row align-items-center">
                  <div class="col-lg-6 col-12 mt-3 mt-lg-0 mb-lg-0 mb-3">
                    <div class="product-info d-flex align-items-center">
                      <div class="product-image">
                        <img src="${storageUrl}/${product.image}" alt="Product" class="img-fluid" loading="lazy">
                      </div>
                      <div class="product-details">
                        <h6 class="product-title">${product.name}</h6>
                        <button class="remove-item btn-remove-cart" onclick="eliminarDelCarrito(${product.id})">
                          <i class="bi bi-trash"></i> Eliminar
                        </button>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                    <div class="price-tag">
                      <span class="current-price">${product.price}</span>
                    </div>
                  </div>
                  <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                    <div class="quantity-selector">
                      <button class="quantity-btn decrease">
                        <i class="bi bi-dash"></i>
                      </button>
                      <input type="number" class="quantity-input" value="${product.quantity}" min="1" max="10">
                      <button class="quantity-btn increase">
                        <i class="bi bi-plus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="col-lg-2 col-12 mt-3 mt-lg-0 text-center">
                    <div class="item-total">
                      <span>${product.price * product.quantity}</span>
                    </div>
                  </div>
                </div>
        `).join("");

        listarProductsCarrito.innerHTML = productoCarritoRender;
        resumenCarrito(data);
    }
}


function resumenCarrito(data){
  console.log('resumen', data)
    const resumenCarritoRender = `
            <div class="cart-summary">
              <h4 class="summary-title">Resumen del pedido</h4>

              <div class="summary-item">
                <span class="summary-label">Subtotal</span>
                <span class="summary-value">${data.subtotal}</span>
              </div>

              <div class="summary-item">
                <span class="summary-label">Iva</span>
                <span class="summary-value">${data.iva}</span>
              </div>

              <div class="summary-total">
                <span class="summary-label">Total</span>
                <span class="summary-value" id="cart-total">${data.total}</span>
              </div>

              <div class="checkout-button">
                <a href="${route}checkout" class="btn btn-accent w-100">
                 Ir a pagar <i class="bi bi-arrow-right"></i>
                </a>
              </div>

              <div class="continue-shopping">
                <a href="${route}" class="btn btn-link w-100">
                  <i class="bi bi-arrow-left"></i> Seguir comprando
                </a>
              </div>

              <div class="payment-methods">
                <p class="payment-title">We Accept</p>
                <div class="payment-icons">
                  <i class="bi bi-credit-card"></i>
                  <i class="bi bi-paypal"></i>
                  <i class="bi bi-wallet2"></i>
                  <i class="bi bi-bank"></i>
                </div>
              </div>
            </div>
    `
  listarResumenCarrito.innerHTML = resumenCarritoRender;
    
}

function eliminarDelCarrito(id){
    fetch(`${route}cart/remove/${id}`,  {
        method: 'POST', 
         headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
        })
    .then(res => res.json())
    .then(data => {
        console.log(data)
        obtenerCart()
    })
}

obtenerCart()

