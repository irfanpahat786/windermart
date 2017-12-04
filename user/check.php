<?php
include_once('db.php');
if($_SESSION['userid']==''){
    header('location:../login.php');
}
?>