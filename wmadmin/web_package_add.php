<?php



?>



<!DOCTYPE html>

<html>

<head>

        <meta charset="utf-8">

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <title>Control Panel : Winder Mart</title>

		<link href="img/style.css" rel="stylesheet" type="text/css">

        <!-- Make sure the path to CKEditor is correct. -->

    
<script>
function goBack() {
    window.history.back()
}
</script>
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

			alert("Please Enter Package Name");

			document.memberform.name.focus();

			return false;

		}

		if(document.memberform.price1.value=="")

		{

			alert("Please Enter Price 1 Year");

			document.memberform.price1.focus();

			return false;

		}

    /*if(document.memberform.detail1.value=="")

    {

      alert("Please Enter Offer Details 1 Year");

      document.memberform.detail1.focus();

      return false;

    }*/

    if(document.memberform.price2.value=="")

    {

      alert("Please Enter Price 3 Months");

      document.memberform.price2.focus();

      return false;

    }

    /*if(document.memberform.detail2.value=="")

    {

      alert("Please Enter Offer Details 3 Months");

      document.memberform.detail2.focus();

      return false;

    }*/

    if(document.memberform.price3.value=="")

    {

      alert("Please Enter Price 3 Year");

      document.memberform.price3.focus();

      return false;

    }

    /*if(document.memberform.detail3.value=="")

    {

      alert("Please Enter Offer Details 3 Year");

      document.memberform.detail3.focus();

      return false;

    }*/

	}

</script>

    </head>







<body>

<br>

<form name="memberform" id="memberform" action="web_package_add_inter.php" method="post" enctype="multipart/form-data">

<table width="90%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">

<tr>
		   <th width="56%" height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col"><a href="home.php" style="color: white;">HOME</a>&nbsp;&nbsp;&nbsp;&nbsp;Website Management >Add Package</th>
        <th width="44%" align="right" valign="middle" bgcolor="#03617C" class="style2" scope="col"><strong><button onClick="goBack()"  style="background-color:#03617C;color: white;" >Go Back</button></strong></th>
		
        </tr>

        

        <tr>

              <td height="22" colspan="2" align="center" valign="middle" bgcolor="#FFFFD5" class="style777"><strong class="style10" align="center">Packages fill below </strong></td>

            </tr> 

<tr>

<td width="50%" align="center" colspan="2">

  <table width="100%" >

    <tr>

      <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">

        

        

        <tr>

          <th align="center" valign="top" scope="col"><table  width="100%"><tr><td width="20%"></td><td width="50%"><table width="100%">

                       

            <tr>

              <td width="213" height="22" align="left" valign="middle" class="style77">Package Name*</td>

              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">

			  	<input name="name" type="text" class="style77" value="" size="51" placeholder="Type Your Package  Here" style="height:40px; border-radius: 10px;">		  </td>

            </tr> 

            <tr>

              <td width="213" height="22" align="left" valign="middle" class="style77">Price (1 Year)*</td>

              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">

          <input name="price1" type="text" class="style77" value="" size="51" placeholder="Type Your Price  Here" style="height:40px; border-radius: 10px;">     </td>

            </tr>

             <tr>

              <td height="22" align="left" valign="middle" class="style77">Offer:Details 1 Year*</td>

              <td height="22" colspan="1" align="left" valign="middle" class="style77"><textarea name="detail1" id="editor1" cols="50" rows="15" placeholder="Type Your  Offer Details Here" style=" border-radius: 10px;"></textarea>       </td>

            </tr>

            <tr>

              <td width="213" height="22" align="left" valign="middle" class="style77">Price (3 Months)*</td>

              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">

          <input name="price2" type="text" class="style77" value="" size="51" placeholder="Type Your Price  Here" style="height:40px; border-radius: 10px;">     </td>

            </tr>

             <tr>

              <td height="22" align="left" valign="middle" class="style77">Offer:Details 3 Months*</td>

              <td height="22" colspan="1" align="left" valign="middle" class="style77"><textarea name="detail2" id="editor2" cols="50" rows="15" placeholder="Type Your Offer Details Here" style=" border-radius: 10px;"></textarea>       </td>

            </tr>

            <tr>

              <td width="10%" height="22" align="left" valign="middle" class="style77">Price (3 Year)*</td>

              <td width="50%" height="22" colspan="1" align="left" valign="middle" class="style77">

          <input name="price3" type="text" class="style77" value="" size="51" placeholder="Type Your Price  Here" style="height:40px; border-radius: 10px;">     </td>

            </tr>

               

			 <tr>

              <td height="22" align="left" valign="middle" class="style77">Offer:Details 3 Year*</td>

              <td height="22" colspan="1" align="left" valign="middle" class="style77"><textarea name="detail3" id="editor3" cols="40" rows="15" ></textarea>       </td>

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

			CKEDITOR.replace( 'editor2' );

			CKEDITOR.replace( 'editor3' );

        </script>

</body>

</html>