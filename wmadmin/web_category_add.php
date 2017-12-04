<?php



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

		if(document.memberform.cat_name.value=="")

		{

			alert("Please enter category Name");

			document.memberform.cat_name.focus();

			return false;

		}

		if(document.memberform.icon.value=="")

		{

			alert("Please upload category icon");

			document.memberform.icon.focus();

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

<form name="memberform" id="memberform" action="web_category_add_inter.php" method="post" enctype="multipart/form-data">

  <table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">

    <tr>

      <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

        <tr>
		<th width="56%" height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col"><a href="home.php" style="color: white;">HOME</a>&nbsp;&nbsp;&nbsp;&nbsp;Website Management >Add Category</th>
        <th width="44%" align="right" valign="middle" bgcolor="#03617C" class="style2" scope="col"><strong><button onClick="goBack()"  style="background-color:#03617C;color: white;" >Go Back</button></strong></th>
        </tr>

        <tr>

          <th scope="col">&nbsp;</th>

        </tr>

        <tr>

          <th align="center" valign="top" scope="col" colspan="2"><table  width="100%">

                      

            <tr>

              <td width="213" height="22" align="left" valign="middle" class="style77">Category Name*</td>

              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">

			  		<input name="cat_name" type="text" class="style77" value="" size="51" placeholder="Type Your Category Name Here" style="height:40px; border-radius: 10px;">

			  </td>

            </tr>

			<tr>

              <td width="213" height="22" align="left" valign="middle" class="style77">Category Icon *</td>

              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">

			  		<input name="icon" type="file" class="style77" value="" size="51"  style="height:40px; border-radius: 10px;">

			  </td>

            </tr>

			<tr>

              <td height="22" align="left" valign="middle" class="style77">Description</td>

              <td height="22" colspan="1" align="left" valign="middle" class="style77"><textarea name="description" id="editor1" cols="50" rows="15" placeholder="Type Your Category Description Here" style=" border-radius: 10px;"></textarea>			  </td>

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

<script>

    CKEDITOR.replace( 'editor1' );

</script>

</body>

</html>