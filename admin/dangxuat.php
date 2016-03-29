<?php
/**
 * Created by PhpStorm.
 * User: DiepTran
 * Date: 3/11/2016
 * Time: 9:56 AM
 */
if(!session_start()){
    session_start();
}
if(isset($_SESSION['tk'])){
    session_destroy();
}
header('location:dangnhap.php');
?>
