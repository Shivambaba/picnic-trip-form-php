<?php
$insert = false;   // for successful message
// for has action= index.php so when (submit btn inside form )is clicked this page
// is called 
    if(isset($_POST['name'])){  //if name is set in form then only connect willmade
    $server = "localhost";
    $username = "root";
    $password = "";


    $con = mysqli_connect($server , $username , $password);
    if(!$con){ // if not connected to database
        die("connection to the database failed due to" .mysqli_connect_error());
    }
    //echo "successfully connected";

    // get value from form
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    // sql query to insert in table  // 'trip.trip' 
    // name of database is trip and name of table is also trip  // row name
    $sql = "INSERT INTO `triipp`.`triipp` (`name`,`gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$gender', '$email', '$phone', '$desc', current_timestamp());";


   // echo $sql;
    if($con->query($sql) == true){  //insert and display success message
      //  echo "successfull inserted";
      $insert = true ; // if insetted true
    }
    else{ 
        echo "error : $sql <br> $con->error"; //$con obeject mae key hae error 
        // display the value of that error
    }

    //close connection
    $con->close();

}
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <img  class="bgimg"  src="bg.jpg" alt="trip-image">
    <div class="container">
        <h1>Welcome to IIT kharagpur US trip form</h1>
        <p>Enter your details and submit this form to continue 
            your participation in the trip</p>

        <?php      //echo we query is submitted
        if($insert == true){
            echo "<p class='submitmsg'>Thank you for submitting the form </p>";
        }
        ?>

        <form action="index.php" method="post" >
            <input type="text" name="name"  id="name" placeholder="Enter your name">
            <input type="text" name="gender"  id="gender" placeholder="Enter your gender">
             
            <input type="email" name="email"  id="email" placeholder="Enter your email">
            <input type="phone" name="phone"  id="phone" placeholder="Enter your phone no">
            <textarea name="desc" id="desc" cols="30" rows="5" placeholder="Enter any other info here"></textarea>
            <button class="btn"> submit </button>
            
    </div>
   

    <script src="indec.js"></script>
</body>
</html>


