<?php
session_start();
/*
Filename: uploaddetailstudent.php
Purpose: Establish connection to MySQL database and upload detail.
Author: Anushka Mayank Mishra Naman Agrawal Nikhil Kushwaha
Last edited: 26/04/18
*/

$server = "localhost";
$user = "root";
$pass = "";
$db = "scholarshipdb";

//Establish connection to our database
	$conn = mysqli_connect($server, $user, $pass, $db);

if(!$conn) {
	die("Could not connect to data base:".$conn->connect_error);
}

$target_dir = $_SESSION['login_user'].'/';

$ins_query;
if( isset($_POST['submit'])) {
	
	$name=mysqli_real_escape_string($conn,$_POST['inputName']);
    $dob=mysqli_real_escape_string($conn,$_POST['inputDOB']);
    $gen=mysqli_real_escape_string($conn,$_POST['inputGender']);
    $email=mysqli_real_escape_string($conn,$_POST['inputEmail']);
    $mob=mysqli_real_escape_string($conn,$_POST['inputMobile']);
    $cou=mysqli_real_escape_string($conn,$_POST['inputCourse']);
	$br=mysqli_real_escape_string($conn,$_POST['inputBranch']);
    $yr=mysqli_real_escape_string($conn,$_POST['inputYear']);
    $roll=mysqli_real_escape_string($conn,$_POST['inputRollNo']);
    $uroll=mysqli_real_escape_string($conn,$_POST['inputUpseeRollNo']);
    $cat=mysqli_real_escape_string($conn,$_POST['inputCategory']);
    $rank=mysqli_real_escape_string($conn,$_POST['inputRank']);
	$crank=mysqli_real_escape_string($conn,$_POST['inputCategoryRank']);
    $cadd=mysqli_real_escape_string($conn,$_POST['inputCrrAddress']);
    $padd=mysqli_real_escape_string($conn,$_POST['inputPermAddress']);
    $city=mysqli_real_escape_string($conn,$_POST['inputCity']);
    $state=mysqli_real_escape_string($conn,$_POST['inputState']);
    $pin=mysqli_real_escape_string($conn,$_POST['inputZip']);
    $fn=mysqli_real_escape_string($conn,$_POST['inputFatherName']);
    $mn=mysqli_real_escape_string($conn,$_POST['inputMotherName']);
    $fo=mysqli_real_escape_string($conn,$_POST['inputFatherOccupation']);
    $mo=mysqli_real_escape_string($conn,$_POST['inputMotherOccupation']);
    $fi=mysqli_real_escape_string($conn,$_POST['inputFatherIncome']);
    $mi=mysqli_real_escape_string($conn,$_POST['inputMotherIncome']);
    $inc=mysqli_real_escape_string($conn,$_POST['inputIncome']);
	
	$ins_query="INSERT INTO `student`(`Name`, `DOB`, `Gender`, `Email`, `Mobile No`, `Course`, `Branch`, `Year`, `Rollnumber`, `UPRollnumber`, `Category`, `Rank`, `CatRank`, `CAddress`, `PAddress`, `City`, `State`, `Pincode`, `Fathername`, `Mothername`, `Fatherocc`, `Motherocc`, `FIncome`, `MIncome`, `Income`) VALUES ('$name','$dob','$gen','$email','$mob','$cou','$br','$yr','$roll','$uroll','$cat','$rank','$crank','$cadd','$padd','$city','$state','$pin','$fn','$mn','$fo','$mo','$fi','$mi','$inc')";
	
	//file related code
	$ext1 = strtolower(pathinfo($target_dir . basename($_FILES["photo"]["name"]),PATHINFO_EXTENSION));
	$ext2 = strtolower(pathinfo($target_dir . basename($_FILES["sign"]["name"]),PATHINFO_EXTENSION));
	if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir."photo".'.'.$ext1)) {
        echo "The file ". basename( $_FILES["photo"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
	
	if (move_uploaded_file($_FILES["sign"]["tmp_name"], $target_dir."sign".'.'.$ext2)) {
        echo "The file ". basename( $_FILES["sign"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
	
	if(mysqli_query($conn, $ins_query)) {
		echo "sucess";
	}

	else {
    	die("Error in inserting records:".mysql_error);
	}

	mysqli_close($conn);
	
}

else {
	echo "error2";
}
?>