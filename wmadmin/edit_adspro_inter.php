<?php
include_once("db.php");
$errorMsg='';
if (isset($_GET['id']) && is_numeric($_GET['id']))
{
echo $id = $_GET['id'];
}
function uploadImage($tempPath, $destPath)
{
	if($tempPath!="" && $destPath!="")
	{
		move_uploaded_file($tempPath,$destPath) or die("The picture can not be uploaded. Please try again?"); 
		return true;
	}
	else
	{
		return false;
	}
}
if(isset($_POST['submit']))
{
					if(trim($errorMsg)=='')
					{
							if(!empty($_FILES["image"]["name"]))
							{
								$extArray=strtolower(end(explode(".", $_FILES["image"]["name"])));
								if($extArray=='jpg' || $extArray=='gif' || $extArray=='jpeg' || $extArray=='ico' || $extArray=='png')
								{
									$size=filesize($_FILES['image']['tmp_name']);
									
									if ($size > 512000*1024)
									{
										$errorMsg="Please upload File size of upto 2 MB!<br>";
									}
									else
									{
										$uploaded_file=rand(0,99).date("Ymdsi");
										$uploaded_file=$uploaded_file.".".$extArray;
										
											
										$filePath=$_FILES['image']['tmp_name'];
										$imageUploaded=false;
										chmod("../shareimg/", 0777);  // octal; correct value of mode
										$imageUploaded=uploadImage($filePath,"../shareimg/".$uploaded_file);
										chmod("../shareimg/", 0755);  // octal; correct value of mode
										
										if(!$imageUploaded)
											$errorMsg.="File not uploaded.<br>";
										else
										{
											if(trim($_POST["txtOldFile"])!='' && is_file("../shareimg/".$_POST["txtOldFile"]))
												unlink("../shareimg/".$_POST["txtOldFile"]);
										}
									}
								}
								else
								{
									$errorMsg="Please upload .jpg, .gif, .jpeg, .png, etc.  files only.";
								}	
							}
							else if(trim($_POST["txtOldFile"])!='')
							{
									$uploaded_file=$_POST["txtOldFile"];
							}
							else
							{
								$errorMsg="Please upload .jpg, .gif, .jpeg, .png, etc.  files only. else tttttttttttttttttt";
							}
					}
			
		$ad_id= (int)$_POST['ad_id']; 
		$product_name= addslashes(trim($_POST['product_name']));
		$categoryQuery = " update  bannerproduct set image='$uploaded_file',ad_id='$ad_id',product_name='$product_name' where id='$id' ";
			print_r($categoryQuery);
			die();
			$in=ExecuteQuery($categoryQuery);
			header("Location: advertisement_product.php?q=add");	
			
			
}
            
			
?>