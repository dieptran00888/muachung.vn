<?php include_once"connect.php" ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>muachung.vn</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="lip/css/demo.css"/>
    <link rel="stylesheet" href="lip/css/formdangky.css"/>
    <!--    <link rel="stylesheet" href="lip/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="lip/css/style_second.css"/>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId=1688787684703978";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<div class="wapper">
    <?php include_once"code/header.php" ?>
    <div class="container">
        <div class="main">
            <?php include_once"code/nav.php"?>
            <div class="col-md-9">
<!--               noidung cua bai viet-->
                <?php
//                $nd=$_GET['nd'];
//                if($nd<0){
//                    echo"Nhập sai dữ liệu";exit();
//                }else
                $sql=mysql_query("select * from tbl_sanpham WHERE id={$_GET['nd']}");
                $r=mysql_fetch_object($sql);
                ?>
                <h3><?php   echo $r->tensp ?></h3>
                <h5>Giá: <?php echo $r->gia ?> VNĐ</h5>
                <span><img src="lip/img/<?php echo $r->anh ?>" alt=""/></span>
                <br/>
                <?php   echo $r->mota ?>
                <br/>
                <a href="addcart.php?item=<?php echo$r->id ?>"><button type="submit" name="mua">Mua sản phẩm</button></a>
<!--                Form dang ky thong tin khach hang-->
<!--                <a class="login-window button" href="#login-box">Mua sản phẩm</a>-->
<!--                <div class="login" id="login-box">Thông tin khách hàng-->
<!---->
<!--                    <a class="close" href="#"><img class="img-close" title="Close Window" alt="Close" src="close.png" /></a>-->
<!--                    <form class="login-content" action="addcart.php" method="post">-->
<!--                        <label class="customer_name">-->
<!--                            <span>Tên hoặc email</span>-->
<!--                            <input id="custom_name" type="text" autocomplete="on" name="custom_name" placeholder="Your name" value="" />-->
<!--                        </label>-->
<!--                        <label class="customer_address">-->
<!--                            <span>Địa chỉ</span>-->
<!--                            <input id="customer_address" type="text" name="customer_address" placeholder="Your address" value="" />-->
<!--                        </label>-->
<!--                        <label class="customer_phone">-->
<!--                            <span>Số điện thoại</span>-->
<!--                            <input id="customer_phone" type="tel" name="customer_phone" placeholder="Your phonenumber" value="" />-->
<!--                        </label>-->
<!--                        <label class="customer_soluong">-->
<!--                            <span>Số lượng sản phẩm</span>-->
<!--                            <input id="customer_soluong" type="number" name="customer_soluong" placeholder="" value="" />-->
<!--                        </label>-->
<!--                        <button class="button submit-button" type="button" name="mua">Mua</button>-->
<!--                    </form>-->
<!--                    end form-->
<!--                    --><?php
//                        if(isset($_POST['mua'])){
//                            $tenkhachhang=$_POST['customer_name'];
//                            $diachi=$_POST['customer_address'];
//                            $sdt=$_POST['customer_phone'];
//                            $soluong=$_POST['customer_soluong'];
//                            $sanpham=
//
//                            if(trim($tenkhachhang)==""||trim($diachi)==""||trim($sdt)==""){
//                                echo "Chưa nhập đủ thông tin";
//                            }else{
//                                $sql= "insert into tbl_khachhang(tenkh, sdt, sanpham, diachi, soluong, tongtien)
//                                        VALUES ('$tenkhachhang','$sdt','')"
//                            }
//                        }
//                    ?>
                </div>
<!--                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
<!---->
<!--                <script type="text/javascript">-->
<!--                    $(document).ready(function() {-->
<!--                        $('a.login-window').click(function() {-->
<!--                            //lấy giá trị thuộc tính href - chính là phần tử "#login-box"-->
<!--                            var loginBox = $(this).attr('href');-->
<!---->
<!--                            //cho hiện hộp đăng nhập trong 300ms-->
<!--                            $(loginBox).fadeIn(300);-->
<!---->
<!--                            // thêm phần tử id="over" vào sau body-->
<!--                            $('body').append('<div id="over">');-->
<!--                            $('#over').fadeIn(300);-->
<!---->
<!--                            return false;-->
<!--                        });-->
<!---->
<!--                        // khi click đóng hộp thoại-->
<!--                        $(document).on('click', "a.close, #over", function() {-->
<!--                            $('#over, .login').fadeOut(300 , function() {-->
<!--                                $('#over').remove();-->
<!--                            });-->
<!--                            return false;-->
<!--                        });-->
<!--                    });-->
<!--                </script>-->
            </div>
        <div class="fb-comments" data-href="https://www.facebook.com/diept3" data-width="600" data-numposts="5"></div>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.2887830945865!2d105.78483121433774!3d20.98105809478231!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135accdcf7b0bd1%3A0xc1cf5dd00247628a!2zSOG7jWMgdmnhu4duIEPDtG5nIG5naOG7hyBCxrB1IGNow61uaCBWaeG7hW4gdGjDtG5n!5e0!3m2!1svi!2s!4v1458162843556" width="400" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>            <!--end col-md-7-->

        <!--end main-->
        <?php include_once"code/block.php" ?>
    </div>
    </div>
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
<script lang="javascript">
    (function() {var _h1= document.getElementsByTagName('title')[0] || false;
        var product_name = ''; if(_h1){product_name= _h1.textContent || _h1.innerText;}var ga = document.createElement('script'); ga.type = 'text/javascript';
        ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=55f1dac4f661c12a42785b6a2e17c3b6&data=eyJzc29faWQiOjM2NDIyNzAsImhhc2giOiIyY2NkYjY3YTY4ODEwODBjY2UxNzE3Y2YxNDg4NjYwZSJ9&pname='+product_name;
        var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();
</script>
</body>
</html>