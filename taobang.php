<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Tạo bảng sinh viên</title>
    </head>
    <body>
        <?php
            $MYSQL_ADDON_HOST = getenv('MYSQL_ADDON_HOST');
            $MYSQL_ADDON_PORT = getenv('MYSQL_ADDON_PORT');
            $MYSQL_ADDON_DB = getenv('MYSQL_ADDON_DB');
            $MYSQL_ADDON_USER = getenv('MYSQL_ADDON_USER');
            $MYSQL_ADDON_PASSWORD = getenv('MYSQL_ADDON_PASSWORD');
            $MYSQL_ADDON_URI = getenv('MYSQL_ADDON_URI');

            echo "MySQL Uri: " . $MYSQL_ADDON_URI . "<br>";

            // Kết nối đến MySQL
            $conn = mysqli_connect($MYSQL_ADDON_HOST, $MYSQL_ADDON_USER, $MYSQL_ADDON_PASSWORD, $MYSQL_ADDON_DB, $MYSQL_ADDON_PORT);

            // Kiểm tra kết nối
            if ($conn === false) {
                die("ERROR: Không thể kết nối tới csdl. " . mysqli_connect_error() . "<br><br>");
            }

            // Tạo bảng users
            $sql = "CREATE TABLE b1910005_pass_db (
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                mssv   VARCHAR(50) NOT NULL,
                ho_ten VARCHAR(50) NOT NULL,
                nam_sinh INT NOT NULL,
                dienthoai VARCHAR(50) NOT NULL
                
                
            )";
            if (mysqli_query($conn, $sql)) {
                echo "Tạo bảng thành công." . "<br>";
                echo "<script>alert('Đã tạo bảng thành công.');</script>";
            } else {
                echo "ERROR: Không thể thực thi $sql. " . mysqli_error($conn) . "<br>";
                echo "<script>alert('Không thể tạo bảng.');</script>";
            }
        ?>

        
</html>
