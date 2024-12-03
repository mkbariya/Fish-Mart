<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="QinrR6cvZxizxvCXJzp7yFMo7bqmyAyCsFSgdLOAj4w" />
    <title>FISH MART</title>
    <link rel="stylesheet" href="./css/style.css"> 
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/contentful@9.0.1/dist/contentful.browser.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/contentful@latest/dist/contentful.browser.min.js"></script>
</head>
<body>

<header>
        <a href="index.php" class="logo"><img src="./Images/fish.jpg" alt="fish"></a>
        <div class="twelve">
            <h1>FishMart</h1>
        </div>
        <div class="group">
            <ul class="navigation">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="fishes.html">Fishes</a></li>
                <li><a href="cart.html"><ion-icon name="cart-outline" class="loginbtn"></ion-icon></a></li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li><a href="profile.php"><ion-icon name="person-outline" class="loginbtn"></ion-icon></a></li>
                    <!-- <li><a href="logout.php">Logout</a></li> -->
                <?php else: ?>
                    <li><a href="login.html"><ion-icon name="person-outline" class="loginbtn"></ion-icon></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </header>

<section id="hero">
    <div id="content">
        <h1>Anti Broker System For Fisherman</h1>
        <h2>Experience clear and Simple Fish Selling</h2>
        <p>Get Benifits with right Choice</p>
        <button>Sell</button>
    </div>
</section>
<div class="eight">
    <h1>Features</h1>
  </div>
  
<section id="features" class="section-p1">
    <div class="fe-box">
    
        <img src="./Images/profitable.png" alt="">
        <h6>Profitable</h6>
    </div>
    <div class="fe-box">
        <img src="./Images/Easy to access.png" alt="">
        <h6>Easy to Access</h6>
    </div>
    <div class="fe-box">
        <img src="./Images/ps-ips-us.png" alt="">
        <h6>Instant paymnent</h6>
    </div>
    <div class="fe-box">
        <img src="./Images/ratings and reviews.jpg" alt="">
        <h6>Review and rating
        </h6>
    </div>
    <div class="fe-box">
        <img src="./Images/24.png" alt="">
        <h6>24/7 support</h6>
    </div>
</section>

<section id="product-1" class="section-p1">
    <div class="nine">
        <h1>Sea Fish<span>Sell Your Fishes with the best prices</span></h1>
      </div>
<div class="pro-container">
    <!-- Dynamically loaded products will be injected here by JavaScript -->    
    
</div>

<div id="View" class="view">
    <a href="fishes.html"><button class="more">View More</button></a>
</div>

</section>

<section id="banner" class="section-p1">
    <div class="sign">
        <h4>SIGN Up for Latest Update</h4>
        <p>Get E-mail updates about the Fish Prices</p>
    </div>
    <div class="signbtn">
        <button>Sign Up</button>
    </div>
</section>

<footer class="section_p1">
    <div class="col" id="card1">
        <img src="./Images/fish.jpg" class="logo1" alt="">
       <div class="fish">
        <div class="twelve">
            <h1>FishMart</h1>
          </div>
       </div> 
        <h4>Contact</h4>
        <p><strong>Address: </strong>562 wellington stree xxxxxxx</p>
        <p><strong>Phone: </strong>+91 9484xxxx</p>
            <p><strong>Hours: </strong>10:00 - 18:00, mon-sat</p>
  
</div>
    <div class="col" id="card2">
        <h4>About</h4>
        <a href="#">About Us</a>
        <a href="#">Privacy Policy</a>
        <a href="#">Term & Conditions</a>
        <a href="#">Contact Us</a>
    </div>
    <div class="col" id="card2">
        <h4>My Account</h4>
        <a href="#">Sign In </a>
        <a href="#">View Cart </a>
        <a href="#">View Payment</a>
        <a href="#">Help</a>
    </div>
    <div class="payment">
        <p>Secured Payment Gateway</p>
        <img src="./Images/visa-mastercard-logos.jpg" alt="">
        <img src="./Images/gpay.png" alt="">
        <img src="./Images/phonepe_logo.png" alt="">
        <img src="./Images/paytm.png" alt="">
    </div>
</footer>

<script src="app.js"></script>
</body>
</html>




