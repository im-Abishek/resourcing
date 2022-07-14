	<?php
	session_start();
	include "sql.php";
	//  if (i) {
	 	 $created_at = $_POST['date'];
	     $comment = $_POST['comments'];
		 $status = 0;
		 $environment=$_POST['Environment'];
		 $db=$_POST['Db'];
		// echo '<pre>';
		// print_r($created_at.$id.$status.$environment.$db.$comment);
		// die;
	 	 $name= $_SESSION['username'];
	 	 $id=$_SESSION['id'];
  		 $sql = "insert into requests(dbbackup_date,requested_by,status,environment,db,comment) values('$created_at','$id','$status','$environment','$db','$comment')";
		 $result = mysqli_query($conn, $sql);
		if($result){
			header("location: index.php");
		}else{
			echo "error";
		}
// 	?> 
	       