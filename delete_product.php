<?php
session_start();

session_start();

// Hàm để xóa sản phẩm khỏi giỏ hàng dựa trên index của sản phẩm
function removeFromCart($index) {
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
}

?>