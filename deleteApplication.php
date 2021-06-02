<?php
if( isset($_POST["deleteApplication"]) )
{
	$tables = array('basic_info', 'programs', 'edu_info', 'contact_info', 'docs_info' );
	$delQuery =  "";
	foreach($tables as $table){
		$delQuery =  "delete from $table where email = '".$email."'; ";
		if(mysqli_query($con, $delQuery))
		{
			echo "success";		
			mysqli_query($con, "update submitted set status='not submitted' where email='".$email."';");
			
		}
	}
	header("Refresh:0");
}
?>
