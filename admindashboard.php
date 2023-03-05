<?php
    session_start();
    $connection = new mysqli('localhost','root','','userdb');
    
    if(! $connection){
        echo var_dump($connection) ;
    }
    else{
        echo 'connected';
        
    };

    if(isset($_GET['deletid'])){
        $deletedId=$_GET['deletid'];
        // echo $deletedId;
        $sql="DELETE FROM new_user WHERE id =$deletedId";

       if (mysqli_query($connection,$sql)==true){
            header('location:admindashboard.php');
       }
    }

    if(isset($_GET['acceptid'])){

        $acceptedId= $_GET['acceptid'];
        $sql= "SELECT * FROM new_user WHERE id='$acceptedId' ";
        $query=$connection->query($sql);
        $data = mysqli_fetch_assoc($query);

    
        if($query->num_rows>0){
            $username = $data['username'];
            $email= $data['email_address'];
            $password = $data['password'];

            $insertSql= "INSERT INTO approved_user (username,email,password,status,user_type) VALUES('$username','$email','$password','yes','user')";

            $deletSql="DELETE FROM new_user WHERE id =$acceptedId";

            if($connection->query($insertSql)==true && $connection->query($deletSql)) {
               echo '<h1>user accepted</h1>';
               header('location:admindashboard.php');
            }
            else{
               echo 'not created error occured';
           }
        }
        else{
           echo 'not found';
        }


    }
    
  
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-end mb-5">
                <div > 
                <button class="btn btn-danger btn-lg btn-block" name="submit"><a href="logout.php" class='text-white text-decoration-none'> Logout</a></button>
                </div>
        </div>
        <div class="row mt-5">
            <div class="col-2"></div>
            <div class="col-8 ">
            <h1 style="text-align:center;">Admin Dashboard</h1>
            <?php
            $sql= "SELECT * FROM new_user";
            $query = mysqli_query($connection,$sql);
            echo '<table class="table table-striped  border border-info">
                <tr>
                <th>Id </th>
                <th>Username</th>
                <th>Email </th>
                <th>Action</th>
                </tr>';
            while(  $data = mysqli_fetch_assoc($query)){

                $id = $data['id'];
                $username = $data['username'];
                $email = $data['email_address'];
                
        
                
                echo "<tr>
                        <td>$id</td>
                        <td>$username</td>
                        <td>$email</td>
                        <td>
                        <span class='btn btn-success'>
                        <a href='admindashboard.php?acceptid=$id'class='text-white text-decoration-none'>Accept</a>
                        </span>
                        </span>
                       
                        <span class='btn btn-danger'>
                        
                        <a href='admindashboard.php?deletid=$id' class='text-white text-decoration-none'>Delete</a>
                        </span>

                        </td>
                    </tr>";
               
            }
            ?>
           
            </div>

            <div class="col-2"></div>
            
        </div>
    </div>
</body>
</html>