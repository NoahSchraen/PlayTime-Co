<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier - PlayTime-Co</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- feille CSS du panier -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .header {
            background-color: #343a40;
            padding: 15px 0;
            margin-bottom: 30px;
        }
        .cart-link {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
       
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        .cart-item {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            align-items: center;
        }
        .product-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            margin-right: 20px;
            border-radius: 4px;
        }
        .product-info {
            flex-grow: 1;
        }
        .product-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
        .product-price {
            color: #e53935;
            font-weight: bold;
            min-width: 100px;
            text-align: right;
        }
        .quantity-control {
            display: flex;
            align-items: center;
            margin: 0 20px;
        }
        .quantity-btn {
            width: 30px;
            height: 30px;
            border: 1px solid #ddd;
            background: #f9f9f9;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .quantity-input {
            width: 50px;
            height: 30px;
            text-align: center;
            margin: 0 5px;
            border: 1px solid #ddd;
        }
        .remove-btn {
            background: none;
            border: none;
            color: #999;
            cursor: pointer;
            font-size: 1.5em;
            margin-left: 10px;
        }
        .remove-btn:hover {
            color: #e53935;
        }
        .cart-summary {
            margin-top: 20px;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 5px;
        }
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
        }
        .total {
            font-size: 1.2em;
            font-weight: bold;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        .checkout-btn {
            display: block;
            width: 100%;
            padding: 15px;
            background: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 1.1em;
            cursor: pointer;
            margin-top: 20px;
            text-align: center;
            text-decoration: none;
        }
        .checkout-btn:hover {
            background: #45a049;
            color: white;
        }
        .empty-cart {
            text-align: center;
            padding: 50px 0;
            color: #777;
        }
        .hidden {
            display: none !important;
        }
    </style>
</head>
<body>
<header class="header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <a href="./" class="text-decoration-none">
                    <h1 class="text-white mb-0">PlayTime-Co</h1>
                </a>
            </div>
        </div>
    </header>

    <div class="container">
        <h1>Mon panier</h1>
        
        <div class="empty-cart" id="emptyCart"> <!-- Affichage si le panier est vide -->
            <h2>Votre panier est vide</h2>
            <p>Parcourez nos produits et ajoutez des articles à votre panier</p>
            <a href="./" class="checkout-btn">Voir les produits</a>
        </div>
        
        <div class="cart-items" id="cartItems">
            <!-- Les articles seront ajoutés dynamiquement -->
        </div>
        
        <div class="cart-summary" id="cartSummary">
            <div class="summary-row">
                <span>Sous-total</span>
                <span id="subtotal">0.00 €</span>
            </div>
            <div class="summary-row">
                <span>Livraison</span>
                <span id="shipping">4.99 €</span>
            </div>
            <div class="summary-row total">
                <span>Total</span>
                <span id="total">0.00 €</span>
            </div>
        </div>
        
        <a href="#" class="checkout-btn hidden" id="proceedCheckout">Passer la commande</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() { //Code javascript fournis par Bootstrap
            let cart = JSON.parse(localStorage.getItem('cart')) || []; //Creation du panier et declaration des constantes
            const cartItemsEl = document.getElementById('cartItems');
            const emptyCartEl = document.getElementById('emptyCart');
            const cartSummaryEl = document.getElementById('cartSummary');
            const proceedCheckoutEl = document.getElementById('proceedCheckout');
            const cartCountHeaderEl = document.getElementById('cartCountHeader');
            
            // Initialiser l'affichage
            toggleCartElements();
            renderCartItems();
            updateCartHeader();
            
            function toggleCartElements() {
                if (cart.length === 0) { //si panier est vide, enlevement de l'affichage du panier (avec objet)
                    emptyCartEl.classList.remove('hidden');
                    cartItemsEl.classList.add('hidden');
                    cartSummaryEl.classList.add('hidden');
                    proceedCheckoutEl.classList.add('hidden');
                } else { //sinon affichage du panier avec objet
                    emptyCartEl.classList.add('hidden');
                    cartItemsEl.classList.remove('hidden');
                    cartSummaryEl.classList.remove('hidden');
                    proceedCheckoutEl.classList.remove('hidden');
                }
            }
            
            function renderCartItems() {
                cartItemsEl.innerHTML = '';
                
                cart.forEach(item => {
                    const cartItemEl = document.createElement('div');
                    cartItemEl.className = 'cart-item';
                    cartItemEl.dataset.productId = item.id;
                    
                    cartItemEl.innerHTML = `
                        <img src="${item.image}" alt="${item.name}" class="product-image">
                        <div class="product-info">
                            <div class="product-title">${item.name}</div>
                        </div>
                        <div class="product-price">${(item.price * item.quantity).toFixed(2)} €</div>
                        <div class="quantity-control">
                            <button class="quantity-btn minus">-</button>
                            <input type="text" class="quantity-input" value="${item.quantity}">
                            <button class="quantity-btn plus">+</button>
                        </div>
                        <button class="remove-btn">×</button>
                    `;
                    
                    cartItemsEl.appendChild(cartItemEl);
                });
                
                addEventListeners();
                updateSummary();
            }
            
            function addEventListeners() {
                // Boutons moins
                document.querySelectorAll('.minus').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const productId = this.closest('.cart-item').dataset.productId;
                        const itemIndex = cart.findIndex(item => item.id === productId);
                        
                        if (cart[itemIndex].quantity > 1) {
                            cart[itemIndex].quantity -= 1;
                        }else {
                            cart.splice(itemIndex, 1);
                        }
                        
                        updateCart();
                    });
                });
                
                // Boutons plus
                document.querySelectorAll('.plus').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const productId = this.closest('.cart-item').dataset.productId;
                        const item = cart.find(item => item.id === productId);
                        
                        //const productStock = parseInt(cartItemEl.dataset.stock);
                        /*if (cart[itemIndex].quantity > 1) {     tentative de vérification de stock avant augmentation quantité dans panier
                            if((cart[itemIndex].quantity -1) > productStock) {
                                alert('Vous ne pouvez pas commander plus que le stock disponible');
                            }
                            */

                        item.quantity += 1;
                        updateCart();
                    });
                });
                
                // Champs de quantité
                document.querySelectorAll('.quantity-input').forEach(input => {
                    input.addEventListener('change', function() {
                        const productId = this.closest('.cart-item').dataset.productId;
                        const item = cart.find(item => item.id === productId);
                        const newQuantity = parseInt(this.value) || 1;
                        item.quantity = newQuantity;
                        updateCart();
                    });
                });
                
                // Boutons de suppression
                document.querySelectorAll('.remove-btn').forEach(btn => {
                    btn.addEventListener('click', function() {
                        const productId = this.closest('.cart-item').dataset.productId;
                        cart = cart.filter(item => item.id !== productId);
                        updateCart();
                    });
                });
                
                // Bouton de commande
                proceedCheckoutEl.addEventListener('click', function(e) {
                    e.preventDefault();
                    alert(`Commande passée ! Total: ${document.getElementById('total').textContent}`);
                    // Ici vous pourriez vider le panier après la commande
                     cart = [];
                    updateCart();
                });
            }

            //Mise a jour du résumé de la commande
            function updateSummary() {
                const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                const shipping = subtotal > 50 ? 0 : 4.99; // Livraison gratuite si > 50€
                const total = subtotal + shipping;
                
                document.getElementById('subtotal').textContent = subtotal.toFixed(2) + ' €';
                document.getElementById('shipping').textContent = shipping.toFixed(2) + ' €';
                document.getElementById('total').textContent = total.toFixed(2) + ' €';
            }
            
            function updateCart() {
                localStorage.setItem('cart', JSON.stringify(cart));
                renderCartItems();
                toggleCartElements();
                updateCartHeader();
            }
            
            function updateCartHeader() {
                const count = cart.reduce((total, item) => total + item.quantity, 0);
                cartCountHeaderEl.textContent = count;
            }
        });
    </script>
</body>
</html>