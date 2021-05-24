<?php require_once "controllerUserData.php"; ?>
<?php

if( isset($_POST["action1"]) )
{
	$id = $_POST["id"];
	$query = "update submitted set status='accepted' where email ='".$id."';";
	mysqli_query($con, $query);
}

if( isset($_POST["action2"]) )
{
	$id = $_POST["id"];
	$query = "update submitted set status='submitted' where email ='".$id."';";
	mysqli_query($con, $query);
}  

$query = "select a.photo as photo, a.email as email, a.name as name, b.status as status from basic_info a join submitted b on a.email=b.email;";
$result = mysqli_query($con, $query);

while($row = mysqli_fetch_assoc($result)){
	echo '<div style="display:flex; justify-content:space-around; ">';
	echo '<img src="images/'.$row['email'].'/'.$row['photo'].'" width="80px" />';
	echo $row['name'].'<br>';
	echo '<form method="post" style="display:inline"><input name="id" type="hidden" value="'.$row["email"].'"><input style="display:inline;" type="submit" name="action1" value="accept"></form>';
	
	echo $row['status'];
	echo '<form method="post" style="display:inline"><input name="id" type="hidden" value="'.$row["email"].'"><input style="display:inline;" type="submit" name="action2" value="reverse"></form>';
	echo '</div>';
}


?>

