<?php
if(isset($_POST['them'])){
    $tendanhmuc=$_POST['tendanhmuc'];
    $ghichu=$_POST['ghichu'];
    $danhmuc=$_POST['danhmuc'];

    if(trim($tendanhmuc)==null){
        echo"Bạn chưa nhập tên danh mục!";
    }
    else{
        $sql="insert into tbl_danhmuc(tendanhmuc,ghichu,danhmuc) VALUES ('$tendanhmuc','$ghichu','$danhmuc')";
        if(mysql_query($sql)) echo "Done!";
        else echo"Error!";
    }
}
$dm=mysql_query("select *from tbl_danhmuc");
?>
<h2>Thêm danh mục</h2>
<form action="" method="post">
    <table>
        <a href="?tbl=danhmuc/ds">Back to list</a>
        <tr>
            <td>Tên danh mục</td>
            <td><input type="text" name="tendanhmuc"/></td>
        </tr>
        <tr>
            <td>Ghi chú</td>
            <td><input type="text" name="ghichu"/></td>
        </tr>
        <tr>
            <td>Danh mục</td>
            <td><select name="danhmuc" id="">
                    <option value="">--Chọn danh mục--</option>
                    <?php while($r=mysql_fetch_object($dm)): ?>
                    <option value="<?php $r->id ?>"><?php echo $r->tendanhmuc ?></option>
                    <?php endwhile; ?>
            </select></td>
        </tr>
        <tr>
            <td><button type="submit" name="them">Thêm</button></td>
            <td><button type="reset">Nhập lại</button></td>
        </tr>
    </table>
</form>