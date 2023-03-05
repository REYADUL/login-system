<?php
  session_start();
  
 

//   if(!empty($_SESSION['login'])){
//     echo $_SESSION['login'];
//   }
//   else{
//     header('location:login.php');
//   }

// header('location:login.php');
  
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body >
    <h1 style="text-align:center;">welcome !! succesfully login</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12"></div>
            <div class="col-md-4 col-sm-12">
                
                <button class="btn btn-success btn-lg btn-block" name="submit"><a href="logout.php"> <span .text-danger>Logout</span></a></button>
            </div>
            <div class="col-md-4 col-sm-12"></div>
        </div>
    </div>
</body>
</html>