<?php
include "config.php"; 
$email = $_SESSION["email"];

if(isset($_POST["submit"]))
{
	$docDir = $rootDir."/documents/".$email;
	mkdir($docDir);
	$docs = array("matricCert", "interCert", "matricMark", "interMark");
	$docsSuccess = array("$", "$", "$", "$");
	
	for( $i = 0; $i<count($docs); $i+=1 )
	{
		if (isset($_FILES[$docs[$i]])) { 
			$errors= array();
			$file = $_FILES[$docs[$i]];
			$fileName = $file['name'];
			$fileSize = $file['size'];
			$fileTmp = $file['tmp_name'];
			$fileType = $file['type'];
			$fileExt=strtolower(end(explode('.',$file['name'])));
			
			$extensions= array("jpeg","jpg","pdf");
			
			if(in_array($fileExt,$extensions)=== false){
			$errors[]="extension not allowed, please choose a JPEG or PDF file.";
			}
		
			if($fileSize > 2097152){
				$errors[]='File size must be excately 2 MB';
			}
			
			if(empty($errors)==true){
					move_uploaded_file($fileTmp,$docDir."/".$docs[$i].".".$fileExt);
					$docsSuccess[$i] = $fileExt;
			}else{
				print_r($errors);
			}
		}
	}

// creating query ==========================================================================
	$infoQuery = "insert into docs_info ( ";
	$infoQuery .= "email,";
	$infoQuery .= $docs[0].",";
	$infoQuery .= $docs[1].",";
	$infoQuery .= $docs[2].",";
	$infoQuery .= $docs[3];
	$infoQuery .= ")";
	$infoQuery .= " values ( '".$_SESSION['email']."', '".$docsSuccess[0]."', '".$docsSuccess[1]."', '".$docsSuccess[2]."', '".$docsSuccess[3]."');";
	if(mysqli_query($con,$infoQuery))
	{
		
		if(mysqli_query($con,"insert into submitted (email, date) values ('".$email."', '".date('Y-m-d')."');"))
		{
			header("Refresh:0");
		}
	}
	else
	{
		echo "failded";
		//echo $infoQuery;
	}
}
?>
