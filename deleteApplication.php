<?php
if( isset($_POST["deleteApplication"]) )
{
	$tables = array('basic_info', 'programs', 'edu_info', 'contact_info', 'docs_info', 'submitted');
	$delQuery =  "";
	foreach($tables as $table){
		$delQuery =  "delete from $table where email = '".$email."'; ";
		if(mysqli_query($con, $delQuery))
		{
			echo "success";		
		}
	}
	header("Refresh:0");
}
?>
