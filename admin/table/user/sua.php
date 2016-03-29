<?php
/**
 * Created by PhpStorm.
 * User: DiepTran
 * Date: 3/11/2016
 * Time: 9:55 AM
 */
if(isset($_POST['sua'])){
    $tenhienthi=$_POST['tenhienthi'];
    $tendangnhap=addslashes($_POST['tendangnhap']);
    $matkhau=md5($_POST['matkhau']);

    if(trim($tendangnhap)==null||trim($tenhienthi)==null){
        echo"Bạn chưa nhập đủ thông tin";
    }else{
        $sql="update tbl_user set tendangnhap='$tendangnhap',tenhienthi='$tenhienthi', matkhau='$matkhau' WHERE id={$_GET['id']}";
        if(mysql_query($sql)){
            echo"Done!";
        }
        else{
            echo"Error!";
        }
    }

}
$nd1= mysql_query("select * from tbl_user WHERE id={$_GET['id']}");
$sua= mysql_fetch_object($nd1);
?>

<form action="" method="post">
    <table>

        <h2>Sửa người dùng</h2>
        <a href="?tbl=user/ds">Back to list</a>
        <tr>
            <td>Tên hiển thị</td>
            <td><input type="text" name="tenhienthi" value="<?php echo $sua->tenhienthi ?>"/></td>
        </tr>
        <tr>
            <td>Tên đăng nhập</td>
            <td><input type="text" name="tendangnhap" value="<?php echo $sua->tendangnhap ?>"/></td>
        </tr>
        <tr>
            <td>Mật khẩu</td>
            <td><input type="password" name="matkhau"value="<?php echo$sua->matkhau ?>"/></td>
        </tr>
        <tr>
            <td><button type="submit" name="sua">Lưu thay đổi</button></td>
        </tr>
    </table>
</form>