<?php 
include("../backend/config.php");
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("location: ./login.php");
} 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("./components/header_links.php"); ?>
    
    <link rel="stylesheet" href="./css/your_uploads.css">
    <title>Return Books</title>
</head>

<body>
   

    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
       <?php include("./components/navbar.php"); ?>


        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <h1 class="h2 mb-0 ls-tight">Dashboard</h1>
                            </div>
                        </div>
                       
                        <ul class="nav nav-tabs mt-4 overflow-x border-0">
                            <li class="nav-item ">
                                <a href="./issue.php" class="nav-link font-regular">Borrow</a>
                            </li>
                            <li class="nav-item">
                                <a href="./return.php" class="nav-link active">Books To Return</a>
                            </li>
                            <li class="nav-item">
                                <a href="./borrowed.php" class="nav-link font-regular">Borrowed By You</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>

            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    
                    <div class="card shadow border-0 mb-7">
                        <div class="card-header">
                            <h5 class="mb-0">Books To Return</h5>
                        </div>

                        <div class="table-responsive" style="padding: 10px 10px;">
                            <table class="table table-hover table-nowrap" id="myTable" style="padding: 30px 20px  !important;">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" style="font-size: 16px;">S.No.</th>
                                        <th scope="col" style="font-size: 16px;">Book ID</th>
                                        <th scope="col" style="font-size: 16px;">Book Name</th>
                                        <th scope="col" style="font-size: 16px;">Borrowed Date</th>
                                        <th scope="col" style="font-size: 16px;">Status</th>
                                        <th scope="col" style="font-size: 16px;">Fine</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $s_id=$_SESSION['student_id'];
                                        $stmt="SELECT issued.book_id as book_id,issued.user_id,issued.issued_date,book_name.book_name,issued.borrow_id,issued.fine FROM issued
                                        JOIN book_name ON (issued.book_id=book_name.book_id) WHERE issued.user_id=$s_id AND issued.returned_date IS NULL";
                                        $sql=mysqli_prepare($conn, $stmt);
                            
                                        $result=mysqli_stmt_execute($sql);
                                        if ($result){
                                                $data= mysqli_stmt_get_result($sql);
                                                $sno=1;
                                                while ($row = mysqli_fetch_array($data)){
                                                    $b_id= $row['borrow_id'];
                                    
                                                    // $f=1;
                                    
                                        if(!$row['fine']){
                                            $date1=date("y-m-d");
                                            // echo $date1;
                                            $date1=date_create($date1);
                                            $date2= substr($row["issued_date"],0,10);
                                            $date2=date_create($date2);
                                            // echo $date2;
                                            $diff=date_diff($date1,$date2);
                                            // echo $diff->format("%R%a");
                                        }
                                        if($diff->format("%R%a")>15)
                                        {
                                            $f=1;
                                        }
                                        else{
                                            $f=0;
                                        }
                                            ?>
                               
                                <tr>        
                                    <td style="font-size: 18px;">
                                        <?php echo $sno;?>
                                    </td>

                                    <td style="font-size: 18px;">
                                        <?php echo $row["book_id"];?>
                                    </td>
                                    <td style="font-size: 18px;">
                                        <?php echo $row["book_name"];?>
                                    </td>
                                    <td style="font-size: 18px;">
                                        <?php echo substr($row["issued_date"],0,10);?>
                                    </td>

                                    <td class="d-flex">

                                         <form class="col-auto" action="./return_backend.php" 
                                        style="max-width: fit-content;" method="POST">
                                            <input type="text" name="borrow_id" id="borrow_id" hidden
                                                value="<?php echo $b_id?>">
                                            <button type="submit"
                                             class="btn btn-danger p-2">
                                                Return Book
                                            </button>
                                        </form>
                                    </td>
                                    <td style="font-size: 18px;">
                                        <?php 
                                        // if($f==1)
                                        // {
                                            // echo "Applicable";
                                        // }
                                        // else{
                                            echo "__";
                                        // }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                // }                                  
                                            
                                            $sno++;
                                            }
                                            mysqli_stmt_close($sql);
                                            mysqli_close($conn);
                                        }
                                        
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php include("./components/scripts.php"); ?>

</body>

</html>