<?php 
if(isset($_POST["submit"]))
{
	if(mysqli_query($con, "delete from contact_info where email='".$email."';") ){
		//echo "<script>alert('deleted');</script>";
	}
	//contact info verification
	if(isset($_POST["street"]))
	{
		$street = $_POST["street"];
	}
	if(isset($_POST["city_province"]))
	{
		$city_province = $_POST["city_province"];
	}
	if(isset($_POST["country"]))
	{
		$country = $_POST["country"];
	}
	if(isset($_POST["zipCode"]))
	{
		$zipCode = $_POST["zipCode"];
	}
	if(isset($_POST["phone"]))
	{
		$phone = $_POST["phone"];
	}
	if(isset($_POST["cEmail"]))
	{
		$cEmail = $_POST["cEmail"];
	}
	if(isset($_POST["facebook"]))
	{
		$facebook = $_POST["facebook"];
	}
	if($_POST["whatsapp"] > 0)
	{
		$wapp = $_POST["whatsapp"];
	}
	else 
	{
		$wapp = 0;
	}
// creating query ==========================================================================
		$infoQuery = "insert into contact_info ( ";
		$infoQuery .= "email,";
		$infoQuery .= "street,";
		$infoQuery .= "city_province, ";
		$infoQuery .= "country,"; 
		$infoQuery .= "zipCode,"; 
		$infoQuery .= "phone, ";
		$infoQuery .= "cEmail, ";
		$infoQuery .= "facebook, ";
		$infoQuery .= "whatsapp";
		$infoQuery .= ")";
		$infoQuery .= " values ( '".$_SESSION['email']."', '".$street."', '".$city_province."', '".$country."', ".$zipCode.", ".$phone.", '".$cEmail."', '".$facebook."', ".$wapp.");";
	echo $infoQuery;
		if(mysqli_query($con,$infoQuery))
		{
			header("Refresh:0");
		}
		else
		{
			echo "failded";
			//echo $infoQuery;
		}
}
?>
