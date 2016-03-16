<div class="col-md-3">
<nav>
    <div id="navbar">
        <ul class="ul_navbar">
            <h3>Danh mục</h3>
            <?php
                function hiendanhmuc($cha=0,$cap=1){
                    $sql="select *from tbl_danhmuc WHERE danhmuc=$cha";
                    $kq=mysql_query($sql);
                    if($cap=1){
                        while($val=mysql_fetch_object($kq)) {
                            if (mysql_num_rows($kq) > 1) {
                                echo'<li><a href="danhmuc.php?dm='.$val->id.'">'.$val->tendanhmuc.'</a>';
                                hiendanhmuc($val->id,$cap+1);
                                echo'</li>';
                            }
                            else if(mysql_num_rows($kq)==1){
                                echo'<li><a href="danhmuc.php?dm='.$val->id.'">'.$val->tendanhmuc.'</a></li>';
                            }
                        }

                    }
                }
            hiendanhmuc(0,1);
            ?>
    </div>
</nav>
</div>