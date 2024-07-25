<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Lấy dữ liệu từ biểu mẫu

  $size = $_POST['size'];
  $quantity = intval($_POST['quantity']);
  $image = $_POST['image_url'];

  // // Thêm sản phẩm vào giỏ hàng
  $cart_item = [
      'size' => $size,
      'quantity' => $quantity,
      'image' => $image
  ];

  // Kiểm tra xem có tồn tại giỏ hàng chưa
  if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = [];
  }

  // Thêm sản phẩm vào giỏ hàng hoặc cập nhật số lượng nếu đã tồn tại
  $product_exists = false;
  foreach ($_SESSION['cart'] as &$item) {
      if ($item['image'] === $image && $item['size'] === $size) {
          $item['quantity'] += $quantity;
          $product_exists = true;
          break;
      }
  }

  if (!$product_exists) {
      $_SESSION['cart'][] = $cart_item;
  }

  


  // // Chuyển người dùng trở lại trang sản phẩm sau khi thêm vào giỏ hàng
  header('Location: cart.php'); 
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cara</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <section id="header">
    <a href="#"><img src="img/logo.png" alt="" /></a>

    <div>
      <ul id="navbar">
        <li><a href="index.html">Home</a></li>
        <li><a class="active" href="shop.html">Shop</a></li>
        <li><a href="blog.html">Blog</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li id="lg-bag">
          <a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
        </li>
        <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
      </ul>
    </div>
    <div id="mobile">
      <a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
      <i id="bar" class="fas fa-outdent"></i>
    </div>
  </section>

  <section id="prodetails" class="section-p1">
    <div class="single-pro-image">
      <img src="img/products/f1.jpg" width="100%" id="MainImg" alt="" />

      <div class="small-img-group">
        <div class="small-img-col">
          <img src="img/products/f1.jpg" width="100%" class="small-img" alt="" />
        </div>
        <div class="small-img-col">
          <img src="img/products/f2.jpg" width="100%" class="small-img" alt="" />
        </div>
        <div class="small-img-col">
          <img src="img/products/f3.jpg" width="100%" class="small-img" alt="" />
        </div>
        <div class="small-img-col">
          <img src="img/products/f4.jpg" width="100%" class="small-img" alt="" />
        </div>
      </div>
    </div>

    <div class="single-pro-details">
      <form action="http://localhost/Bao%20Cao%20web/product.php" method="POST">
        <h6>Home / T-Shirt</h6>
        <h4>Men's Fashion T-Shirt</h4>
        <h2>$139</h2>
        <select name="size">
          <option disabled>Select Size</option>
          <option>XL</option>
          <option>XXL</option>
          <option >Small</option>
          <option >Large</option>
        </select>
        <input type="number" name="quantity" value="1" min="1" />
        <input type="hidden" name="image_url" value="img/products/f1.jpg">
        <button class="normal">Add To Cart</button>
      </form>



      <h4>Product Details</h4>
      <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam,
        exercitationem quaerat doloribus laboriosam at vitae id quasi
        possimus, nesciunt ipsam dolor totam aliquam aperiam cupiditate
        consectetur quam repellendus non omnis.</span>
    </div>
  </section>

  <section id="product1" class="section-p1">
    <h2>Featured Products</h2>
    <p>Summer Collection New Morden Design</p>
    <div class="pro-container">
      <div class="pro">
        <img src="img/products/n1.jpg" alt="" />
        <div class="des">
          <span>adidas</span>
          <h5>Cartoon Astronaut T-Shirts</h5>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h4>$78</h4>
        </div>
        <a href=""><i class="fa-solid fa-cart-shopping cart"></i></a>
      </div>
      <div class="pro">
        <img src="img/products/n2.jpg" alt="" />
        <div class="des">
          <span>adidas</span>
          <h5>Cartoon Astronaut T-Shirts</h5>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h4>$78</h4>
        </div>
        <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
      </div>
      <div class="pro">
        <img src="img/products/n3.jpg" alt="" />
        <div class="des">
          <span>adidas</span>
          <h5>Cartoon Astronaut T-Shirts</h5>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h4>$78</h4>
        </div>
        <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
      </div>
      <div class="pro">
        <img src="img/products/n4.jpg" alt="" />
        <div class="des">
          <span>adidas</span>
          <h5>Cartoon Astronaut T-Shirts</h5>
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h4>$78</h4>
        </div>
        <a href="#"><i class="fa-solid fa-cart-shopping cart"></i></a>
      </div>
    </div>
  </section>

  <section id="newsletter" class="section-p1 section-m1">
    <div class="newstext">
      <h4>Sign Up For Newsletters</h4>
      <p>
        Get E-mail updates about our latest shop and
        <span>special offers</span>
      </p>
    </div>
    <div class="form">
      <input type="text" placeholder="Your e-mail address" />
      <button class="normal">Sign Up</button>
    </div>
  </section>

  <footer class="section-p1">
    <div class="col">
      <img class="logo" src="img/logo.png" alt="" />
      <h4>Contact</h4>
      <p><strong>Address: </strong>334 NguyenTrai Stress, HaNoi,VietNam</p>
      <p><strong>Phone: </strong>0388299319</p>
      <p><strong>Hours: </strong>10:00 - 18:00, Mon - Sat</p>
      <div class="follow">
        <h4>Follow us</h4>
        <div class="icon">
          <i class="fab fa-facebook-f"></i>
          <i class="fab fa-twitter"></i>
          <i class="fab fa-instagram"></i>
          <i class="fab fa-pinterest-p"></i>
          <i class="fab fa-youtube"></i>
        </div>
      </div>
    </div>

    <div class="col">
      <h4>About</h4>
      <a href="#">About Us</a>
      <a href="#">Delivery Information</a>
      <a href="#">Privacy Policy</a>
      <a href="#">Terms & Conditions</a>
      <a href="#">Contact Us</a>
    </div>

    <div class="col">
      <h4>My Account</h4>
      <a href="#">Sign In</a>
      <a href="#">View Cart</a>
      <a href="#">My Wishlist</a>
      <a href="#">Track My Order</a>
      <a href="#">Help</a>
    </div>

    <div class="col install">
      <h4>Install App</h4>
      <p>From App Store or Google Play</p>
      <div class="row">
        <img src="img/pay/app.jpg" alt="" />
        <img src="img/pay/play.jpg" alt="" />
      </div>
      <p>Secured Payment Gateways</p>
      <img src="img/pay/pay.png" alt="" />
    </div>

    <div class="copyright">
      <p>TTH2023, front-end, HTML CSS & JavaScript - FSoft</p>
    </div>
  </footer>

  <script>
    var MainImg = document.getElementById("MainImg");
    var smallimg = document.getElementsByClassName("small-img");

    smallimg[0].onclick = function() {
      MainImg.src = smallimg[0].src;
    };
    smallimg[1].onclick = function() {
      MainImg.src = smallimg[1].src;
    };
    smallimg[2].onclick = function() {
      MainImg.src = smallimg[2].src;
    };
    smallimg[3].onclick = function() {
      MainImg.src = smallimg[3].src;
    };
  </script>

  <script src="script.js"></script>
</body>

</html>