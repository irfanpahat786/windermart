
<?php include('inc_top.php'); ?>
<?php
$categoryid = (isset($_REQUEST['id']) and $_REQUEST['id'] != '' ) ?  $_REQUEST['id'] :  header("Location: error.php?q=err");

					$catQry = "select heading from category where categoryid = '$categoryid'";
					$catQryResult = $connectionObject->executeQuery($catQry);
					if(!$catQryResult)
					{ // if query failed to execute then print error msg
						$errorMsg = mysql_errno()." : failed to display service type";
						echo $errorMsg;
						//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
						exit();
                	}
					$catQryRow = mysql_fetch_assoc($catQryResult);

?>
<!--header-row-->
<style type="text/css">
<!--
.style1 {
	font-family: Arial, Helvetica, sans-serif;
	color: #0000FF;
}
-->
</style>

            <div id="container-row">

                  	  <div id="container-1-col">
           	   

<div class="clearfix">
		<div class="extra-box" align="justify"><br />

		<div style="margin-left:20px; margin-right:20px;"><h2><?php echo $catQryRow['heading'];?></h2>
		  <p>&nbsp;</p>  
		  <h3>> <a href="prodcat.php" class="style1">Products</a>	      </h3>
		  <p>&nbsp;  </p>
		</div>
		</div>
<?php

if($categoryid!='')
{
	$subCatQuery = "select * from subcategory where categoryid='$categoryid' order by numbering asc";
}else{
	$subCatQuery = "select * from subcategory order by numbering asc";
}
//echo $userQuery;
$subCatQueryResult = $connectionObject->executeQuery($subCatQuery);
?>	

<?
					$cols=1;		// Here we define the number of columns
					echo '<table align="center" style="padding:5px;">';	// The container table with $cols columns
					do{
					echo "<tr>";
					for($i=1;$i<=$cols;$i++){	// All the rows will have $cols columns even if
					// the records are less than $cols
					$subCatRow=mysql_fetch_array($subCatQueryResult);
					if($subCatRow){
						
        			echo '<td><table cellpadding="0" cellspacing="0" border="0" style="padding:0px;"><tr><td style="padding:50px; margin-left:20px;" valign="middle" align="center">';
				?></strong></span><br>
			            
        <td align="left" valign="middle" >
         <a href="prodsubsubcat.php?id=<?php echo $subCatRow['subcategoryid']; ?>&sid=<?php echo $subCatRow['subcategoryid']; ?>"><?php if($subCatRow['imgName']=='') {  ?> <img src="images/marker1.gif" border="0" align="middle"> <?php  } ?>&nbsp;&nbsp;&nbsp;<strong><?php echo $subCatRow['heading'];?></a></strong><br />
<br />
<?php
		if($subCatRow['imgName']!='' and $subCatRow['imgName']!=NULL)
		{
?>
<img src="subcatImage/<?php echo $subCatRow['imgName']; ?>" border="1" class="style8" width="272" height="246"/>
<?php
  	}
  ?>

				<?php  
					echo '</td></tr>'; 
				?>		
		   
				     <?php  echo '</table></td>'; ?>

				     <?		}
						else{
							echo "<td>&nbsp;</td>";	//If there are no more records at the end, add a blank column
							}
						}
					} while($subCatRow);
					echo "</table>";
				?> 



  
      
<?php 
$imageQuery = "select * from product where categoryid='$categoryid' and subcategoryid='' and subsubcategoryid='' order by numbering asc ";
$imageQueryResult = $connectionObject->executeQuery($imageQuery);
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

  <tr>
    <td width="6%" align="center" valign="middle" >&nbsp;</td>
    <td width="94%" align="left" valign="top" scope="col">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top">

					<?
					$cols=3; // Here we define the number of columns
					echo '<table align="center" style="border: 3px solid #F7F7F7; padding:2px;">'; // The container table with $cols columns
					do{
					echo "<tr>";
					for($i=1;$i<=$cols;$i++){ // All the rows will have $cols columns even if
					// the records are less than $cols
					$imageRow=mysql_fetch_array($imageQueryResult);
					if($imageRow){
					
					echo '<td>
					<!--<strong>Available Product(s)</strong><br />
-->
					<table cellpadding="0" cellspacing="0" border="0" style="border: 2px solid #fff5ef; padding:5px;"><tr><td style="padding:3px;" valign="middle">';
					?>
			  <? 
			   if ($imageRow['imgName']=="")
			    {
			  ?>
	           <img src="images/nophoto.jpg" border="0" width="166" height="125" />
	           <?
			    }else
				{
			   ?>
					<a href='productdetail.php?id=<?=$imageRow['productid']?>'><img src="productImage/thumb/<?=$imageRow['imgName']?>" border="0" width="275" height="182" class="toptext-ul" /></a>
			   <?
			    }
			   ?>	
					
					<div align="center" class="data"><a href='productdetail.php?id=<?=$imageRow['productid']?>'><?php echo $imageRow['heading']; ?></a></div>
					<div align="center" ><?php echo $imageRow['curcode']; ?> <?php echo $imageRow['productprice']; ?></div>
					<?php
					echo '</td></tr><tr><td align="center" style="padding:3px;" valign="middle">';
					?>
					<?php echo '</td></tr></table></td>'; ?>
					
					<? }
					else{
					echo "<td>&nbsp;</td>"; //If there are no more records at the end, add a blank column
					}
					}
					} while($imageRow);
					echo "</table>";
					?>			
	</td>
  </tr>
  
</table>
	</td>
  </tr> 
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</div>
  </div>
</div>
  
  	  <!--sidebar-->  	</div><!--.container_24 -->
  </div><!--container-row-->

            

           <?php include('inc_bottom.php');?>