<?php

session_start();

// Hàm để xóa sản phẩm khỏi giỏ hàng dựa trên index của sản phẩm
function removeFromCart($index)
{
  if (isset($_SESSION['cart']) && isset($_SESSION['cart'][$index])) {
    unset($_SESSION['cart'][$index]);
    // Điều chỉnh lại index để giữ cho mảng liên tục
    $_SESSION['cart'] = array_values($_SESSION['cart']);
  }
}

// Xử lý yêu cầu xóa sản phẩm
if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {
  $index = intval($_GET['remove']);
  removeFromCart($index);
  header('Location: cart.php');
}

function calculateTotal() {
  $total = 0;
  if (isset($_SESSION['cart'])) {
      foreach ($_SESSION['cart'] as $item) {
          $total += $item['quantity'] * 78; // Giá sản phẩm là $78, bạn có thể thay đổi theo giá của sản phẩm thực tế
      }
  }
  return $total;
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
        <li><a href="shop.html">Shop</a></li>
        <li><a href="blog.html">Blog</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="contact.html">Contact</a></li>
        <li id="lg-bag">
          <a class="active" href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
        </li>
        <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
      </ul>
    </div>
    <div id="mobile">
      <a href="cart.php"><i class="fa-solid fa-bag-shopping"></i></a>
      <i id="bar" class="fas fa-outdent"></i>
    </div>
  </section>

  <section id="page-header" class="about-header">
    <h2>#let's_talk</h2>
    <p>LEAVE A MESSAGE, We love to hear from you!</p>
  </section>

  <section id="cart" class="section-p1">
    <table width="100%">
      <thead>
        <tr>
          <td>Remove</td>
          <td>Image</td>
          <td>Product</td>
          <td>Price</td>
          <td>Quantity</td>
          <td>Subtotal</td>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($_SESSION['cart'])) : ?>
          <?php foreach ($_SESSION['cart'] as $key => $item) : ?>
            <tr>
              <td>
                <a href="?remove=<?php echo $key; ?>"><i class="fa-regular fa-circle-xmark"></i></a>
              </td>
              <td>
                <img src="<?php echo $item['image']; ?>" alt="" />
              </td>
              <td>Cartoon Astronaut T-Shirts</td>
              <td>$78</td>
              <td><?php echo $item['quantity']; ?></td>
              <td>$<?php echo $item['quantity'] * 78; ?></td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="6">
              <p>Không có sản phẩm nào trong giỏ hàng</p>
            </td>
          </tr>
        <?php endif ?>

      </tbody>
    </table>
  </section>

  <section id="cart-add" class="section-p1">
    <div id="coupon">
      <h3>Apply Coupon</h3>
      <div>
        <input type="text" placeholder="Enter Your Coupon" />
        <button class="normal">Apply</button>
      </div>
    </div>

    <div id="subtotal">
      <h3>Cart Totals</h3>
      <table>
        <tr>
          <td>Cart Subtotal</td>
          <td><?php echo calculateTotal() ?></td>
        </tr>
        <tr>
          <td>Shipping</td>
          <td>Free</td>
        </tr>
        <tr>
          <td><strong>Total</strong></td>
          <td><strong><?php echo calculateTotal() ?></strong></td>
        </tr>
      </table>
      <button class="normal">Proceed to checkout</button>
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

  <script src="script.js"></script>
</body>

</html>