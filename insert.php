<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Applicants</title>
</head>
<body>
    <?php

    // database details
    
    $host = "localhost";
    $username = "root";
    $password ="";
    $dbname ="jobs";
   
    // creating  a connection
    $conn = mysqli_connect($host,$username,$password,$dbname);

    //check connection
    if($conn === false){
        die("ERROR: Could not connect." . mysqli_connect_error());
    }
    //Taking all 7 values from the form data(input)
    $name= $_POST['name'];
    $email= $_POST['email'];
    $gender= $_POST['sex'];
    $birthday= $_POST['birthday'];
    $phonenumber= $_POST['phone'];
    $jobfield= $_POST['job'];

    //performing insert query execution
     
    $sql = "INSERT INTO jobfield (name,email,gender,birthday,phonenumber,jobfield) VALUES( '$name', '$email','$gender','$birthday','$phonenumber','$jobfield')";
    
   if(mysqli_query($conn,$sql)){
    echo "<h2> data stored successfully";
   }

   //close connection
   mysqli_close($conn);
   ?>


</body>
</html>