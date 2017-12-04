<?php

include_once('db.php');

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

		if(document.memberform.name.value=="")

		{

			alert("Please Enter Your Offer Name");

			document.memberform.name.focus();

			return false;

		}

		if(document.memberform.price.value=="")

		{

			alert("Please Enter Your Offer Price ");

			document.memberform.price.focus();

			return false;

		}

		if(document.memberform.company.value=="")

		{

			alert("Please Enter Your Company");

			document.memberform.company.focus();

			return false;

		}

		if(document.memberform.url.value=="")

		{

			alert("Please Enter Your Website Url");

			document.memberform.url.focus();

			return false;

		}

		if(document.memberform.file.value=="")

		{

			alert("Please Upload Latest Image Post");

			document.memberform.file.focus();

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

<form name="memberform" id="memberform" action="offer_add_inter.php" method="post" enctype="multipart/form-data">

<table width="90%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">

<tr>   
	<th width="56%" height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col"><a href="home.php" style="color: white;">HOME</a>&nbsp;&nbsp;&nbsp;&nbsp;Website Management >latest Offer</th>
        <th width="44%" align="right" valign="middle" bgcolor="#03617C" class="style2" scope="col"><strong><button onClick="goBack()"  style="background-color:#03617C;color: white;" >Go Back</button></strong></th>
        </tr>

        

        <tr>

              <td height="22" colspan="2" align="center" valign="middle" bgcolor="#FFFFD5" class="style777"><strong class="style10" align="center">Latest Offer below </strong></td>

            </tr> 

<tr>

<td width="50%" align="center" colspan="2">

  <table width="100%" >

    <tr>

      <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

        

        

        <tr>

          <th align="center" valign="top" scope="col"><table  width="100%"><tr><td width="20%"></td><td width="50%"><table width="100%">

                       

             

            <tr>

              <td width="213" height="22" align="left" valign="middle" class="style77">Name *</td>

              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">

          <input name="name" type="text" class="style77" value="" size="51"  style="height:40px; border-radius: 10px;">     </td>

            </tr>

             

           <tr>

              <td width="213" height="22" align="left" valign="middle" class="style77">Price *</td>

              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">

          <input name="price" type="text" class="style77" value="" size="51"  style="height:40px; border-radius: 10px;">     </td>

            </tr>

			<tr>

              <td width="213" height="22" align="left" valign="middle" class="style77">Company *</td>

              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">

          <input name="company" type="text" class="style77" value="" size="51"  style="height:40px; border-radius: 10px;">     </td>

            </tr>

			<tr>

              <td width="213" height="22" align="left" valign="middle" class="style77">Website *</td>

              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">

          <input name="url" type="text" class="style77" value="" size="51"  style="height:40px; border-radius: 10px;">     </td>

            </tr>

			<tr>

              <td width="213" height="22" align="left" valign="middle" class="style77">Image *</td>

              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">

          <input name="image" type="file" class="style77" value="" size="51"  style="height:40px; border-radius: 10px;">     </td>

            </tr>

              <tr>

              <td height="22" align="left" valign="middle" class="style77">Description*</td>

              <td height="22" colspan="1" align="left" valign="middle" class="style77"><textarea name="editor1" id="editor1" cols="40" rows="15" ></textarea>       </td>

            </tr>

            <tr>

              <td height="22" colspan="2" align="center" class="style777" ><input name="submit"   type="submit" class="style77"  value=' Add ' onClick="return submitForm();" />

                      <input name="submit"   type="reset" class="style77"  value='Reset' />              </td>

            </tr>

            <tr>

              <td height="10" colspan="2" align="center" ></td>

            </tr>

            </table></td></tr>

          </table></th>

        </tr>

      </table></td>

    </tr>

  </table>

  </td>

  </tr>

  </table>

</form>

<script>

            CKEDITOR.replace( 'editor1' );

			

        </script>

</body>

</html>