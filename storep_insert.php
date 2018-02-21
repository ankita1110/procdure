<?php
include('con.php');
function insertstd($sname,$city,$flag)
{
    $insert="call sp_inn('".$sname."','".$city."',".$flag.")";
    $insertquery=mysqli_query($GLOBALS['conn'],$insert);
    if($insertquery)
    {
		return "1";
	}
	{
		return "0";
    }
}
?>