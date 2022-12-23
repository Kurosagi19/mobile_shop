<?php
if (isset($_POST['sbm'])) {
    // Kiểm tra dữ liệu truyền từ client lên server
    // echo "<pre>";
    // print_r($_POST);
    // die();
    $prd_name = $_POST['prd_name'];
    $prd_price = $_POST['prd_price'];
    $prd_warranty = $_POST['prd_warranty'];
    $prd_accessories = $_POST['prd_accessories'];
    $prd_promotion = $_POST['prd_promotion'];
    $prd_new = $_POST['prd_new'];
    $prd_id = $_POST['prd_id'];
    $prd_status = $_POST['prd_status'];
    if(isset($_POST['prd_featured'])) {
        $prd_featured = 0;
    } else {
        $prd_featured = $_POST['prd_featured'];
    }
    $prd_details = $_POST['prd_details'];
    $prd_image = $_POST['prd_image']['name'];
    $prd_tmp_image = $_POST['prd_tmp_image']['name'];
    // Thêm dữ liệu vào Database
    // Nếu là chuỗi thì giá trị truyền vào phải bao bởi dấu nháy đơn còn là số thì không cần
    $sqlInsertProduct = "INSERT INTO products (prd_id, cat_id, prd_name, prd_image, prd_price, prd_warranty, prd_accessories, prd_new, prd_promotion, prd_status, prd_featured, prd_details) VALUES ($prd_id, $cat_id, '$prd_name', '$prd_image', $prd_price, '$prd_warranty', '$prd_accessories', '$prd_new', '$prd_promotion', $prd_status, $prd_featured, '$prd_details')";
    // Kết nối đến Database
    include_once("../db.php");
    mysqli_query($conn, $sqlInsertProduct);
    // Upload file ảnh
    move_uploaded_file($prd_tmp_image, "images/" . $prd_image);
    // Chuyển về trang product.php
    header("Location: product.php");
}
?>