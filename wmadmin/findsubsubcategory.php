<?php
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$categoryid = $_REQUEST['categoryid'];
$subcategoryid = $_REQUEST['subcategoryid'];
$subcatQry = "select subsubcategoryid, heading from subsubcategory where subcategoryid = '$subcategoryid' and categoryid = '$categoryid' order by subsubcategoryid asc";
$subcatQryResult = $connectionObject->executeQuery($subcatQry);
if(!$subcatQryResult)
{
	echo mysql_error()." Error: consult your administrator";
	exit();
}
?>
<select name="subsubcategoryid" id="subsubcategoryid" style="width:175px;" class="style77">
<option value="">Select Sub Subcategory</option>
<?php
while($subcatRow = mysql_fetch_array($subcatQryResult))
{
?>
	<option value="<?php echo $subcatRow['subsubcategoryid']; ?>"><?php echo $subcatRow['heading']; ?></option>
<?php
}
?>
</select>