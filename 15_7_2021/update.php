
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
//Lấy dữ liệu từ view.php bằng phương thức GET.
if(isset($_GET['id'])){
 $id = $_GET['id'];
 $sql = "SELECT * FROM tin_xahoi WHERE id= $id";
 $ket_qua = $connect->query($sql);
 while ($row = $ket_qua->fetch_array(MYSQLI_ASSOC)) {
 $title = $row['title'];
 $date = $row['date'];
 $description = $row['description'];
 $content = $row['content'];
?>
<!-- Truyền dữ liệu vào form. -->
<form action="process.php" method="post">
 <table>
 <tr>
 <th>ID:</th>
 <td>
 <input type="hidden" name="id" value="<?php echo $id; ?>">
 <?php echo $id; ?>
 </td>
 </tr>
 <tr>
 <th>Tiêu đề:</th>
 <td><input type="text" name="title" value="<?php echo $title;
?>"></td>
 </tr>
 <tr>
 <th>Ngày tháng:</th>
 <td><input type="date" name="date" value="<?php echo $date;
?>"></td>
 </tr>
 <tr>
 <th>Mô tả:</th>
 <td><input type="text" name="description" value="<?php echo
$description; ?>"></td>
 </tr>
 <tr>
 <th>Nội dung:</th>
 <td><textarea cols="30" rows="7" name="content"><?php echo
$content; ?></textarea></td>
 </tr>
 </table>
 <button type="submit">Gửi</button>
</form>
<?php
 } //Đóng vòng lặp while.
} //Đóng câu lệnh if.
//Đóng kết nối database tintuc
$connect->close();
?>