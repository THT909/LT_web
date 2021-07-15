<?php
$username = "root"; // Khai báo username
$password = ""; // Khai báo password
$server = "localhost"; // Khai báo server
$dbname = "tintuc"; // Khai báo database
// Kết nối database tintuc
$connect = new mysqli($server, $username, $password, $dbname);
//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if ($connect->connect_error) {
 die("Không kết nối :" . $connect->connect_error);
 exit();
}
$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$content = $_POST['content'];
//Code xử lý, update dữ liệu vào table dựa theo điều kiện WHERE tại id = 1
$sql = "UPDATE tin_xahoi SET title='$title', description='$description',
content='$content' WHERE id=$id";
if ($connect->query($sql) === TRUE) {
 //Nếu kết quả kết nối thành công, trở về trang view.
 header('Location: view.php');
} else {
 //Nếu kết quả kết nối không được thì trở về update.php đồng thời gán
//giá trị error=1, dựa theo giá trị này trang update.php có thể thông báo
//lỗi cần thiết.
 header('Location: update.php?error=1');
}
//Đóng kết nối database tintuc
$connect->close();
