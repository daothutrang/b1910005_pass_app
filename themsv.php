<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Thêm sinh viên</title>
    </head>
    <body>
        <h3> Thêm sinh viên </h3>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="border">
            Mã sinh viên<BR> <input type="text" name="masv" value ="<?php echo $masv;?>"><BR>
            Họ và tên<BR> <input type="text" name="name" value ="<?php echo $name;?>"><BR>
            Năm sinh<BR> <input type="text" name="birthday" value ="<?php echo $birthday ?>"><BR>
            Điện thoại<BR> <input type="text" name="phone" value ="<?php echo $phone ?>"><BR>
            <input type="submit" name="submit" value="submit">
        </form> 

        <?php
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                $masv = $_POST["masv"];
                $name = $_POST["name"];
                $birthday = $_POST["birthday"];
                $phone = $_POST["phone"];
    
                $MYSQL_ADDON_HOST = getenv('MYSQL_ADDON_HOST');
                $MYSQL_ADDON_PORT = getenv('MYSQL_ADDON_PORT');
                $MYSQL_ADDON_DB = getenv('MYSQL_ADDON_DB');
                $MYSQL_ADDON_USER = getenv('MYSQL_ADDON_USER');
                $MYSQL_ADDON_PASSWORD = getenv('MYSQL_ADDON_PASSWORD');
    
                $conn = mysqli_connect($MYSQL_ADDON_HOST, $MYSQL_ADDON_USER, $MYSQL_ADDON_PASSWORD, $MYSQL_ADDON_DB, $MYSQL_ADDON_PORT);
    
                if (!$conn) {
                    echo "<br>" . "Error: Không thể kết nối với cơ sở dữ liệu.";
                } else {
                    echo "<br>" . "Đã kết nối với CSDL." . "<br>";
                }
    
                $sql = "INSERT INTO b1910005_sinhvien (masv, hoten, namsinh, dienthoai) VALUES ('$masv', '$name', '$birthday', '$phone')";
    
                if (mysqli_query($conn, $sql)) {
                    echo"<br>" . "Thêm sinh viên thành công.";
                    echo "<script>alert('Đã thêm sinh viên thành công.');</script>";
                } else {
                    echo "<br>" . "ERROR: Không thể thêm sinh viên $sql. " . mysqli_error($conn);
                    echo "<script>alert('Không thể thêm sinh viên.');</script>";
                }
    
                mysqli_close($conn);
            }
        ?>

        <!-- Thêm thẻ HTML để tạo liên kết trở về trang index.php -->
        <br> <a href="index.php">Quay lại trang chủ</a> <br>
    </body>
</html>
