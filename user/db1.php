<?php
session_start();
function GetConnection()
{
  /*$con=  mysql_connect("localhost","root","") 
          or die(" Not Connect".  mysql_error());
  mysql_select_db("jambodea_jumbo",$con)or die(" Not Select db". 
          mysql_error());
		  return $con; */
$con = mysqli_connect('localhost', 'winderma_rts', 'winder@123','winderma_rt');
if (mysqli_connect_errno())
    die('Could not connect: ' . mysqli_connect_error());
  return $con;
}
/*function Tablecreator()
{
    $con=  GetConnection();
    $q="create table newuser (id int primary key auto_increment,name varchar(300),mailid varchar(300),password varchar(50))";
    mysql_query($q,$con) or die(" Not Execute".
            mysql_error());
    mysql_close($con);
}*/
function Tablecreator()
{
    $con=  GetConnection();
    $q="create table newuser (id int primary key auto_increment,name varchar(300),mailid varchar(300),password varchar(50))";
    mysqli_query($q,$con) or die(" Not Execute".
            mysqli_error());
    mysqli_close($con);
}
//Tablecreator();
/*function ExecuteQuery($q)
{
    $con=  GetConnection();
  $re=  mysql_query($q,$con) or die(" Not Execute".  mysql_error());
    mysql_close($con);
    return $re;
}*/
function ExecuteQuery($q)
{
    $con=  GetConnection();
  $re=  mysqli_query($con,$q) or die(" Not Execute".  mysqli_error($con));
    mysqli_close($con);
    return $re;
}
/*function ExecuteQueryResule($q)
{
    $con=  GetConnection();
   $res=mysql_query($q,$con) or die(" Not Execute".  mysql_error());
   $rar=[];
   while(($ar=  mysql_fetch_array($res))!=FALSE)
   {
      // echo "<br>fetch..";
      // print_r($ar);
       $rar[]=$ar;
   }
    mysql_close($con);
     //echo "<br>af while..";
     //  print_r($rar);
    return $rar;
}*/
function ExecuteQueryResule($q)
{
    $con=  GetConnection();
   $res=mysqli_query($con,$q) or die(" Not Execute".  mysqli_error($con));
   $rar=[];
   while(($ar=mysqli_fetch_array($res))!=FALSE)
   {
      // echo "<br>fetch..";
      // print_r($ar);
       $rar[]=$ar;
   }
    mysqli_close($con);
     //echo "<br>af while..";
     //  print_r($rar);
    return $rar;
}
function ExecuteQueryDelete($q)
{
    $con=  GetConnection();
   $res=mysqli_query($con,$q) or die(" Not Execute".  mysqli_error());
   
    mysqli_close($con);
     //echo "<br>af while..";
     //  print_r($rar);
    return $res;
}
function SendMail1($to,$sub,$mess,$from)
{
   if(mail($to, $sub, $mess, "from:".$from))
   {
       echo "Maile Send....";
   }
 else {
       echo "Maile Not Send....";
   }
}


function buildTree($items) {

    $childs = array();

    foreach($items as $item)
        $childs[$item->parent_id][] = $item;

    foreach($items as $item) if (isset($childs[$item->id]))
        $item->childs = $childs[$item->id];

    return $childs[0];
}

