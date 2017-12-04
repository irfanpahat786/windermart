<?php 

include_once 'db.php';

$errorMsg='';

define("MAX_SIZE","2097152");

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

/*if($_GET["id"]!='' && is_numeric($_GET["id"]))

{

$ids=trim($_GET["id"]);

}*/

if(isset($_POST['submit']))

{





	if(trim($errorMsg)=='')

		{

			if(!empty($_FILES["bannerfield"]["name"]))

			{

				$extArray=strtolower(end(explode(".", $_FILES["bannerfield"]["name"])));

				if($extArray=='png' || $extArray=='jpg' || $extArray=='jpeg' || $extArray=='gif')

				{

					$size=filesize($_FILES['bannerfield']['tmp_name']);

					

					if ($size > MAX_SIZE*1024)

					{

						$errorMsg="Please upload File size of upto 2 MB!<br>";

					}

					else

					{

						$uploadedFileName=rand(0,99).date("Ymdsi");

						$uploadedFileName=$uploadedFileName.".".$extArray;

						

							

						$filePath=$_FILES['bannerfield']['tmp_name'];

						$imageUploaded=false;

						chmod("../uploads/logo/", 0777);  // octal; correct value of mode

						$imageUploaded=uploadImage($filePath,"../uploads/logo/".$uploadedFileName);

						chmod("../uploads/logo/", 0755);  // octal; correct value of mode

						

						if(!$imageUploaded)

							$errorMsg.="File not uploaded.<br>";

						else

						{

							if(trim($_POST["txtOldFile"])!='' && is_file("../uploads/logo/".$_POST["txtOldFile"]))

								unlink("../uploads/logo/".$_POST["txtOldFile"]);

						}

					}

				}

				else

				{

					$errorMsg="Please upload .png, .jpg, .jpeg, .gif, files only.";

				}	

			}

			else if(trim($_POST["txtOldFile"])!='')

			{

					$uploadedFileName=$_POST["txtOldFile"];

			}

			else

			{

				//$errorMsg="Please upload .png, .jpg, .jpeg, .gif, files only.";

			}

		}





	$q1="update logo set image='$uploadedFileName'  where id=1  ";

	ExecuteQuery($q1); 

}





?> 



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

<table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">

  	<tr>

    <td valign="top">

	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

      <tr>

        <th width="56%" height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col"><a href="home.php" style="color: white;">HOME</a>&nbsp;&nbsp;&nbsp;&nbsp;Website Management > View Logo List</th>

        <th width="44%" align="right" valign="middle" bgcolor="#03617C" class="style2" scope="col"><strong><button onclick="goBack()"  style="background-color:#03617C;color: white;" >Go Back</button></strong></th>

      </tr>

	 

      <tr>

        	<th height="22" colspan="2" class="style77" scope="col"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">

		

          <!--<tr>

            <td height="22" colspan="4" align="right" valign="middle" ><a href="web_category_add.php" class="style10"><font color="#FF0000">update Logo</font></a></td>

            </tr>  -->    

          <tr>

			<!--<td height="22" align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Image </td>-->

            <td height="22" align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Logo  </td>

           

             <td  height="22" align="center" valign="middle" bgcolor="#FFFFD5" class="style10">Image</td>

            <td  height="22" align="center" valign="middle" bgcolor="#FFFFD5" class="style10">Action</td>

          </tr>		 

          <?php 

         

			    $categoryQuery = "select * from logo where id=1";				

				$categoryQueryResult = ExecuteQuery($categoryQuery);

				if(!$categoryQueryResult)

				{ // if query failed to execute then print error msg

					$errorMsg = mysql_errno()." : failed to display logo";

					echo $errorMsg;

					//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");

					exit();

                }    			

				while($categoryRow = mysql_fetch_assoc($categoryQueryResult))

				{

			 ?>

            

				<!--<td width="22%" align="center" valign="top" class="style77"><span class="style777">

			  <?php 

			   if ($categoryRow['image']!='')

			   {

			  ?>

			  <img src="../productImage/small/<?php echo $categoryRow['image']; ?>" border="1" class="style8" width="100" height="97"/>

			  <?php

			  }

			  ?>

			  </span></td>-->

			  <tr>

        <form action="edit_logo.php" method="post" enctype="multipart/form-data">

              <td  align="left" valign="top" class="style77"><div style="margin:1px;"><img src="../uploads/logo/<?php echo $categoryRow['image']?>"/></div></td>

              

              <td  align="center" valign="top" class="style77"><div style="margin:1px;"><input type="file" name="bannerfield" value="<?php echo $categoryRow['image']?>"></div></td>

              <td align="center" valign="top" class="style77">

			  <div style="margin:3px;">

			  <input type="submit" name="submit" value="update" style=" background-color: rgb(3, 97, 124); color:white; height: 35px;"/>

			  <input name="txtOldFile" type="hidden" id="txtOldFile" value="<?php echo $uploadedFileName; ?>" /></div>

				</td>

            

			</form>

			</tr>

          <tr>

            <td height="2" colspan="4" align="center" valign="top" bgcolor="#E7EFB8" ></td></tr>

            

         

          <?php

			 }

		  ?>

          <tr>

                <script language="javascript">

		  	function deleteAlert(record)

			{

				if(confirm("Are you really want to delete this Category?"))

				return true;

				else

				return false;

			}

		  </script>   

            <td colspan="2" align="center" valign="bottom" class="style7B">&nbsp;</td>

            <td align="center" valign="top" class="style7B">&nbsp;</td>

          </tr>

        </table></th>

      </tr>

      

    </table>

	</td>

  </tr>

</table>

</body>

</html>