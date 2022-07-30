
<?php 
// Validations 
session_start() ;
$step1_flag = $step2_flag = $step3_flag = $step4_flag = $step5_flag = $success = true ;
if(isset($_POST['prev2'])){
	$_SESSION['otherstep'] = 'notset' ;	
}

if(isset($_POST['next1'])){
	$_SESSION['firstname'] = $_POST['firstname'] ; 
	$_SESSION['lastname'] = $_POST['lastname'] ;
	if(empty($_POST['firstname'])){
		$firstnameErr = "Firstname can't be Empty" ;
		$step1_flag = false ;
	}
	if(empty($_POST['lastname'])){
		$lastnameErr = "Lastname can't be Empty" ;
		$step1_flag = false ;
	}
	if($step1_flag){
		$_SESSION['otherstep'] = 'set' ; 
	}

}else{
	$_SESSION['otherstep'] = 'notset' ;
}


if(isset($_POST['next2'])){
	$_SESSION['username'] = $_POST['username'] ; 
	$_SESSION['email'] = $_POST['email'] ;
	if(empty($_POST['email'])){
		$emailErr = "Email can't be Empty" ;
		$step2_flag = false ;
	}elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
		  $emailErr = "Invalid email format";
		  $step2_flag = false ;
	}

	if(empty($_POST['username'])){
		$usernameErr = "Username can't be Empty" ;
		$step2_flag = false ;
	}
		$_SESSION['otherstep'] = 'set' ; 
}


if(isset($_POST['next3'])){
	if(isset($_POST['gender'])){ 
		$_SESSION['gender'] = $_POST['gender'] ;	
	}else{
		$genderErr = "Please select the Gender" ;
		$step3_flag = false ;
	}
		$_SESSION['otherstep'] = 'set' ; 
}

if(isset($_POST['next4'])){
	$_SESSION['state'] = $_POST['state'] ;
	if(empty($_POST['state'])){
		$stateErr = "Please select Your State" ;
		$step4_flag = false ;
	}
		$_SESSION['otherstep'] = 'set' ; 
}

if(isset($_POST['next5'])){
	if(isset($_POST['hobbies'])){
		$_SESSION['hobbies'] = $_POST['hobbies'] ;
		if(count($_POST['hobbies']) < 2){
			$hobbiesErr = "Please Select Minumum 2 Hobbies" ;
			$step5_flag = false ;
		}
	}else{
			$hobbiesErr = "Please Select Minumum 2 Hobbies" ;
			$step5_flag = false ;
	}
		$_SESSION['otherstep'] = 'set' ; 
}

if(isset($_POST['submit'])){

$firstname = $_SESSION['firstname'] ;
$lastname = $_SESSION['lastname'] ;
$username = $_SESSION['username'] ;
$email = $_SESSION['email'] ;
$gender = $_SESSION['gender'] ;
$state = $_SESSION['state'] ;
$hobbies = implode( ",", $_SESSION['hobbies']) ;

$conn = mysqli_connect("localhost" , "root" , "root" , "test") or die("Not connected to Database");
$qry = "INSERT INTO `users`(`firstname`, `lastname`, `username`, `email`, `gender`, `state`, `hobbies`) VALUES ('". $firstname ."','". $lastname ."','". $username ."','". $email ."','". $gender ."','". $state ."','". $hobbies ."')" ;
 $run = mysqli_query($conn , $qry)	 ;
 if($run){
 	$success = true ;
 	session_destroy();
 }else{
 	echo "not run" ;
 	$success = false ;
 }
}


if(isset($_POST['submit']) || isset($_POST['prev3']) || isset($_POST['prev4']) || isset($_POST['prev4']) || isset($_POST['prev5']) || isset($_POST['prev6'])){
	$_SESSION['otherstep'] = 'set' ;
}
?>
