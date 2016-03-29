<?php include_once"connect.php" ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>muachung.vn</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="lip/css/demo.css"/>
    <link rel="stylesheet" href="lip/css/formdangky.css"/>
    <link rel="stylesheet" href="lip/css/style_second.css"/>
</head>
<body>
<div class="wapper">
    <?php include_once"code/header.php" ?>
    <div class="container">
        <div class="main">
            <?php include_once"code/nav.php"?>
            <div class="col-md-9">
                <!--               noidung cua bai viet-->
                <?php
                ob_start();
                //mo ket noi
                include_once"connect.php";

                session_start();
                if(isset($_POST['submit']))
                {
                    foreach($_POST['qty'] as $key=>$value)
                    {
                        if( ($value == 0) and (is_numeric($value)))
                        {
                            unset ($_SESSION['cart'][$key]);
                        }
                        elseif(($value > 0) and (is_numeric($value)))
                        {
                            $_SESSION['cart'][$key]=$value;
                        }
                    }
                    header("location:cart.php");
                }
                if(isset($_POST['muahang'])) {

                    foreach ($_SESSION['cart'] as $key => $value) {
                        $item[] = $key;
                    }
                    $str = implode(",", $item);
                    $tongtien = '';
                    $sql = "select * from tbl_sanpham where id in ($str)";
                    $query = mysql_query($sql);

                    while( $row = mysql_fetch_array($query)){
                        $tenkh = $_POST['tenkh'];
                        $sdt = $_POST['sdt'];
                        $diachi = $_POST['diachi'];
                        $soluong = ($_SESSION['cart'][$row['id']]);
//        $masp = $row['masp'];
                        $tensp = $row['tensp'];
                        $gia = $row['gia'];
                        $thanhtien =$_SESSION['cart'][$row['id']]*$row['gia'];

                        $kt = true;
                        if (trim($tenkh) == " ") {
                            echo '<div style="color: red">Bạn phải điền đầy đủ thông tin</div>';
                            $kt = false;
                        }
                        if (trim($sdt) == "") {
                            echo '<div style="color: red">Bạn phải điền đầy đủ thông tin</div>';
                            $kt = false;
                        }
                        if (trim($diachi) == "") {
                            echo '<div style="color: red">Bạn phải điền đầy đủ thông tin</div>';
                            $kt = false;
                        }
                        if ($kt == true) {
                            $sql = "INSERT INTO tbl_khachhang(tenkh, sdt, sanpham, diachi, soluong,gia, tongtien) VALUES ('$tenkh','$sdt','$tensp', '$diachi','$soluong','$gia','$thanhtien')";
                            if (mysql_query($sql)) {
                                echo "<div style='color: red'>đã mua thành công</div>";
//                header("location:index.php");

                            } else {
                                echo "<div style='color: red'>Không thành công</div>";
                            }
                        }
                    }
                }
                ?>
                <?php
                $ok=1;
                if(isset($_SESSION['cart']))
                {
                    foreach($_SESSION['cart'] as $k => $v)
                    {
                        if(isset($k))
                        {
                            $ok=2;
                        }
                    }
                }
                if($ok == 2)
                {
                    echo "<form action='cart.php' method='post'>";
                    foreach($_SESSION['cart'] as $key=>$value)
                    {
                        $item[]=$key;
                    }
                    $str=implode(",",$item);
                    $tongtien='';
                    $sql="select * from tbl_sanpham where id in ($str)";
                    $query=mysql_query($sql);
                    while($row=mysql_fetch_array($query))
                    {
                        echo "<div class='pro'>";
//            echo "<h3>$row[masp]</h3>";


                        echo "Tên sản phẩm: $row[tensanpham] -  Gia:" . number_format($row['gia'],0). "VNĐ<br />";
                        echo "<p align='right'>So Luong: <input type='text' name='qty[$row[id]]' size='5' value='{$_SESSION['cart'][$row['id']]}'> - ";
                        echo "<a href='delcart.php?productid=$row[id]'>Xóa sản phẩm này</a></p>";
                        echo "<p align='right'> Giá tiền cho món hàng: ". number_format($_SESSION['cart'][$row['id']]*$row['gia'],0) ." VNĐ</p>";
                        echo "</div>";
                        $tongtien+=$_SESSION['cart'][$row['id']]*$row['gia'];

                    }
                    echo "<div class='pro' align='right'>";
                    echo "<b>Tổng tiền cho các món hàng: <font color='red'><input name='thanhtien' value=". number_format($tongtien,0) ." VND</font>VNĐ</b>";
                    echo "</div>";
                    echo "<input type='submit' name='submit' value='Cập nhật giở hàng'>";
                    echo "<div class='pro' align='center'>";
                    echo "<b><a href='index.php'>Mua hàng tiếp</a> - <a href='delcart.php?productid=0'>Xóa bỏ giỏ hàng</a></b>";
                    echo "</div>";
                }
                else
                {
                    echo "<div class='pro'>";
                    echo "<p align='center'>Bạn không có món hàng nào trong giỏ hàng<br /><a href='index.php'>Mua hàng</a></p>";
                    echo "</div>";
                }
                ?>
                <div class="dathang">
                    <div class="ttkh">Thông tin khách mua hàng</div>
                    <form method="post">

                        <ul>
                            <li colspan="3"><span class="ttkhh">Tên khách hàng (*)</span>
                                <input style="width: 50%; height: 25px;margin-left: 4px;" type="text" name="tenkh"
                                       value="<?php echo isset($tenkh)?($tenkh):''?>">
                            </li>
                            <li colspan="3"><span class="tt-sdt">Số điện thoại (*)   </span>
                                <input style="width: 50%; height: 25px;margin-left: 20px;" type="text" name="sdt"
                                       value="<?php echo isset($sdt)?($sdt):''?>">
                            </li>
                            <li colspan="3"><span class="tt-diachi">Địa chỉ      (*)     </span>
                                <input style="width: 50%; height: 25px;margin-left: 56px;" type="text" name="diachi"
                                       value="<?php echo isset($diachi)?($diachi):''?>">
                            </li>
                            <!--                                            <li>Số Lượng:<input type="number"name="soluong" style=" height: 25px;"-->
                            <!--                                                                value="--><?php //echo isset($soluong)?$soluong:$dem+1?><!--"> </li>-->
                            <!--                                            <li colspan="3">Mã Sản Phẩm-->
                            <!--                                                <input style="width: 50%; height: 25px;" type="text" name="masp"-->
                            <!--                                                       value="--><?php //echo isset($masp)?($masp):''?><!--">-->
                            <!--                                            </li>-->


                            <li style="text-align: center">
                                <button type="submit" name="muahang" style="float: left;font-size: 20px;padding: 3px 30px;">Đặt hàng</button>

                            </li>

                        </ul>
                    </form>

                </div>
            </div>
            <!--end col-md-7-->
        </div>
    </div>
        <!--end main-->
        <?php include_once"code/block.php" ?>

    <?php include_once"code/footer.php" ?>
</div>
<script src="lip/js/jquery-2.2.1.min.js"></script>
<script src="lip/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
//        var aboveHeight = $('header').outerHeight();
        $(window).scroll(function(){
            if ($(window).scrollTop() > 300){
                $('nav').addClass('fixed').css('top','0').next().css('padding-top','0');
            } else {
                $('nav').removeClass('fixed').next().css('padding-top','0');
            }
        });
    });
</script>
</body>
</html>