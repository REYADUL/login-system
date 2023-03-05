<?php

   $connection = new mysqli('localhost','root','','userdb');
   if(! $connection){
        var_dump($connection) ;
   }

    if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $email_address=$_POST['email'];
        $password=$_POST['password'];
        $passwordAgain=$_POST['password-again'];
        $empMsg='Please fill up this fieeld';
        // if(empty( $username|| $email || $password || $passwordAgain)){
        //     $empMsg = 'Please fill up this fieeld';
        // }

        if(!empty($username)&&!empty($email_address)){
            if($password===$passwordAgain){
                $sql= "INSERT INTO new_user (username,email_address,password) VALUES('$username','$email_address','$password')";
             if($connection->query($sql)==true) {
                // echo 'user created';
                header('location:login.php?loginsuccess');
             }
             else{
                echo 'not created';
            }
            }
            else{
                echo 'not matched';
            }
            
        }
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand">Navbar</a>
  <form class="form-inline">
    <a href="login.php" style="margin-right: 10px;">Login</a>|<a href="#" style="margin-left: 5px;">Registration</a>
  </form>
</nav>
    <h1>login system</h1>

    <div class="container">
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-4" style="margin-top: 50px;">
                <form action="registration.php" method="POST">

                    <div class="mt-2">
                        <label class="form-label" for="username" >
                            User name
                        </label>
                            <input type="text" class="form-control"name="username" id="" value="<?php if(isset($_POST['submit'])){echo $username ;} ?>" >
                        
                        
                        <?php 
                            if(isset($_POST['submit'])&& $_POST['username']==false){
                                echo "<span class='text-danger'>".$empMsg."
                                </span>";
                            }
                        ?>
                    </div>
                    <div class="mt-2">
                        <label class="form-label" for="email">
                            Email
                        </label>
                            <input type="text" class="form-control"name="email" id="" value="<?php if(isset($_POST['submit'])){echo $email_address;} ?>">
                        
                        <?php 
                            if(isset($_POST['submit'])&& $_POST['email']==false){
                                echo "<span class='text-danger'>".$empMsg."
                                </span>";
                            }
                        ?> 
                    </div>
                    <div class="mt-2">
                        <label class="form-label" for="password">
                            Password
                        </label>
                            <input type="password" class="form-control"name="password" id="" value="<?php if(isset($_POST['submit'])){echo $password ;} ?>">
                        
                        <?php 
                            if(isset($_POST['submit'])&& $_POST['password']==false){
                                echo "<span class='text-danger'>".$empMsg."
                                </span>";
                            }
                        ?>
                    </div>
                    <div class="mt-2">
                        <label class="form-label" for="password-again">
                            Password Again
                        </label>
                        <input type="password" class="form-control" name="password-again" id="">

                        <?php 
                            if(isset($_POST['submit'])&& $_POST['password-again']==false){
                                echo "<span class='text-danger'>".$empMsg."
                                </span>";
                            }
                        ?> 
                    </div>
                    <div class="mt-2">
                        
                        <button class="btn btn-success btn-lg btn-block" name="submit">Submit</button>
                        
                    </div>

                </form>
            </div>
            <div class="col-4">
                
            </div>
        </div>
    </div>
</body>
</html>






