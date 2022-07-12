
<?php
session_start(); 
include "sql.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
   
	//  $pst=$_POST['uname'];
    //  print_r($pst);
	//  die;

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$email = validate($_POST['email']);
	// alert($uname);
	$pass = validate($_POST['password']);
	// $email = validate($_POST['email']);

	if (empty($email)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = ($pass);

        
		$sql = "SELECT * FROM users WHERE email='$email'";
		// dd($sql);

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $pass) {
				$_SESSION['username'] = $row['username'];
				$_SESSION['id'] = $row['id'];
				// $value = 'something from somewhere';
                // setcookie("TestCookie", $value);

            	header("Location: index.php");
		        exit();
            }else{
				header("Location: login.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: login.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: login.php");
	exit();
}
?>
