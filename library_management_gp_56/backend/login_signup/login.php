<?php

include("../config.php");
session_start();
if ($_POST["email"]) {
            $stmt="SELECT id,name,email,password,is_admin FROM `users` WHERE email=(?) AND deleted_at IS NULL LIMIT 1";
            $sql=mysqli_prepare($conn, $stmt);

            //binding the parameters to prepard statement
            $pass=$_POST["password"];
            $is_admin=0;
            // mysqli_stmt_bind_param($sql,"si",$_POST["email"],$is_admin);
            mysqli_stmt_bind_param($sql,"s",$_POST["email"]);
            $result=mysqli_stmt_execute($sql);
            $data= mysqli_stmt_get_result($sql);
            $row=mysqli_fetch_array($data);
            if (!empty($row['id'])){
                $_SESSION["student_id"]=$row["id"];
                
                // $data= mysqli_stmt_store_result($sql);
                
                        if (password_verify($pass, $row['password'])) 
                        {
                            
                            $logged=true;
                            
                           if (1==1) {
                                $_SESSION["student_id"]=$row["id"];
                                $_SESSION["student_email"]=$_POST['email'];
                                $_SESSION["verified"]=1;
                                $digits=4;
                                $code=rand(pow(10, $digits-1), pow(10, $digits)-1);
                                $stmt2="SELECT created_at,updated_at FROM `users` WHERE id=(?)";
                                $sql2=mysqli_prepare($conn, $stmt2);
                                //binding the parameters to prepard statement AND verification_code IS NOT NULL
                                mysqli_stmt_bind_param($sql2,"i",$row['id']);
                                $result2=mysqli_stmt_execute($sql2);
                                }
                                else{


                                }   
                                }                               
                           } 
                           else {
                            mysqli_stmt_close($sql);
                            mysqli_close($conn);
                           }
                            if ($row['is_admin']==0) { // if student
                                $_SESSION["loggedin"]=$logged;
                                $_SESSION["student_id"]=$row["id"];
                                $_SESSION["student_email"]=$row["email"];
                                $_SESSION["verified"]=1;
                                $_SESSION["user_email"]=$_POST["email"];
                                echo "<script>
                                window.location.href='../../frontend/dashboard.php';
                                </script>";
                            } 
                            elseif ($row['is_admin']==1) { // if super admin
                                # code...
                                $_SESSION["is_admin"]="yes";
                                $_SESSION['admin_id']=$row['id'];
                                echo "<script>alert('Successfully logged in.');
                                window.location.href='../../frontend/admin/dashboard.php';
                                </script>";
                            }
                            elseif ($row['is_admin']==2) { // if super admin
                                # code...
                                $_SESSION["is_admin"]="yes";
                                $_SESSION['admin_id']=$row['id'];
                                echo "<script>alert('Successfully logged in.');
                                window.location.href='../../frontend/admin/dashboard.php';
                                </script>";
                            }
                            
                            else {
                                # code...
                                $_SESSION["loggedin"]=$logged;
                                $_SESSION["student_id"]=$row["id"];
                                $_SESSION["student_email"]=$row["email"];
                                $_SESSION["verified"]=1;
                                $_SESSION["user_email"]=$_POST["email"];
                                echo "<script>
                                window.location.href='../../frontend/dashboard.php';
                                </script>";
                            }
                           }
                           
                    
            // }
            else {
                # code...
                echo "<script>alert('Sorry Email Id Not Registered.');
                window.location.href='../../frontend/login.php';
                </script>";
            }
            


?>