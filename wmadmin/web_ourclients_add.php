<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrative Console</title>
<link href="../css/admincss.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../favicon.ico">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/sample.js" type="text/javascript"></script>
<script src="../js/rte.js"></script>
</head>
<!--<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/sample.js" type="text/javascript"></script>
<link href="ckeditor/sample.css" rel="stylesheet" type="text/css" />-->
<script type="text/javascript" language="JavaScript">
	function validate()
	{
	
	if(document.addfrm.heading.value=="")
		{
		
		alert('Enter The Heading');
		document.addfrm.heading.focus();
		return false;
		}
		
		
	}

 </script>
<body onload="document.getElementById('myArea1').focus()" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td align="left" valign="top" ><table width="100%" border="0" cellspacing="4" cellpadding="4">
        <tr>
         
          <td align="left" valign="top"  class="grayfour"><table width="100%" border="0" cellpadding="2" cellspacing="2">
             
             
<?php
error_reporting(0);
//ob_start();
//session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

?>
<script language="JavaScript" type="text/javascript" src="cbrte/html2xhtml.js"></script>
<script language="JavaScript" type="text/javascript" src="cbrte/richtext_compressed.js"></script>
<script src='../js/jquery.js'></script>
<script>

window.onload=function(){
				//document.getElementById('').onclick=; 
			}

</script>
<html>
<title>Control Panel : </title>
<link href="img/style.css" rel="stylesheet" type="text/css">
<body>
<br>
<form name="memberform" id="memberform" action="web_ourclients_add_inter.php" method="post" enctype="multipart/form-data">
  <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#999999" bgcolor="#FFFFFF">
    <tr>
      <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <th height="25" align="left" valign="middle" bgcolor="#999999" class="style2" scope="col">&nbsp;Website Management > Add Image </th>
        </tr>
        <tr>
          <th scope="col">&nbsp;</th>
        </tr>
        <tr>
          <th align="center" valign="top" scope="col"><table  width="100%">
            <tr>
              <td height="22" colspan="2" align="left" valign="middle" bgcolor="#999999" class="style777"><strong class="style10">Add Gallery Image  </strong></td>
            </tr> 

         <!--   <tr>
              <td width="213" height="22" align="left" valign="middle" class="style77"> Select Persons</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
			  <select name="testimonials_type" class="style77" id="testimonials_type" style="width:175px;" >	
              <option value="" >Select Persons</option> 
              <option value="Precedent" > Precedent</option> 
			  <option value="Prime Minister" >Prime Minister</option> 
			  <option value="Prime Minister" >Ambassador</option> 
				</select> 
	  </td>
            </tr> 

           
            <tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">URL</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
			  	<input name="url" type="text" class="style77" value="" size="50">		  </td>
            </tr>
			
			
            <tr>
              <td height="22"width="213" align="left" valign="middle" class="style77">Heading</td>
              <td height="22" colspan="1" align="left" valign="middle" class="style77"><input type="text" name="heading" value="" size="50";>			  </td>
            </tr>
          -->
          
                    
                     <tr>
              <td height="22" align="left" valign="middle" class="style77">Upload Image <br></td>
              <td height="22" colspan="1" align="left" valign="middle" class="style77"><input name="imgName" type="file" class="style77" id="imgName" style=" font-size:10px; "  />			  </td>
            </tr>
           <tr>
           <td>&nbsp; </td>
           
           </tr>
           
            <tr>
            <td>&nbsp;</td>
              <td height="22" colspan="1" align="" class="style777" ><input name="submit"   type="submit" class="style77"   />
                         </td>
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