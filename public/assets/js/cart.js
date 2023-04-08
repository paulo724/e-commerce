import http from './services/http';
import currency from './services/currency';

const btns_add_to_cart = document.querySelectorAll('.add-to-cart-link');

const cart_amount = document.querySelector('.cart-amunt');
const product_count = document.querySelector('.product-count');
const qty = document.querySelector('.qty');
const remove_from_cart = document.querySelectorAll('.remove');

const plus = document.querySelectorAll('.plus');
const minus = document.querySelectorAll('.minus');

function totalProducts(data){
    let total = 0;
    let total_products_in_cart = 0;
    for (const key in data){
        console.log(data[key]['qty']);
        console.log(data[key]['subtotal']);
        total  += data[key]['subtotal'];
        
    }

    if(product_count){
        total_products_in_cart = Object.keys(data).length;
        product_count.textContent = total_products_in_cart;
    }
    console.log(data);
    if(cart_amount){
        console.log(total);
        cart_amount.textContent = currency(total);
    }
}

btns_add_to_cart.forEach(btn =>{
    btn.addEventListener('click', async (event) =>{
        try{
            event.preventDefault();
            const id = +btn.getAttribute('data-id');
            let quantity = 1;
            if(qty){
                quantity = +qty.value;
            }

            const {data} = await http.post('?inc=add-to-cart', {id, quantity});
            totalProducts(data);
        }catch(error){
            console.log(error);
        }

    });
});

async function getProducts(){
    try {
        const {data} = await http.post('?inc=get-products');
        totalProducts(data);
    }catch (error){
        console.log(error);
    }
}

getProducts();

remove_from_cart.forEach(btn_remove =>{
    btn_remove.addEventListener('click', async (event) =>{    
        event.preventDefault();
        const id = btn_remove.dataset.id;

        await http.get('?inc=cart-remove', {
            params:{
                id
            }
        });
        window.location.reload();
    });
});

plus.forEach(btn_plus =>{
    btn_plus.addEventListener('click', async (event) =>{
        try {
            event.preventDefault();
            const id = btn_plus.dataset.id;
            const qtyProduct = document.querySelector('#qty'+id);
    
            qtyProduct.value++;
            await http.post('?inc=add-to-cart', {id, quantity:+qtyProduct.value, qtyTotal:true});
            window.location.reload();
            //console.log(data);
        } catch (error) {
            console.log(error);
        }

    });
});

minus.forEach(btn_minus =>{
    btn_minus.addEventListener('click', async (event) =>{

        try {
            event.preventDefault();
            const id = btn_minus.dataset.id;
            const qtyProduct = document.querySelector('#qty'+id);
            const valueInput = Number(qtyProduct.value) - 1;
            if(valueInput < 1){
                alert('Quantidade miníma de produtos!');
                return;
            }
            qtyProduct.value = valueInput;
            await http.post('?inc=add-to-cart', {id, quantity:+qtyProduct.value, qtyTotal:true});
            window.location.reload();

        } catch (error) {
            console.log(error);
        }

    });
});