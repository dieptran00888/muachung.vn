<?php
/**
 * Created by PhpStorm.
 * User: DiepTran
 * Date: 3/11/2016
 * Time: 8:55 AM
 */

if(!session_start()){
    session_start();
}
if(!isset($_SESSION['tk'])){
    header('location:dangnhap.php');
}
?>