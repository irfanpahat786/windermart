<?php
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
<title>Control Panel : Orissa Holidays Tour and Travel</title>
<link href="img/style.css" rel="stylesheet" type="text/css">
<body>
<br>
<form name="memberform" id="memberform" action="web_subcategory_add_inter.php" method="post" enctype="multipart/form-data">
  <table width="700" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">
    <tr>
      <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <th height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col">&nbsp;Website Management > Add Subcategory </th>
        </tr>
        <tr>
          <th align="right" valign="middle" scope="col"><a href="javascript:history.back();"><span class="style79">Back</span></a>&nbsp;</th>
        </tr>
        <tr>
          <th align="center" valign="top" scope="col"><table  width="100%">
            <tr>
              <td height="22" colspan="2" align="left" valign="middle" bgcolor="#FFFFD5" class="style777"><strong class="style10">Add Subcategory   Detail </strong></td>
            </tr>
            <tr>
              <td height="22" align="left" valign="middle" class="style77"> Select Category* </td>
              <td height="22" colspan="1" align="left" valign="middle" class="style77">
			  
			  <select name="categoryid" class="style77" id="categoryid">
			  <option value="">Select Category</option>
			  <?php
			  	$categoryQuery = "select categoryid, heading from category order by categoryid asc";
				$categoryQueryResult = $connectionObject->executeQuery($categoryQuery);

				if(!$categoryQueryResult)
  				{
					echo mysql_error()." Error: failed to display category data";
					exit();
  				}
				while($categoryRow = mysql_fetch_assoc($categoryQueryResult))
				{
			  ?>
			  		<option value="<?php echo $categoryRow['categoryid']; ?>"><?php echo $categoryRow['heading']; ?></option>
              <?php
			  	}
			  ?>            
              </select></td>
            </tr>
            <tr>
              <td width="213" height="22" align="left" valign="middle" class="style77"> Subcategory Heading*</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
			  	<input name="heading" type="text" class="style77" id="heading" size="70" />			  </td>
            </tr>   
			<tr>
              <td height="22" align="left" valign="middle" class="style77">Numbering</td>
              <td height="22" colspan="1" align="left" valign="middle" class="style77"><input type="text" name="numbering" value="" style="width:40px;">			  </td>
            </tr>         
           <!-- <tr>
              <td height="22" align="left" valign="middle" class="style77">Description</td>
              <td height="22" colspan="1" align="left" valign="middle" class="style77">&nbsp;</td>
            </tr>
            <tr>
              <td height="22" colspan="2" align="left" valign="middle" class="style77">
			        <script>
					function submitForm() {
					
					
						//make sure hidden and iframe values are in sync for all rtes before submitting form
						updateRTEs();
						if (document.memberform.categoryid.value=="")
						{
							alert("Please select category heading");
							document.memberform.categoryid.focus()  
							return false;
						}	
						if (document.memberform.heading.value=="")
						{
							alert("Please enter subcategory heading");
							document.memberform.heading.focus()  
							return false;
						}						
						
						document.getElementById('memberform').submit();
						return true;
					}
					
					</script>
					<noscript>
					<p><b>Javascript must be enabled to use this form.</b></p>
					</noscript>
				  <script src="../js/rte.js"></script>			  </td>
              </tr>          
            <tr>
              <td height="22" align="left" valign="middle" class="style77">Image <br>
                [W:288 H: 278]<br /></td>
              <td height="22" align="left" valign="middle" class="style77"><input name="imgName" type="file" class="style77">
              [Format .jpg, .jpeg, .gif only]              </td>
            </tr> --> 
            <tr>
              <td height="22" colspan="2" align="left" valign="middle" class="style77">&nbsp;</td>
            </tr>
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