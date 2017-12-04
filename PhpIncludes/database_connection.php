<?php
class databaseConnection
{
	private $connectionId;
	private $queryResult;

	function databaseConnection($server,$user,$password,$selectDatabase='')
	{
		$this->connectionId=mysql_connect($server,$user,$password) 
					or 
				die(mysql_error());
		
		if($selectDatabase!='')
		{
			mysql_select_db($selectDatabase,$this->connectionId) 
			or
			die(mysql_error());
		}
		
				
	}
	
	function selectDatabase($database_name)
	{
		mysql_select_db($database_name,$this->connection_id) 
		or
		die("[ ".mysql_errno(). "] : ".mysql_error($this->connection_id)) ;
		
	}
			
	function executeQuery($queryString)
	{
				$this->queryResult = mysql_query($queryString,$this->connectionId);
				return $this->queryResult ;
	}

	function returnConnectionId()
	{
		return $this->connectionId;
	}

	function returnQueryResult($queryString)
	{
		return $this->queryResult;
	}
}

?>