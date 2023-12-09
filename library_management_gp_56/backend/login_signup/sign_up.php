<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>sign up api</title>
   
</head>
<body>
<!-- <div id="loader" class="center"></div> -->
    
<?php

    include('../config.php');
    session_start();
    echo "Session Started..";

    if ($_POST['email'] && $_POST['phone'] && $_POST['password']) {
        echo "Entries Entered";
        $stmt="SELECT id FROM `users` WHERE email=(?)";
        $sql=mysqli_prepare($conn, $stmt);


        mysqli_stmt_bind_param($sql,"s",$_POST["email"]);
        $result=mysqli_stmt_execute($sql);
        $data= mysqli_stmt_store_result($sql);
        $no_of_row=mysqli_stmt_num_rows($sql);

        if ($no_of_row>0){
            
        //   echo $no_of_row;
            mysqli_stmt_close($sql);
            echo "<script>alert('Sorry email already registered.');
            window.location.href='../../frontend/login.php';
            </script>";
        }
        else{
            mysqli_stmt_close($sql);
            echo "Password Created";
            $pass=password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            $digits=4;
            $code=000;
            $stmt="INSERT INTO `users` (name,email,phone,password) VALUES (?,?,?,?)";
            $sql=mysqli_prepare($conn, $stmt);
        
            //binding the parameters to prepard statement
            mysqli_stmt_bind_param($sql,"ssis",$_POST['name'],$_POST['email'],$_POST['phone'],$pass);
        
            $result=mysqli_stmt_execute($sql);

            if ($result) {
                echo "Shashikant"; ?>
                <script>
                    alert("Account Successfully Created");
                window.location.href="../../frontend/login.php";
                </script>
            <?php 
                // $code=uniqid('',true);
                echo '<script>
                alert("Account Successfully Created"'.mysqli_error($conn).')
                window.location.href="../../frontend/login.php"
                <script>';
        
            } 
            
            else {
            echo mysqli_error($conn);
                echo '<script>
                alert("Something went wrong. We are facing some technical issue. It will be resolved soon. "'.mysqli_error($conn).')
                window.location.href="../../frontend/login.php"
                <script>';
            }
        }
    
        
    } 
    else {
        echo '<script>
        alert("Something went wrong... Please fill all the inputs.")
        windows.location.href="../../frontend/login.php"
        <script>';
    }
?>

</body>
</html>