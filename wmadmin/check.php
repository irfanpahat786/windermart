<?php
include_once('db.php');
if($_SESSION['id']==''){
    header('location:index.php');
}
?>