<?php
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$categoryid = $_REQUEST['categoryid'];

$subcatQry = "select subcategoryid, heading from subcategory where categoryid = '$categoryid' order by subcategoryid asc";
$subcatQryResult = $connectionObject->executeQuery($subcatQry);
if(!$subcatQryResult)
{
	echo mysql_error()." Error: consult your administrator";
	exit();
}
$targetpage="";
?>
<select name="subcategory_Id" id="subcategory_Id" style="width:175px;" class="style77">
<option value="">Select Subcategory</option>
<?php
while($subcatRow = mysql_fetch_array($subcatQryResult))
{
?>
	<option value="<?php echo $subcatRow['subcategoryid']; ?>"><?php echo $subcatRow['heading']; ?></option>
<?php
}
?>
</select>