<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page - Realistic Frame</title>
    <style>
        /* Base Styles */
        /* Base Styles */
* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    line-height: 1.6;
    color: #333;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

.product-section {
    padding: 1rem;
    max-width: 1400px;
    margin: 0 auto;
    width: 100%;
    flex: 1;
}

.breadcrumb {
    margin-bottom: 1.5rem;
}

.breadcrumb a {
    text-decoration: none;
    color: #666;
    font-size: 0.9rem;
}

.product-header h1 {
    font-size: 1.8rem;
    margin-bottom: 0.5rem;
    color: #222;
    line-height: 1.3;
}

.product-meta {
    font-size: 0.9rem;
    color: #666;
    margin-bottom: 1.5rem;
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
}

.product-container {
    display: flex;
    flex-direction: column;
    gap: 2rem;
}

.product-images {
    position: relative;
    flex: 1;
    position: sticky;
    top: 1rem;
    align-self: flex-start;
}

.product-images img {
    width: 100%;
    height: auto;
    border-radius: 8px;
    aspect-ratio: 1/1;
    object-fit: cover;
}

.product-details {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    flex: 1;
}

.price {
    font-size: 1.8rem;
    font-weight: 700;
    color: #222;
}

.quantity-selector {
    display: flex;
    flex-direction: column;
    gap: 0.5rem;
}

