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
		if(document.memberform.file.value=="")
		{
			alert("Please Upload Latest Image Post");
			document.memberform.file.focus();
			return false;
		}
		
    
    
    
	}
</script>
<html>
<title>Control Panel : Winder Mart</title>
<link href="img/style.css" rel="stylesheet" type="text/css">
<body>
<br>
<form name="memberform" id="memberform" action="about_inter.php" method="post" enctype="multipart/form-data">
<table width="90%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">
<tr>
          <th height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col">&nbsp;Website Management > About Us </th>
        </tr>
        
        <tr>
              <td height="22" colspan="2" align="center" valign="middle" bgcolor="#FFFFD5" class="style777"><strong class="style10" align="center">About below </strong></td>
            </tr> 
<tr>
<td width="50%" align="center">
  <table width="100%" >
    <tr>
      <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        
        
        <tr>
          <th align="center" valign="top" scope="col"><table  width="100%"><tr><td width="20%"></td><td width="50%"><table width="100%">
                       
             
            <tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Heading*</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <input name="about" type="text" class="style77" value="" size="51"  style="height:40px; border-radius: 10px;">     </td>
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