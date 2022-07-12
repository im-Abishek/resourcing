<?php

// $sql = "CREATE TABLE `users` (
//     `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
//     `username` varchar(100) NOT NULL,
//     `email` varchar(100) NOT NULL,
//     `password` varchar(100) NOT NULL
//   )";
    $url='127.0.0.1';
    $username='root';
    $password='';
    $dbre='db_resource';
    $conn=mysqli_connect($url,$username,$password,$dbre);
    //  if($conn){
    //           echo "Successfully connected to server";
    //       }
    //       else{
    //           echo "Failed";
    //       }
?>