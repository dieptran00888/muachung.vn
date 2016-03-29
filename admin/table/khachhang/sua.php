<?php
/**
 * Created by PhpStorm.
 * User: DiepTran
 * Date: 3/11/2016
 * Time: 9:55 AM
 */
if(isset($_POST['sua'])){
    $name=$_POST['name'];
    $sdt=$_POST['sdt'];
    $sanpham=$_POST['sp'];
    $diachi=$_POST['diachi'];
    $soluong=$_POST['soluong'];
    $tongtien=$_POST['tongtien'];

    if(trim($name)==null||trim($sdt)==null||trim($diachi)==null){
        echo"Bạn chưa nhập đủ thông tin!";
    }else{
        $sql="update tbl_khachhang set
              tenkh='$name',sdt='$sdt',sanpham='$sanpham',diachi='$diachi',soluong='$soluong',tongtien='$tongtien'";
    }
}
$sua=mysql_fetch_object(mysql_query("SELECT *FROM tbl_khachhang WHERE  id={$_GET['id']}"));
?>
<h2>Sửa khách hàng</h2>
<form action="" method="post">
    <table>
        <a href="?tbl=khachhang/ds">Back to list</a>
        <tr>
            <td>Tên khách hàng</td>
            <td><input type="text" name="name" value="<?php echo $sua->name ?>"/></td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><input type="tel" name="sdt"value="<?php echo$sua->sdt ?>"/></td>
        </tr>
        <tr>
            <td>Sản phẩm</td>
            <td><input type="number" name="sp"/></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" name="diachi"/></td>
        </tr>
        <tr>
            <td>Số lượng</td>
            <td><input type="number" name="soluong"/></td>
        </tr>
        <tr>
            <td>Tổng tiền</td>
            <td><input type="number" name="tongtien"/></td>
        </tr>
        <tr>
            <td><button type="submit" name="sua">Lưu thay đổi</button></td>
        </tr>
    </table>
</form>