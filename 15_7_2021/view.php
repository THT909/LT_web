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
//Code xử lý, insert dữ liệu vào table
$sql = "SELECT * FROM tin_xahoi";
$ket_qua = $connect->query($sql);
//Nếu kết quả kết nối không được thì xuất báo lỗi và thoát
if (!$ket_qua) {
 die("Không thể thực hiện câu lệnh SQL: " . $connect->connect_error);
 exit();
}
//Dùng vòng lặp while truy xuất các phần tử trong table
while ($row = $ket_qua->fetch_array(MYSQLI_ASSOC)) {
 echo "<p>ID: " . $row['id'] . "</p>";
 echo "<p>Tiêu đề: " . $row['title'] . "</p>";
 echo "<p>Ngày: " . $row['date'] . "</p>";
 echo "<p>Mô tả: " . $row['description'] . "</p>";
 echo "<p>Nội dung: " . $row['content'] . "</p>";
 //Truyền tham số id tới trang update.php
 echo "<p><a href='update.php?id=" . $row['id'] . "'>Update</a></p>";
 echo "<hr>";
 //truyen tham so id toi trang delete
 echo "<p><a href='delete.php?id=" . $row['id'] . "'>Delete</a></p>";
 echo "<hr>";
}
//Đóng kết nối database tintuc
$connect->close();
?>
