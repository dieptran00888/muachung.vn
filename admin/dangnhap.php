
<?php
include_once "../connect.php";
    if(!session_start()){
        session_start();
    }
    if(isset($_SESSION['tk'])){
        header('location:index.php');
    }
else{

    if(isset($_POST['dangnhap'])){
        $tendangnhap=($_POST['tendangnhap']);
        $matkhau=($_POST['matkhau']);

        $sql="select *from tbl_user WHERE tendangnhap='$tendangnhap'AND matkhau='$matkhau'";
        $nd=null;
        if(mysql_query($sql)){
            $nd=mysql_fetch_object(mysql_query($sql));
            if($nd!=null){
                $_SESSION['tk']['tenhienthi']=$nd->tenhienthi;
                $_SESSION['tk']['tendangnhap']=$nd->tendangnhap;
                $_SESSION['tk']['id']=$nd->id;
                header('location:index.php');
            }
            else{
                echo"<script>window.alert('Sai thông tin tài khoản')</script>";
                session_destroy();
            }
        }else{
            echo"<script>window.alert('Sai thông tin tài khoản')</script>";
            session_destroy();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Trang đăng nhập người dùng</title>
    <link rel="stylesheet" href="../lip/css/bootstrap.min.css">
    <link rel="stylesheet" href="../lip/css/logincss.css"/>
</head>
<body>
<div class="container">
    <div class="col-md-6 col-md-offset-3">
    <form action="" method="post">
        <table cellpadding="5px">
            <h2>Trang đăng nhập</h2>
            <tr>
                <td>Tên đăng nhập</td>
                <td><input type="text" name="tendangnhap"/></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" name="matkhau"/></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" name="dangnhap">Đăng nhập</button></td>
            </tr>

        </table>
    </form>
    </div>
</div>
<script src="../lip/js/bootstrap.min.js"></script>
<script src="../lip/js/jquery-2.2.1.min.js"></script>

</body>
</html>