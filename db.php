<?php
// Kết nối đến MySQL
$conn = mysqli_connect('localhost', 'root', '', 'newsql');

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối không thành công".mysqli_connect_error());
}
mysqli_set_charset($conn, 'UTF8');
?>