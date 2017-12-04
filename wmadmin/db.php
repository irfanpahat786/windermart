<?php

session_start();
$errors = array();

$upload_errors = array(
    UPLOAD_ERR_OK       => "No errors",
    UPLOAD_ERR_INI_SIZE   => "file larger then max ini filesize",
    UPLOAD_ERR_FORM_SIZE  => "file larger then max specified filesize",
    UPLOAD_ERR_PARTIAL    => "upload due to partial upload",
    UPLOAD_ERR_NO_FILE    => "no file selected",
    UPLOAD_ERR_NO_TMP_DIR => "no temp directory found",
    UPLOAD_ERR_CANT_WRITE => "cannot write to the disk",
    UPLOAD_ERR_EXTENSION  => "upload failed due to extension"
    
    );
function confirm($result){
  if(!$result){
    die("database query failed");
  }
}
function GetConnection()
{
  $con=  mysql_connect("localhost","winderma_shahid","!@#$%shahid786") 
          or die(" Not Connect".  mysql_error());
  mysql_select_db("winderma_rt",$con)or die(" Not Select db". 
          mysql_error());
  return $con;
}
function Tablecreator()
{
    $con=  GetConnection();
    $q="create table newuser (id int primary key auto_increment,name varchar(300),mailid varchar(300),password varchar(50))";
    mysql_query($q,$con) or die(" Not Execute".
            mysql_error());
    mysql_close($con);
}
//Tablecreator();
function ExecuteQuery($q)
{
    $con=  GetConnection();
  $re=  mysql_query($q,$con) or die(" Not Execute".  mysql_error());
    mysql_close($con);
    return $re;
}
function ExecuteQueryResule($q)
{
    $con=  GetConnection();
   $res=mysql_query($q,$con) or die(" Not Execute".  mysql_error());
   //$rar=[];
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



  

  function min_len($value){
    return strlen($value)>3;
  }

  function max_len($value){
    return strlen($value)<30;
  }

  function not_empty($value){
    return isset($value)&&$value!=="";
  }

  function recheck_password($password,$repassword){
    return ($password===$repassword) ? true : false;
    }

  function check_all_fields($fields){
    
  foreach ($fields as $field) {
      $value = $_POST[$field];
      if(!not_empty($value)){
        $errors[$field] = underscore_replace($field)." Can't be blank";
      }else if(!min_len($value)){
        $errors[$field] = underscore_replace($field)." too short atleast 4 characters is required";
      
      }else if(!max_len($value)){
        $errors[$field] = underscore_replace($field)." too long";
      } 
    }
  }


  function underscore_replace($field){
    $new_field = str_replace("_", " ", $field);
    return $new_field;
  }



  function form_errors($errors = array()){
    $output = "";
    if(!empty($errors)){
    $output .= "<div id=\"errors\" class=\"alert alert-danger\">";
    $output .="<a href=\"#\" class=\"close\" data-dismiss=\"alert\" arial-label = \"close\">&times;</a>";
    $output .= "Please fix the following errors";
    $output .= "<ul>";
    foreach ($errors as   $error) {
    $output .= "<li>{$error}</li>";
    }
    $output .= "</ul>";
    $output .= "</div>";

  }
      return $output;  
  }

  function is_valid_email( $address ) {
 
       $rx = "^[a-z0-9\\_\\.\\-]+\\@[a-z0-9\\-]+\\.[a-z0-9\\_\\.\\-]+\\.?[a-z]{1,4}$";
       return (preg_match("~".$rx."~i", $address));
  }

  function upload_image($file){
  global $errors,$upload_errors;
  $db = GetConnection();

      if(empty($file)||!is_array($file)||!$file){
      $errors[] = "There was some problem while uploading file";
      return false;
    }
    elseif($file["error"]!=0){
          $errors[] = $upload_errors[$file["error"]];
          return false;
      }
    elseif(($file["type"]=='image/jpeg')||
        ($file["type"]=='image/png')||
        ($file["type"]=='image/bmp')||
        ($file["type"]=='image/gif'))
        { 
          $name = basename($file["name"]);

          //make login to check image already exists for new named images
           // $name = change_image_name($file["type"]);
          
          $tmp_name = $file["tmp_name"];
          $type     = $file["type"];
          if(empty($name) || empty($tmp_name)){
            $errors[] = "image location not available";
            return false;
          }
          $target_path = "images/".$name;
          
          
          if(move_uploaded_file($tmp_name, $target_path)){
            

            //   $exists = true;
          
            // if(!$exists){

               $query  = "INSERT INTO logo(image) values('$name')";
              
               $result = mysql_query($query,$db);
               
              
             // }  
             
               return true;
             
             }else{   

             $errors[]  = " image upload failed due to some error please try again ";
                return false;
                 }
                  }else{
                $errors[]  = "Wrong image format please choose jpg/png/gif/bmp formats ";
                  return false;
               } 
    }
    if($_SESSION['id']==''){
    header('location:index.php');
}