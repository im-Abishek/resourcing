<?php 
session_start();

include "sql.php";

if (isset($_SESSION['id']) && isset($_SESSION['username'])  && isset($_SESSION['password'])) {


if (isset($_POST['np'])
    && isset($_POST['c_np'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
    // $op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
    
    if(empty($np)){
      header("Location: index.php.php?error=New Password is required");
	  exit();
    }else if($np !== $c_np){
      header("Location: index.php?error=The confirmation password  does not match");
	  exit();
    }else {
    	// hashing the password
    	// $op = ($op);
    	// $np = ($np);
        $id = $_SESSION['id'];
		$op=$_SESSION['password'];
		// echo '<pre>';
		//  print_r($op);
		//  die;

        $sql = "SELECT * FROM users WHERE id='$id' AND password='$op'";
		// var_dump($sql);
        $result = mysqli_query($conn, $sql);
		 
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE users
        	          SET password='$np'
        	          WHERE id='$id'";
        	$query_run=mysqli_query($conn, $sql_2);
        	
			if($query_run){
				$_SESSION['success']="Your password has been changed successfully";
				header("Location: index.php");
				exit();
			}else{
				echo "something went wrong";
			}
			
			

        }else {
        	header("Location: index.php?error=Incorrect password");
	        exit();
        }

    }

    
}else{
	// header("Location: index.php");
	echo 'error';
	exit();
}

}else{
    //  header("Location: index.php");
	echo 'error';
     exit();
}