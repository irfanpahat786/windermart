<?php

include_once('db.php');

?>

<script language="JavaScript" type="text/javascript" src="cbrte/html2xhtml.js"></script>

<script language="JavaScript" type="text/javascript" src="cbrte/richtext_compressed.js"></script>

<script src='../js/jquery.js'></script>

<script>



window.onload=function(){

				//document.getElementById('').onclick=; 

			}



</script>

<script type="text/javascript">

	function submitForm()

	{

		if(document.memberform.cat_id.value=="")

		{

			alert("Please Select Category Name");

			document.memberform.cat_id.focus();

			return false;

		}

		if(document.memberform.product.value=="")

		{

			alert("Please Enter Product Name");

			document.memberform.product.focus();

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

<form name="memberform" id="memberform" action="web_mainpro_add_inter.php" method="post" enctype="multipart/form-data">

  <table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">

    <tr>

      <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr>
			<th width="56%" height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col"><a href="home.php" style="color: white;">HOME</a>&nbsp;&nbsp;&nbsp;&nbsp;Website Management >Main Product</th>
        <th width="44%" align="right" valign="middle" bgcolor="#03617C" class="style2" scope="col"><strong><button onClick="goBack()"  style="background-color:#03617C;color: white;" >Go Back</button></strong></th>
        </tr>

        <tr>

          <th scope="col">&nbsp;</th>

        </tr>

        <tr>

          <th align="center" valign="top" scope="col" colspan="2"><table  width="100%">

            <tr>

              <td height="22" colspan="2" align="left" valign="middle" bgcolor="#FFFFD5" class="style777"><strong class="style10">Add Main Product </strong></td>

            </tr>            

            <tr>

              <td width="213" height="22" align="left" valign="middle" class="style77">Category Name*</td>

              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">

			  			<select class="form-control" name="cat_id" style=" border-radius: 10px; height:40px; width:50%; size:50px;">

							  <option value="">Select Category</option>

							  <?php 

									$q="select * from category  ";

									$ar=ExecuteQueryResule($q);

									 foreach($ar as $ak)

									 { 

									 	$id=(int)$ak['id'];

										$cat_name=htmlentities(addslashes(trim($ak['cat_name'])));

								    ?>

							

								<option value="<?php echo $id;?>" <?php if($id==$id){ echo  'selected'; }?>><?php echo $cat_name ?></option>

								

								  <?php }?>

							  

						  </select>	  

				</td>

            </tr>                      

            <!--<tr>

              <td height="22" align="left" valign="middle" class="style77">Numbering</td>

              <td height="22" colspan="1" align="left" valign="middle" class="style77"><input type="text" name="numbering" value="" style="width:40px;">			  </td>

            </tr>-->	

			<tr>

              <td height="22" align="left" valign="middle" class="style77">Main Product</td>

              <td height="22" colspan="1" align="left" valign="middle" class="style77">

			  	<input name="product" type="text" class="style77" value="" size="51" placeholder="Type Your Category Name Here" style=" border-radius: 10px; height:40px; width:50%; size:50px;">	</td>

            </tr>

			<!--<tr>

              <td height="22" align="left" valign="middle" class="style77">Upload Image <br>

[W:288 H: 278]</td>

              <td height="22" colspan="1" align="left" valign="middle" class="style77"><input name="imgName" type="file" class="style77" id="imgName" style=" font-size:10px; "  />			  </td>

            </tr>-->	

            <tr>

              <td height="22" colspan="2" align="center" class="style777" ><input name="submit"   type="submit" class="style77"  value=' Add ' onClick="return submitForm();" />

                      <input name="submit"   type="reset" class="style77"  value='Reset' />              </td>

            </tr>

            <tr>

              <td height="10" colspan="2" align="center" ></td>

            </tr>

          </table></th>

        </tr>

      </table></td>

    </tr>

  </table>

</form>

</body>

</html>