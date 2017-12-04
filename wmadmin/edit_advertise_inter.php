<?php
include_once("db.php");
$errorMsg='';
if (isset($_GET['id']) && is_numeric($_GET['id']))

{

// get id value

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
/*if(trim($_GET['id']))
{
	$id=$_GET['id'];
}*/
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
			
		$cat_id= (int)$_POST['cat_id']; 
    	$prod_id= (int)$_POST['prod_id'];
		$name= addslashes(trim($_POST['name']));
		$detail1= addslashes(trim($_POST['editor1']));
			//$id=$_REQUEST['id'];
			
			$categoryQuery = " update  latestpost set cat_id='$cat_id',prod_id='$prod_id', image='$uploaded_file',name='$name',offers='$detail1' where id='".$_GET['id']."' ";
			print_r($categoryQuery);
			die();
			$in=ExecuteQuery($categoryQuery);
			header("Location: latest_post_view.php?q=add");
}
?>