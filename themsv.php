<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Thêm sinh viên</title>
    </head>
    <body>
        <h3> Thêm sinh viên </h3>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<label for="mssv">Mssv:</label><br>
		<input type="text" id="mssv" name="mssv"><br>
		<label for="hoten">Họ tên:</label><br>
		<input type="text" id="hoten" name="hoten"><br>
		<label for="namsinh">Năm sinh:</label><br>
		<input type="text" id="namsinh" name="namsinh"><br>
		<label for="sdt">SDT:</label><br>
		<input type="text" id="sdt" name="sdt"><br>
		<input type="submit" name="submit" value="Thêm">
        </form> 

        <?php
            $mssv = $_POST["mssv"];
            $hoten = $_POST["hoten"];
        $namsinh = $_POST["namsinh"];
        $sdt = $_POST["sdt"]; 
    
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
    
                $sql = "INSERT INTO b1910005_pass_db (masv,ho_ten, nam_sinh, dienthoai) VALUES ('$mssv','$hoten', '$namsinh', '$sdt')";
    
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

        
    </body>
</html>
