<?php
// session_start();
// include "sql.php";

// if (isset($_POST['uname']) && isset($_POST['requested_by'])) {

// 	function validate($data)
// 	{
// 		$data = trim($data);
// 		$data = stripslashes($data);
// 		$data = htmlspecialchars($data);
// 		return $data;
// 	}
// 	$created_at = validate($_POST['date']);
// 	$comment = validate($_POST['comments']);
// 	$uname = validate($_POST['uname']);
// 	$request = validate($_POST['requested_by']);

// 	$user_data = 'date=	' . $created_at . 'requested_by=' . $request;
// 	// hashing the password
// 	// $pass = md5($pass);
// 	// $pass = ($pass);

// 	$sql = "SELECT * FROM requests WHERE requested_by='$request' ";
// 	$result = mysqli_query($conn, $sql);

// 	if (mysqli_num_rows($result) > 0) {
// 		$sql2 = "INSERT INTO requests(created_at,comments) VALUES('$created_at', '$request')";
// 		$result2 = mysqli_query($conn, $sql2);
// 		//    if ($result2) {
// 		//    	 header("Location: signup.php?success=Your account has been created successfully");
// 		//      exit();
// 		//    }
// 	} else {
// 		header("Location: index.php");
// 		exit();
// 	}
// }
?>
	<?php
	session_start();
	include "sql.php";
	//  if (isset($_POST['submit']) && isset($_POST['comments'])) {
	//  	$created_at = $_POST['date'];
	//  	$comment = $_POST['comments'];
		// $myvar = "<script> localStorage.getItem('Resources') </script>";
        //  echo $created_at;
		// //  $get=$_COOKIE['Resources'];
        // //  echo $myvar;
		// $us = $_POST['us'];
		print_r($_POST[0]);
        // echo $us;
		// $sql = "INSERT INTO requests(id,requested_by,status,environment,db,comments) VALUES(1,1,0,'UAT','db','sdhfbdskj');";
		// $result = mysqli_query($conn, $sql);

		//  var_dump($result); 
		// //  print_r($myvar);
		// }
		//  else{
		// 	echo 'dxvbdxfj';
		//  }
	// 	//  $sql = "SELECT * FROM users";
	// 	//  $result = mysqli_query($conn, $sql);
	// 	//  print_r($result);
	// 	//   $sql1 = "SELECT users.id, requests.requested_by FROM users INNER JOIN requests ON users.id = requests.requested_by";
	// 	   $sql1 = "SELECT * FROM users INNER JOIN requests ON users.id = requests.requested_by";
    //        $result = mysqli_query($conn, $sql1);
    //     //    echo $result;
	// 	//    echo $comment;
	// 	//    print_r($result);
	// }
	// else if(mysqli_num_rows($result) > 0) {
	// $sql2 = "INSERT INTO requests(id,dbbackup_date,requested_by,status,created_at,updated_at,environment,db,comments) VALUES('1','20/05/2000','1',0,$created_at,'20/05/2000','UAT','db','$comment')";
	// 	$result2 = mysqli_query($conn, $sql2);
	// 	echo $result2;
	// 	print_r($result2);
	// }
	
    //  else {
    // 	echo "sql wrong insert";
    // }

	// $sql = "INSERT INTO requests (id) VALUES (1)";
// var_dump($sql);

// if ($conn->query($sql) === TRUE) {
//   echo "New record created successfully";
// } else {
//   echo "Error: " . $sql . "<br>" . $conn->error;
// }

// $conn->close();
    

// 	?> 
	       

<!-- // 		$sql1 = "SELECT users.id, requests.requested_by FROM users
// INNER JOIN requests ON users.id = requests.requested_by";
// 		$result = mysqli_query($conn, $sql1);
// 		echo $result2;
// 		print_r($result2); -->