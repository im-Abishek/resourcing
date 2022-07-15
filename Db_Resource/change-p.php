
<?php 
session_start();

include "sql.php";

if (isset($_SESSION['id']) && isset($_SESSION['username'])  && isset($_SESSION['password'])) {


if (isset($_POST['np'])
    && isset($_POST['c_np'])) {

// print_r($_POST);
// die;

    // $op = validate($_POST['op']);
	$np = $_POST['np'];
	$c_np = $_POST['c_np'];
    	// hashing the password
    	// $op = ($op);
    	// $np = ($np);
        $id = $_SESSION['id'];
		$op=$_SESSION['password'];
		// echo '<pre>';
		//  print_r($op);
		//  die;

        $sql = "SELECT * FROM users WHERE id='$id' ";
		// var_dump($sql);
        $result = mysqli_query($conn, $sql);
		// echo '<pre>';
		// print_r($result);
		// die;
		 
        if(mysqli_num_rows($result) === 1){
        	
        	$sql_2 = "UPDATE users
        	          SET password='$np'
        	          WHERE id='$id'";
        	$query_run=mysqli_query($conn, $sql_2);
			header("Location: uat.php");
			exit();
        	
        }else {
        	header("Location: uat.php");
	        exit();
        }

    }

    
}else{
	// header("Location: index.php");
	echo 'Something Went Wrong';
	exit();
}
