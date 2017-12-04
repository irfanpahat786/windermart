<?php
include_once("db.php");
$errorMsg='';
if (isset($_GET['id']) && is_numeric($_GET['id']))
{
	$id = $_GET['id'];
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
			
			$in=ExecuteQuery($categoryQuery);
			header("Location: advertisement_product.php?q=add");	
			
			
}
            
			
?>
<script language="JavaScript" type="text/javascript" src="cbrte/html2xhtml.js"></script>
<script language="JavaScript" type="text/javascript" src="cbrte/richtext_compressed.js"></script>
<script src='../js/jquery.js'></script>
<script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
<script>

window.onload=function(){
				//document.getElementById('').onclick=; 
			}

</script>
<script type="text/javascript">
	function submitForm()
	{
	    if(document.memberform.ad_id.value=="")
		{
			alert("Please Select Your Advertisement");
			document.memberform.ad_id.focus();
			return false;
		}
		
		if(document.memberform.file.value=="")
		{
			alert("Please Upload Product Image ");
			document.memberform.file.focus();
			return false;
		}
		if(document.memberform.product_name.value=="")
		{
			alert("Please Type Your Product Name");
			document.memberform.product_name.focus();
			return false;
		}
		
    
    
    
	}
</script>
<html>
<head>
<title>Control Panel : Winder Mart</title>

<link href="img/style.css" rel="stylesheet" type="text/css">
<script>
function goBack() {
    window.history.back()
}
</script>
</head>
<body>
<br>
<form name="memberform" id="memberform" action="#" method="post" enctype="multipart/form-data">
<table width="90%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">
<tr>
         <th width="56%" height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col"><a href="home.php" style="color: white;">HOME</a>&nbsp;&nbsp;&nbsp;&nbsp;Website Management >Edit Advertisement Product</th>

        <th width="44%" align="right" valign="middle" bgcolor="#03617C" class="style2" scope="col"><strong><button onClick="goBack()"  style="background-color:#03617C;color: white;" >Go Back</button></strong></th>
        </tr>
        
        <tr>
              <td height="22" colspan="2" align="center" valign="middle" bgcolor="#FFFFD5" class="style777"><strong class="style10" align="center">ADDs below </strong></td>
            </tr> 
<tr>
<td width="50%" align="center" colspan="2">
  <table width="100%" >
    <tr>
      <td valign="top">
	  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <?php if($errorMsg!=''){ echo $errorMsg;}?>
        
        <tr>
          <th align="center" valign="top" scope="col">
		  <table  width="100%">
		  <tr>
		  <td width="20%"></td>
		  <td width="50%">
            <?php 
			$q="select * from bannerproduct where id=$id  ";
			$ar=ExecuteQueryResule($q);
			foreach($ar as $up){
				$ad=$up['ad_id'];
				$product=$up['product_name'];
				 $image=$up['image'];
			?>
            <table width="100%">
                       
            <tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Advertisement Name*</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
			  			<?php 
									$q="select * from latestpost  ";
									$ar=ExecuteQueryResule($q);
									 
								    ?>
						  <select class="form-control" id="Adds" name="ad_id" style=" border-radius: 10px; height:40px; width:50%; size:50px;">
							  <option value="">Select Advertisement</option>
							<?php
							  if(count($ar)>0)
								{ 
									foreach($ar as $ak)
									{ 
									 	?>
								   <option value="<?php echo $ak['id'];?>"<?php  if($up['ad_id'] == $ak['id']) {  echo " selected"; } ?>><?php echo $ak['name']; ?></option>
								   <?php }
								}
								?>
								
								  
							  
						  </select> 
				</td>
            </tr> 
		
            <tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">ADDs Product Image*</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77"><img src="../shareimg/<?php echo $image;?>" height="100" width="100"><br>
          <input name="image" type="file" class="style77" value="" size="51"  style="height:40px; border-radius: 10px;">     </td>
            </tr>
            <tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">ADDs Product Name*</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <input name="product_name" type="text" class="style77" value="<?php echo $product;?>" size="51"  style="height:40px; border-radius: 10px;">     </td>
            </tr>
           
             
            <tr>
              <td height="22" colspan="2" align="center" class="style777" ><input name="submit"   type="submit" class="style77"  value=' Add ' onClick="return submitForm();" />
                      <input name="submit"   type="reset" class="style77"  value='Reset' />  
					  <input type="hidden" name="id" value="<?php echo $id;?>"    >
					  <input type="hidden" name="txtOldFile" value="<?php echo $image;?>">        </td>
            </tr>
            <tr>
              <td height="10" colspan="2" align="center" ></td>
            </tr>
            </table>
			<?php } ?>
			</td>
			</tr>
          </table>
		  </th>
        </tr>
      </table>
	  </td>
    </tr>
  </table>
  </td>
  </tr>
  </table>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script>

window.onload=function(){
				//document.getElementById('').onclick=; 
			}

</script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-1.7.1.min.js"></script>
<script>
            CKEDITOR.replace( 'editor1' );
			
        </script>
        <script type="text/javascript">
$(document).ready(function(){
    $('#Adds').on('change',function(){
        var adId = $(this).val();
        if(adId){
            $.ajax({
                type:'POST',
                url:'ajaxcall.php',
                data:'id='+adId,
                success:function(html){
                    $('#product').html(html);
                   
                }
            }); 
        }else{
            $('#product').html('<option value="">Select Advertisement first</option>');
            
        }
    });
    
   
});
</script>
</body>
</html>