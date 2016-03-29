<?php
/**
 * Created by PhpStorm.
 * User: DiepTran
 * Date: 3/11/2016
 * Time: 9:55 AM
 */
if(isset($_POST['them'])){
    $tenhienthi=$_POST['tenhienthi'];
    $tendangnhap=addslashes($_POST['tendangnhap']);
    $matkhau=md5($_POST['matkhau']);

    if(trim($tendangnhap)==null||trim($tenhienthi)==null){
        echo"Bạn chưa nhập đủ thông tin";
    }else{
        $sql= "insert into tbl_user(tendangnhap, tenhienthi, matkhau)
                VALUES ('$tendangnhap','$tenhienthi','$matkhau') ";
        if(mysql_query($sql)){
            echo"Done!";
        }
        else{
            echo"Error!";
        }
    }

}

?>

<form action="" method="post">
    <table>
        <a href="?tbl=user/ds">Back to list</a>
        <h2>Thêm người dùng</h2>
        <tr>
            <td>Tên hiển thị</td>
            <td><input type="text" name="tenhienthi"/></td>
        </tr>
        <tr>
            <td>Tên đăng nhập</td>
            <td><input type="text" name="tendangnhap"/></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" name="matkhau"/></td>
        </tr>
        <tr>
            <td><button type="submit" name="them">Thêm</button></td>
            <td><button type="reset" name="nhaplai">Nhập lại</button></td>
        </tr>
    </table>
</form>