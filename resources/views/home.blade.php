<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayTime-Co - Boutique de Jouets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <!-- feuille CSS de la page d'accueil -->
    <style>
        body {
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
        .cart-count {
            background: #ff5722;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 12px;
            margin-left: 5px;
        }
        .card {
            height: 100%;
            transition: transform 0.3s;
            margin-bottom: 20px;
        }
        .card:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .badge-type {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 0.8rem;
        }
        .add-to-cart {
            transition: all 0.3s;
        }
        .added {
            background-color: #28a745 !important;
            border-color: #28a745 !important;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="text-white mb-0">PlayTime-Co</h1>
                <a href="./panier" class="cart-link" id="cartLink">
                    <i class="bi bi-cart-fill"></i> Panier
                    <span class="cart-count" id="cartCount">0</span>
                </a>
            </div>
        </div>
    </header>

    <div class="container py-3">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($jouets as $jouet) <!-- récupération des jouets depuis la BDD -->
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-body position-relative">
                            <span class="badge bg-primary badge-type">{{ $jouet->type }}</span> <!-- récupération du type, nom, et prix des jouets -->
                            <h5 class="card-title">{{ $jouet->nom }}</h5>
                            <p class="card-text text-success fw-bold">{{ number_format($jouet->prix, 2) }} €</p>
                            <p class="text-muted">En stock: {{ $jouet->stock }}</p>
                            <button class="btn btn-outline-primary w-100 add-to-cart" 
                                    data-id="{{ $jouet->id }}"
                                    data-name="{{ $jouet->nom }}"
                                    data-price="{{ $jouet->prix }}"
                                    data-stock="{{ $jouet->stock }}"
                                    data-image="https://via.placeholder.com/100?text={{ urlencode($jouet->nom) }}">
                                Ajouter au panier
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach <!-- fin de la boucle foreach -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialiser le panier depuis le localStorage
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            updateCartCount();
            
            // Gestion des clics sur "Ajouter au panier"
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.dataset.id;
                    const productName = this.dataset.name;
                    const productPrice = parseFloat(this.dataset.price);
                    const productStock = parseInt(this.dataset.stock);
                    const productImage = this.dataset.image;
                    
                    // Vérifier le stock
                    if (productStock <= 0) {
                        alert('Ce produit est en rupture de stock');
                        return;
                    }
                    
                    //fonction pour reduire le stock dans la bdd a implémenter ici, utiliser productStock

                    // Vérifier si le produit est déjà dans le panier
                    const existingItem = cart.find(item => item.id === productId);
                    
                    if (existingItem) {
                        if (existingItem.quantity >= productStock) {
                            alert('Quantité maximale disponible atteinte');
                            return;
                        }
                        existingItem.quantity += 1;
                    } else {
                        cart.push({
                            id: productId,
                            name: productName,
                            price: productPrice,
                            image: productImage,
                            quantity: 1
                        });
                    }
                    
                    // Sauvegarder dans le localStorage
                    localStorage.setItem('cart', JSON.stringify(cart));
                    updateCartCount();
                    
                    // Feedback visuel
                    const originalText = this.textContent;
                    this.textContent = '✓ Ajouté !';
                    this.classList.add('added');
                    setTimeout(() => {
                        this.textContent = originalText;
                        this.classList.remove('added');
                    }, 2000);
                });
            });
            
            // Mettre à jour le compteur du panier
            function updateCartCount() {
                const count = cart.reduce((total, item) => total + item.quantity, 0);
                document.getElementById('cartCount').textContent = count;
            }
        });
    </script>
</body>
</html>