<?php
ob_start();
//@session_start();

include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

if(isset($_GET['msg'])&&$_GET['msg']!=''){	
	$msg=$_GET['msg'];
	
	switch($msg){
	case 'ins':
		$msg='Data inserted Successfully !!';
		$class='successmsg';
	break;
	
	case 'inf':
		$msg='Data not inserted Successfully !!';
		$class='errormsg';
	break;
	case 'ups':
		$msg='Data updated Successfully !!';
		$class='successmsg';
	break;
	
	case 'upf':
		$msg='Data not updated Successfully !!';
		$class='errormsg';
	break;
	
	
	case 'default' :
		$msg='';
		break;
	
	}
	

}

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$id = $_REQUEST['id'];

			   
			   if ($_REQUEST['q']=='delimg')
			   {
				
				$memberQuery = "update cms set image='' where id='$id'";
				$memberQueryResult = $connectionObject->executeQuery($memberQuery);
				if(!$memberQueryResult)
				{
				 echo mysql_error()." Error: consult your administrator";
				 exit();
				}
				header("Location: clients_page.php?id=$id");
			   }

 $key_s = $_REQUEST['key_s'];
     $PageQuery = "select * from cms where key_s = '$key_s' ";
			//echo $PageQuery;
				$PageQueryResult = $connectionObject->executeQuery($PageQuery);
				if(!$PageQueryResult)
				{ // if query failed to execute then print error msg
					$errorMsg = mysql_errno()." : failed to display Pages";
					echo $errorMsg;
					//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
					exit();
                }
$PageRow = mysql_fetch_assoc($PageQueryResult);
//echo $PageRow['title']."GGGGGGGGGGGGGGGGGGG";
//echo $PageRow['content']."FFFFFFFFFFFFFFFFFF";
  
  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrative Console</title>
<link href="../css/admincss.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../favicon.ico">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/sample.js" type="text/javascript"></script>
</head>
<body onload="document.getElementById('myArea1').focus()" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" scope="col"><?php include("header.php");?></td>
  </tr>
  <tr>
    <td align="left" valign="top" ><table width="100%" border="0" cellspacing="4" cellpadding="4">
        <tr>
          <td align="left" valign="top" width="20%" class="grayfour" height="460px"><?php include("menu.php");?>
          </td>
          <td align="left" valign="top"  class="grayfour"><table width="100%" border="0" cellpadding="2" cellspacing="2">
              
              <tr>
                <td class="rgt1">&nbsp;</td>
                <td class="head3"><table><tr><td align="left"><img src="img/register.gif"></td>
                <td align="left"> Informative Pages </td>
                </tr></table></td>
              </tr>
              
             <tr>
                <td class="rgt1">&nbsp;</td>
                <td  align="left"><div class="<?php echo $class; ?>"><?php echo $msg; ?></div></td>
              </tr>
             
              <tr>
                <td class="rgt1">&nbsp;</td>
                <td valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                    
                    <tr>
                      <td>&nbsp;</td>
                      <td valign="top"><!--               start your coding here                 -->
                        <form action="clients_page_inter.php" method="post" name="addfrm" id="addfrm" onsubmit="return validate();" enctype="multipart/form-data" >
                          <table width="100%" border="0" cellpadding="4" cellspacing="1" >
                            <tr>
                              <td align="left" class="blackbold">Heading</td>
                              <td width="88%" align="left">
							  <input type="hidden" id="id" name="id" value="<?php echo stripslashes($PageRow['id'])?>">
							   <input type="hidden" id="key_s" name="key_s" value="<?php echo stripslashes($PageRow['key_s'])?>">
                              <input class="ac-textbox" type="text" id="title"  name="title" readonly="readonly" value="<?php echo stripslashes($PageRow['title'])?>" /></td>
                            </tr>
							
							
                            <tr>
                              <td width="12%" align="left" valign="top" class="blackbold">Content </td>
                              <td  align="left" >
		                 	<textarea type="text" name="content" id="ckeditor"  rows="15" cols="72"><?php echo stripslashes($PageRow['content'])?></textarea>
                              </td>
                            </tr>
							
						
                            <tr>
                              <td align="left">&nbsp;</td>
                              <td align="left">
							  <?php 
							  if($select1<1)
		                        {  
							  ?>
							  <input type="submit" class="sub_btn"  name="submit" value="  Submit  " />
							  <?php }else {?>
							   <input type="submit" class="sub_btn"  name="submit" value="  Update  " />
							  <?php }?></td>
                            </tr>
                          </table>
                        </form>
                        <!--                 end  your coding here                  -->
                      </td>
                    </tr>
                  </table>
				
				</td>
              </tr>
          </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td align="left" class="head2">&nbsp;</td>
  </tr>
</table>
<script src="ckeditor/settings.js" type="text/javascript"></script>	
</div>
  <!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats -->
  <?php include('footer.php');?>


  <!-- end #container -->
</div>
</body>
</html>