.qty-input {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.qty-input input {
    width: 60px;
    text-align: center;
    padding: 0.5rem;
    border: 1px solid #ddd;
    font-size: 1rem;
    -webkit-appearance: none;
    margin: 0;
}

.add-to-cart {
    width: 100%;
    padding: 1rem;
    background: #000;
    color: white;
    border: none;
    cursor: pointer;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    transition: background 0.2s ease;
}

.add-to-cart:hover {
    background: #333;
}

.product-info-tabs {
    display: flex;
    gap: 1rem;
    margin: 1.5rem 0;
    border-bottom: 1px solid #eee;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.tab {
    padding: 0.75rem 1rem;
    cursor: pointer;
    position: relative;
    color: #666;
    transition: all 0.2s ease;
}

.tab.active {
    color: #000;
    font-weight: 500;
}

.tab.active::after {
    content: '';
    position: absolute;
    bottom: -1px;
    left: 0;
    right: 0;
    height: 2px;
    background: #000;
}

.tab-content {
    display: none;
    padding: 1.5rem 0;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.tab-content.active {
    display: block;
    opacity: 1;
}

.spec-grid {
    display: grid;
    gap: 1.5rem;
    margin-top: 1rem;
}

.spec-item {
    padding: 1rem;
    background: #f8f8f8;
    border-radius: 8px;
}

.shipping-method {
    margin: 1rem 0;
    padding: 1rem;
    background: #f8f8f8;
    border-radius: 8px;
}

.returns-info ul {
    padding-left: 1.5rem;
    margin: 1rem 0;
}

.returns-info li {
    margin: 0.5rem 0;
}

/* Mobile Optimization */
@media (max-width: 767px) {
    .product-header h1 {
        font-size: 1.3rem;
    }

    .price {
        font-size: 1.4rem;
    }

    .product-meta {
        font-size: 0.8rem;
    }

    .qty-input button {
        padding: 0.5rem;
    }

    .spec-item {
        padding: 0.75rem;
    }
}

/* Tablet View */
@media (min-width: 768px) {
    .product-container {
        flex-direction: row;
        gap: 3rem;
    }

    .product-header h1 {
        font-size: 2.2rem;
    }

    .price {
        font-size: 2rem;
    }

    .spec-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Desktop View */
@media (min-width: 1024px) {
    .product-section {
        padding: 2rem 4rem;
    }

    .product-container {
        gap: 4rem;
    }
}
    </style>
</head>
<body>
    <?php
        if (!isset($_GET['id'])) {
            header("Location: shop.php");
            exit();
        }

        $product_id = intval($_GET['id']);

        // Database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "caesers_palace_db";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM product_view WHERE product_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_assoc();

        $conn->close();

        if (!$product) {
            header("Location: shop.php");
            exit();
        }
    ?>
    <div class="product-section">
    <div class="breadcrumb">
    <a href="shop.php">‹ Back to Shop</a>
</div>

<div class="product-header">
    <h1><?php echo htmlspecialchars($product['product_name']); ?></h1>
    <div class="product-meta">
        <span class="product-code"><?php echo htmlspecialchars($product['product_code']); ?></span>
        <span class="product-sub"><?php echo htmlspecialchars($product['product_sub_code']); ?></span>
    </div>
</div>

<div class="product-container">
    <div class="product-images">
        <div class="main-image">
            <img src="<?php echo htmlspecialchars($product['primary_image']); ?>" alt="<?php echo htmlspecialchars($product['product_name']); ?>">
        </div>
    </div>
    <div class="product-details">
    <div class="price">ZMW<?php echo number_format($product['starting_price'], 2); ?></div>
    
    <div class="quantity-selector">
        <label>Quantity</label>
        <div class="qty-input">
            <button class="qty-btn">-</button>
            <input type="number" value="1" min="1">
            <button class="qty-btn">+</button>
        </div>
    </div>

    <button class="add-to-cart">Add to Cart</button>

    <div class="product-info-tabs" role="tablist">
        <div class="tab active" role="tab" aria-selected="true" data-tab="description">Description</div>
        <div class="tab" role="tab" aria-selected="false" data-tab="details">Details</div>
        <div class="tab" role="tab" aria-selected="false" data-tab="shipping">Shipping</div>
        <div class="tab" role="tab" aria-selected="false" data-tab="returns">Returns</div>
    </div>

    <div class="info-content">
        <div class="tab-content active" id="description" role="tabpanel">
            <p><?php echo nl2br(htmlspecialchars($product['product_description'])); ?></p>
            <div class="product-specs">
                <?php if($product['available_sizes']) : ?>
                <p><strong>Available Sizes:</strong> <?php echo htmlspecialchars($product['available_sizes']); ?></p>
                <?php endif; ?>
                
                <?php if($product['available_colors']) : ?>
                <p><strong>Available Colors:</strong> <?php echo htmlspecialchars($product['available_colors']); ?></p>
                <?php endif; ?>
                
                <p><strong>Base Price:</strong> ZMW<?php echo number_format($product['base_price'], 2); ?></p>
            </div>
        </div>

        <div class="tab-content" id="details" role="tabpanel">
            <div class="spec-grid">
                <?php if($product['available_sizes']) : ?>
                <div class="spec-item">
                    <h4>Sizes Available</h4>
                    <p><?php echo htmlspecialchars($product['available_sizes']); ?></p>
                </div>
                <?php endif; ?>

                <?php if($product['available_colors']) : ?>
                <div class="spec-item">
                    <h4>Color Options</h4>
                    <p><?php echo htmlspecialchars($product['available_colors']); ?></p>
                </div>
                <?php endif; ?>

                <div class="spec-item">
                    <h4>Product Code</h4>
                    <p><?php echo htmlspecialchars($product['product_code']); ?></p>
                </div>

                <div class="spec-item">
                    <h4>Inventory</h4>
                    <p><?php echo $product['total_stock'] > 0 ? 'In Stock' : 'Out of Stock'; ?></p>
                </div>
            </div>
        </div>

        <!-- Shipping and Returns tabs remain static as they're not in the database -->
        <div class="tab-content" id="shipping" role="tabpanel">
            <div class="shipping-info">
                <div class="shipping-method">
                    <h4>Standard Shipping</h4>
                    <p>ZMK5.00 - 3-5 business days</p>
                </div>
                <div class="shipping-method">
                    <h4>Express Shipping</h4>
                    <p>ZMK10.00 - 1-2 business days</p>
                </div>
                <p class="shipping-note">* Orders processed within 24hrs<br>* International shipping available</p>
            </div>
        </div>

        <div class="tab-content" id="returns" role="tabpanel">
            <div class="returns-info">
                <p>30-day satisfaction guarantee:</p>
                <ul>
                    <li>Original packaging required</li>
                    <li>Undamaged items only</li>
                    <li>Free returns for defective items</li>
                    <li>Refunds processed within 5 business days</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
    </div>

    <script>
        // Tab Functionality
        const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active states
                tabs.forEach(t => t.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                // Add active states
                tab.classList.add('active');
                const target = document.getElementById(tab.dataset.tab);
                target.classList.add('active');

                // Update ARIA states
                tabs.forEach(t => t.setAttribute('aria-selected', 'false'));
                tab.setAttribute('aria-selected', 'true');
            });
        });

        // Quantity Selector
        document.querySelectorAll('.qty-btn').forEach(button => {
            button.addEventListener('click', (e) => {
                const input = e.target.parentElement.querySelector('input');
                let value = parseInt(input.value);

                if(e.target.textContent === '-') {
                    input.value = value > 1 ? value - 1 : 1;
                } else {
                    input.value = value + 1;
                }
            });
        });

        // Input Validation
        document.querySelectorAll('.qty-input input').forEach(input => {
            input.addEventListener('change', (e) => {
                if(e.target.value < 1 || isNaN(e.target.value)) {
                    e.target.value = 1;
                }
            });
        });
    </script>
</body>
</html>