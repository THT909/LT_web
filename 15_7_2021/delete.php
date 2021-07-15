<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tintuc";
 
// tạo connection
$conn = new mysqli($servername, $username, $password, $dbname);
// kiểm tra connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//lấy dữ liêu id view 
$id = $_GET['id'];
// lệnh sql xóa 1 bản ghi
$sql = "DELETE FROM tin_xahoi WHERE id= $id";
 
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    header('Location: view.php');
} else {
    echo "Error deleting record: " . $conn->error;
}

   
 
$conn->close();
?>