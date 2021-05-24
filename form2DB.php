<?php 

if(isset($_POST["saveNext2"]))
{
	
	//validating data ==========================================
	
	//prev edu info
	
	if(isset($_POST["name"]))
	{
		$prevEduName = $_POST["name"];
	}
	if(isset($_POST["lastEduDate"]))
	{
		$prevEduDate = $_POST["lastEduDate"];
	}
	if(isset($_POST["lastEduCity"]))
	{
		$prevEduCity = $_POST["lastEduCity"];
	}
	if(isset($_POST["lastEduCountry"]))
	{
		$prevEduCountry = $_POST["lastEduCountry"];
	}
	
	// matric edu info
	if(isset($_POST["matricDate"]))
	{
		$matricDate = $_POST["matricDate"];
	}
	if(isset($_POST["matricBoard"]))
	{
		$matricBoard = $_POST["matricBoard"];
	}
	if(isset($_POST["matricTotalMarks"]))
	{
		$matricTotalMarks = $_POST["matricTotalMarks"];
	}
	if(isset($_POST["matricObtainedMarks"]))
	{
		$matricObtainedMarks = $_POST["matricObtainedMarks"];
	}
	// inter edu info
	if(isset($_POST["interDate"]))
	{
		$interDate = $_POST["interDate"];
	}
	if(isset($_POST["interBoard"]))
	{
		$interBoard = $_POST["interBoard"];
	}
	if(isset($_POST["interTotalMarks"]))
	{
		$interTotalMarks = $_POST["interTotalMarks"];
	}
	if(isset($_POST["interObtainedMarks"]))
	{
		$interObtainedMarks = $_POST["interObtainedMarks"];
	}
// creating query ==========================================================================
		$infoQuery = "insert into edu_info ( ";
		$infoQuery .= "email,";
		$infoQuery .= "prevEduName,";
		$infoQuery .= "prevEduDate, ";
		$infoQuery .= "prevEduCity,"; 
		$infoQuery .= "prevEduCountry,"; 
		$infoQuery .= "matricDate, ";
		$infoQuery .= "matricBoard, ";
		$infoQuery .= "matricTotalMarks, ";
		$infoQuery .= "matricObtainedMarks,";
		$infoQuery .= "interDate, ";
		$infoQuery .= "interBoard, ";
		$infoQuery .= "interTotalMarks, ";
		$infoQuery .= "interObtainedMarks";
		$infoQuery .= ")";
		$infoQuery .= " values ( '".$_SESSION['email']."', '".$prevEduName."', '".$prevEduDate."', '".$prevEduCity."', '".$prevEduCountry."', '".$matricDate."', '".$matricBoard."', ".$matricTotalMarks.", ".$matricObtainedMarks.", '".$interDate."', '".$interBoard."', ".$interTotalMarks.", ".$interObtainedMarks.");";
	
	if(isset($_POST["program"])){
		$programs = $_POST["program"];
		foreach ($programs as $program) {
			$programQuery = "insert into programs ( email, program ) values ( '".$_SESSION['email']."', '".$program."' );";
			if(mysqli_query($con,$programQuery))
			{
			}
			else
			{
				echo "failded due to program data";
			}
		}
		if(mysqli_query($con,$infoQuery))
		{
			//echo $infoQuery;
			header("Refresh:0");
		}
		else
		{
			echo "failded due to edu data";
			//echo $infoQuery;
		}
	}			
}
?>
