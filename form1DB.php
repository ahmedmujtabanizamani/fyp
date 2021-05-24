<?php 
include "config.php";
if(isset($_POST["saveNext"]))
{
	
	//validating data ==========================================
	//personal info
	if(isset($_POST["language"]))
	{
		$language = $_POST["language"];
	}
	if(isset($_POST["name"]))
	{
		$candidate_name = $_POST["name"];
	}
	if(isset($_POST["surname"]))
	{
		$candidate_surname = $_POST["surname"];
	}
	if(isset($_POST["fathername"]))
	{
		$guardian_name = $_POST["fathername"];
	}
	if(isset($_POST["birthdate"]))
	{
		$birthday = $_POST["birthdate"];
	}
	if(isset($_POST["birthplace"]))
	{
		$birth_place = $_POST["birthplace"];
	}
	if(isset($_POST["birthcountry"]))
	{
		$birth_country = $_POST["birthcountry"];
	}
	if(isset($_POST["religion"]))
	{
		$religion = $_POST["religion"];
	}
	if(isset($_POST["gender"]))
	{
		$gender = $_POST["gender"];
	}
	if(isset($_POST["married"]))
	{
		$marital_status = $_POST["married"];
	}
	if(isset($_POST["blood"]))
	{
		$blood = $_POST["blood"];
	}
	//national info
	if(isset($_POST["nationality"]))
	{
		$nationality = $_POST["nationality"];
	}
	if(isset($_POST["cnic"]))
	{
		$cnic = $_POST["cnic"];
	}
	if(isset($_POST["cnicissuedate"]))
	{
		$cnic_issue_date = $_POST["cnicissuedate"];
	}
	if(isset($_POST["cnicissueplace"]))
	{
		$cnic_issue_place = $_POST["cnicissueplace"];
	}
	if (isset($_FILES['pics'])) { 
		$file = $_FILES['pics'];
		$fileName = $file['name'];
		$fileSize = $file['size'];
		$fileTmp = $file['tmp_name'];
		$fileType = $file['type'];
		
		$imageDir = $rootDir."/images/".$email;
		mkdir($imageDir);
		//echo '('.$imageDir.'/'.$fileName.')';
		move_uploaded_file($fileTmp,$imageDir."/".$fileName);
	}

// creating query ==========================================================================
		$infoQuery .= "insert into basic_info ( ";
		$infoQuery .= "email,";
		$infoQuery .= "photo,";
		$infoQuery .= "name, ";
		$infoQuery .= "surname,"; 
		$infoQuery .= "fathername,"; 
		$infoQuery .= "birthdate, ";
		$infoQuery .= "birthplace, ";
		$infoQuery .= "birthcountry, ";
		$infoQuery .= "religion,";
		$infoQuery .= "gender,";
		$infoQuery .= "married,";
		$infoQuery .= "blood,";
		$infoQuery .= "nationality,";
		$infoQuery .= "cnic,";
		$infoQuery .= "cnicissuedate,";
		$infoQuery .= "cnicissueplace,";
		$infoQuery .= "language";
		$infoQuery .= ")";
		$infoQuery .= " values ( '".$email."', '".$fileName."', '".$candidate_name."', '".$candidate_surname."', '".$guardian_name."', '".$birthday."', '".$birth_place."', '".$birth_country."', '".$religion."', '".$gender."', '".$marital_status."', '".$blood."', '".$nationality."', ".$cnic.", '".$cnic_issue_date."', '".$cnic_issue_place."', '".$language."');";
		if(mysqli_query($con,$infoQuery))
		{
			header("Refresh:0");
			//header('Location: form2.php');
			//exit();
		}
		else
		{
			echo "failded";
			//echo $infoQuery;
		}
}	
