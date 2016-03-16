<?php
    if(!session_start()){
        session_start();
    }
    if(isset($_SESSION['tk'])){
        header('location:index.php');
    }
else{
    include_once"../connect.php";
    if(isset($_POST['dangnhap'])){
        $tendangnhap= $_POST['tendangnhap'];
        $matkhau=$_POST['matkhau'];

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
                session_destroy();
                echo"Sai thông tin tài khoản";
            }
        }else{
            session_destroy();
            echo"Sai thông tin tài khoản!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<form action="" method="post">
    <table>
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
            <td><button type="submit" name="dangnhap">Đăng nhập</button></td>
        </tr>

    </table>
</form>
</body>
</html>