<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Paul Moses Miyoba Simpande Jr">
        <link rel="stylesheet" href="src/css/styles.css">
        <!--=============== UNICONS ===============-->
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

        <!--=============== REMIXICONS ===============-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css">
    
        <!--=============== BOXICONS ================-->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <title>Shop</title>
    </head>
    <body>
        <!--======================================================================-->
        <!--=============================== HEADEER ==============================-->
        <!--======================================================================-->
        <header class="header" id="header">
            <nav class="nav container">
              <img
                src="src/images/logo/Caesars_Palace_gym_logo.png"
                alt="Logo"
                class="nav__logo"
              />
              <div class="nav__toggle" id="nav-toggle">
                <i class="ri-menu-line"></i>
              </div>
              <div class="nav__menu_container" id="nav-menu">
                <div class="nav__close" id="nav-close">
                  <i class="ri-close-circle-fill"></i>
                </div>
                <div class="nav__menu">
                  <ul class="nav__list">
                    <li><a href="index.html" class="nav__link">Home</a></li>
                        <li><a href="about.html" class="nav__link">About</a></li>
                        <li><a href="plans.html" class="nav__link">Plans</a></li>
                        <li><a href="classes.html" class="nav__link">Classes</a></li>
                        <li><a href="shop.html" class="nav__link">Shop</a></li>
                        <li><a href="profile.html" class="nav__link">Profile</a></li>
                </ul>
                </div>
                <div class="nav__search">
                  <div class="search_box">
                    <input type="search" placeholder="Search" />
                    <a href="#">
                      <i class="ri-search-eye-line scope"></i>
                    </a>
                  </div>
                  <div class="membership_bar">
                    <!-- Trigger Icon (remains the same) -->
                    <i id="cart-box" aria-controls="cart-icon" class="ri-shopping-bag-3-fill cartion"></i>

                    <!--=========================================-->
                    <!-- CART BOX -->
                    <div id="cart-icon" class="cart-icon" data-visible="false">
                    <!-- Top Bar: Title + Close Button -->
                    <div class="shopping">
                        <p>Cart (4 items)</p>
                        <i class="ri-close-circle-fill cartion"></i>
                    </div>

                    <!-- Cart Items Container -->
                    <div class="cart-items">
                        <!-- Single Cart Item -->
                        <div class="cart-item">
                        <img
                            src="https://via.placeholder.com/60"
                            alt="Product 1"
                            class="cart-item-img"
                        />
                        <div class="cart-item-info">
                            <p class="cart-item-name">I'm a product</p>
                            <p class="cart-item-meta">Color: Black</p>
                            <div class="cart-item-quantity">
                            <button class="quantity-btn">-</button>
                            <input type="number" value="1" min="1" />
                            <button class="quantity-btn">+</button>
                            </div>
                        </div>
                        <div class="cart-item-price">
                            <p>ZK85.00</p>
                            <button class="remove-item">
                            <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                        </div>

                        <!-- Repeat for other items as needed -->
                        <div class="cart-item">
                        <img
                            src="https://via.placeholder.com/60"
                            alt="Product 2"
                            class="cart-item-img"
                        />
                        <div class="cart-item-info">
                            <p class="cart-item-name">I'm a product</p>
                            <p class="cart-item-meta">ZK20.00</p>
                            <div class="cart-item-quantity">
                            <button class="quantity-btn">-</button>
                            <input type="number" value="2" min="1" />
                            <button class="quantity-btn">+</button>
                            </div>
                        </div>
                        <div class="cart-item-price">
                            <p>ZK40.00</p>
                            <button class="remove-item">
                            <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                        </div>

                        <div class="cart-item">
                        <img
                            src="https://via.placeholder.com/60"
                            alt="Product 3"
                            class="cart-item-img"
                        />
                        <div class="cart-item-info">
                            <p class="cart-item-name">I'm a product</p>
                            <p class="cart-item-meta">Size: Large</p>
                            <div class="cart-item-quantity">
                            <button class="quantity-btn">-</button>
                            <input type="number" value="1" min="1" />
                            <button class="quantity-btn">+</button>
                            </div>
                        </div>
                        <div class="cart-item-price">
                            <p>ZK25.00</p>
                            <button class="remove-item">
                            <i class="ri-delete-bin-line"></i>
                            </button>
                        </div>
                        </div>
                    </div>

                    <!-- Cart Summary -->
                    <div class="cart-summary">
                        <p class="cart-subtotal">
                        Subtotal <span>ZK150.00</span>
                        </p>
                        <p class="cart-taxes">Taxes and shipping are calculated at checkout.</p>
                        <button class="cart-checkout">Checkout</button>
                        <a href="#" class="cart-view">View Cart</a>
                    </div>
                    </div>
                    <!--=========================================-->
      
                    <button id="loginTrigger">Login</button>
                    <i class="ri-notification-2-fill cartion"></i>
                  </div>
                </div>
          
              </div>
            </nav>
          </header>      
        <!--======================================================================-->
        <!--=============================== HEADEER ==============================-->
        <!--======================================================================-->
        <!-- Login Popup -->
        <div class="login-modal-overlay" id="loginOverlay">
          <div class="login-modal-container">
            <span class="login-close-btn">&times;</span>
            <div class="container">
                <div class="form-box login">
                    <form action="">
                        <h1>Login</h1>
                        <div class="input-box">
                            <input type="email" placeholder="Email" required>
                            <i class='bx bxs-user' ></i>
                        </div>
                        <div class="input-box">
                            <input type="password" placeholder="Password" required>
                            <i class='bx bxs-lock-alt' ></i>
                        </div>
                        <div class="forgot-link">
                            <a href="#">Forgot Password?</a>
                        </div>
                        <button type="submit" class="btn">Login</button>
                    </form>
                </div>
                <div class="form-box register">
                    <form action="">
                        <h1>Registration</h1>
                        <br><br>
                        <div class="reg-btn">
                            <a href="register.html">Register</a>
                        </div>
                    </form>
                </div>
                <div class="toggle-box">
                    <div class="toggle-panel toggle-left">
                        <h1>Hello, Welcome!</h1>
                        <p>Don't have an account?</p>
                        <button class="btn register-btn">Register</button>
                    </div>
                    <div class="toggle-panel toggle-right">
                        <h1>Welcome Back!</h1>
                        <p>Already have an account?</p>
                        <button class="btn login-btn">Login</button>
                    </div>
                </div>
            </div>
          </div>
        </div>
        
        <!--======================================================================-->
        <!--=============================== PRODUCTS =============================-->
        <!--======================================================================-->
        <?php
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "caesers_palace_db";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch products
            $sql = "SELECT * FROM product_view";
            $result = $conn->query($sql);
            $products = $result->fetch_all(MYSQLI_ASSOC);
            $product_count = count($products);
            $conn->close();
        ?>
        <section class="product-section">
            <div class="breadcrumb">
                <a href="index.html">Home</a> &gt; <span>All Products</span>
            </div>
            <div class="section-header">
                <h1>All Products</h1>
                <span class="product-count"><?php echo $product_count; ?> products</span>
            </div>
            
            <button class="mobile-filter-trigger">☰ Filter & Sort</button>
            
            <div class="product-container">
                <aside class="filters">
                    <h3>Filter by</h3>
                    <div class="filter-group">
                        <h4>Price</h4>
                        <div class="price-range">
                            <input type="range" class="slider" min="7" max="130" value="130">
                            <div class="price-limits">
                                <span>ZMW7</span>
                                <span>ZMW130</span>
                            </div>
                        </div>
                    </div>
                    <div class="filter-group">
                        <h4>Color</h4>
                        <div class="color-filters">
                            <button class="color-option" style="background: #ff0000"></button>
                            <button class="color-option" style="background: #00ff00"></button>
                            <button class="color-option" style="background: #0000ff"></button>
                            <button class="color-option" style="background: #000000"></button>
                            <button class="color-option" style="background: #ffffff"></button>
                        </div>
                    </div>
                    <div class="filter-group">
                        <h4>Size</h4>
                        <div class="size-filters">
                            <button class="size-option">S</button>
                            <button class="size-option">M</button>
                            <button class="size-option">L</button>
                            <button class="size-option">XL</button>
                        </div>
                    </div>
                </aside>

                <div class="product-grid">
                    <div class="sorting">
                        <!-- Sorting options remain unchanged -->
                    </div>

                    <div class="products">
                        <?php foreach ($products as $product): ?>
                        <div class="product-card" onclick="window.location.href='product.php?id=<?php echo $product['product_id']; ?>'">
                            <div class="product-image">
                                <img src="<?php echo htmlspecialchars($product['primary_image']); ?>" 
                                    alt="<?php echo htmlspecialchars($product['product_name']); ?>">
                            </div>
                            <h3><?php echo htmlspecialchars($product['product_name']); ?></h3>
                            <p class="price">ZMW<?php echo number_format($product['starting_price'], 2); ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <!--======================================================================-->
        <!--=============================== PRODUCTS =============================-->
        <!--======================================================================-->
        
        <!--======================================================================-->
        <!--================================ FOOTER ==============================-->
        <!--======================================================================-->
        <footer class="footer">
            <div class="footer__container">
            <div class="footer__left">
                <h2>Let's Get Moving</h2>
                <p>Send Inquries or complaints</p>
                <form class="footer__form">
                <div class="form-row">
                    <input type="text" placeholder="First name *" required>
                    <input type="text" placeholder="Last name *" required>
                </div>
                <div class="form-row">
                    <input type="email" placeholder="Email *" required>
                    <input type="tel" placeholder="Phone" required>
                </div>
                <textarea placeholder="Type your message here..."></textarea>
                <button type="submit">Submit</button>
                </form>
            </div>
            <div class="footer__right">
                <address>
                <p>Nationalist Road 2046</p>
                <p>Kamwala South, Lusaka</p>
                <p>Email: simpandepauul03@gmail.com</p>
                <hr>
                <p>Tel: +260-76-833-2823 | Fax: +260-76-833-2823</p>
                <button class="footer__cta">Book A Trial Class Now</button>
                </address>
                <div class="social_links">
                <ul class="footer__links">
                    <li><a href="index.html" class="nav__link">Home</a></li>
                    <li><a href="about.html" class="nav__link">About</a></li>
                    <li><a href="plans.html" class="nav__link">Plans</a></li>
                    <li><a href="classes.html" class="nav__link">Classes</a></li>
                    <li><a href="shop.html" class="nav__link">Shop</a></li>
                    <li><a href="profile.html" class="nav__link">Profile</a></li>
                </ul>
                <div class="footer__socials">
                    <a href="#" aria-label="Facebook">
                    <i class="ri-youtube-fill"></i>
                    </a>
                    <a href="#" aria-label="Facebook">
                    <i class="ri-facebook-fill"></i>
                    </a>
                    <a href="#" aria-label="Instagram">
                    <i class="ri-instagram-fill"></i>
                    </a>
                </div>
                </div>
            </div>
            </div>
            <div class="footer__bottom">
            <hr>
            <p>&#169; All Rights Reserved By Paul M.M Simpande Jr BIT23118438</p>
            </div>
        </footer>    
        <!--======================================================================-->
        <!--================================ FOOTER ==============================-->
        <!--======================================================================-->
        
        <!--=============== MAIN JS ===============-->
        <script src="src/js/script.js"></script>
    </body>
</html>