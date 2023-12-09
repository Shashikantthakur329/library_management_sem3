<?php
session_start();
if (!isset($_SESSION["is_admin"])) {
  header("location: ./login.php");
}
include("../../backend/config.php");
if(isset($_POST['time_period']))
{
    $var='0';
    $tp=$_POST['time_period'];
    if($tp='monthly')
    {
        $var='m';
    }
    else if($tp=='quarterly')
    {
        $var='q';
    }
    else if($tp=='yearly')
    {
        $var='y';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php require('./admin_components/header_links.php'); ?>
    <title>Transactions</title>
</head>

<body>

    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <?php require('./admin_components/side_bar.php'); ?>
        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight"> Add Books</h1>
                            </div>
                            <!-- Actions -->
                            <div class="col-sm-6 col-12 text-sm-end">
                                <div class="mx-n1">
                                    <!-- <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                        <span class=" pe-2">
                                            <i class="bi bi-pencil"></i>
                                        </span>
                                        <span>Edit</span>
                                    </a> -->
                                    <a href="./new_book.php" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                        <span class=" pe-2">
                                            <i class="bi bi-plus"></i>
                                        </span>
                                        <span>Add New Books</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Nav -->
                        <ul class="nav nav-tabs mt-4 overflow-x border-0">
                        </ul>
                    </div>
                </div>
            </header>
            <!-- Main -->
            <?php $t='../admin/transaction_monthly.php'; ?>
            <main class="py-5 bg-surface-secondary">
                <div class="container-fluid pb-5">
                <form class="px-sm-5" action="../admin/transaction_timely.php" method="post"  
                    onsubmit="" enctype="multipart/form-data" style="    margin: 15px 0px; padding: 10px 10px;">                        
                    <label for="type">Get Transaction Details For: </label>
                    <select name="time_period" id="type" onchange="location = this.value;" style="margin: 5px 9px; padding: 6px 13px !important; border-radius: 5px;">
                        <option value='../admin/transaction_monthly.php'>monthly</option>
                        <option value='./transaction_quarterly.php'>quarterly</option>
                        <option value='./transaction_yearly.php'>yearly</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Get Details</button>
                </form>


                    <div class="row g-6 mb-6">

                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0 overflow_style" style="height: 130px;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total
                                                Books</span>
                                            <?php

                            $stmt="SELECT count(book_id) FROM `books`";
                            $sql=mysqli_prepare($conn, $stmt);

                            $is_admin=2;
                            // mysqli_stmt_bind_param($sql,'i',$is_admin);
                
                            $result=mysqli_stmt_execute($sql);
                                if ($result){
                                    $data= mysqli_stmt_get_result($sql);
                                    $sno=1;
                                    while ($row = mysqli_fetch_array($data)){
                                ?>
                                            <span class="h3 font-bold mb-0">
                                                <?php echo $row[0]; ?>
                                            </span>
                                            <?php }
                                            mysqli_stmt_close($sql);
                            }
                        ?>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                <i class="bi bi-book"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card shadow border-0 mb-7">
                        <div class="card-header">
                            <!-- <h5 class="mb-0">Documents</h5> -->
                        </div>
                        <div class="table-responsive" style="padding: 30px 18px;">
                            <table class="table table-hover table-nowrap" id="myTable"
                                style="border: 0px solid black !important; padding: 30px 2px;">
                                <thead class="thead-light">
                                    <tr>
                                        <th style="font-size: 16px;">S No.</th>
                                        <th style="font-size: 16px;">Book ID</th>
                                        <th style="font-size: 16px;">User Name</th>
                                        <th style="font-size: 16px;">Book Name</th>
                                        <th style="font-size: 16px;">Issued Date</th>
                                        <th style="font-size: 16px;">Returned Date</th>
                                        <th style="font-size: 16px;">Transaction ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $stmt="SELECT transactions.borrow_id ,transactions.book_id ,transactions.user_id ,transactions.borrowed_date ,transactions.returned_date ,users.name ,book_name.book_name   FROM `transactions` JOIN `users` ON (transactions.user_id=users.id) JOIN `book_name` ON (transactions.book_id=book_name.book_id)";
                                        $sql=mysqli_prepare($conn, $stmt);
                                        $result=mysqli_stmt_execute($sql);

                                        if ($result){
                                                $data= mysqli_stmt_get_result($sql);
                                                $sno=1;
                                                while ($row = mysqli_fetch_array($data)){
                                    ?>
                                    <tr>
                                        <td style="font-size: 18px;">
                                            <?php echo $sno;?>
                                        </td>

                                        <td style="font-size: 18px;">
                                            <?php echo $row["book_id"];?>
                                        </td>
                                        <td style="font-size: 18px;">
                                            <?php echo $row["name"];?>
                                        </td>
                                        <td style="font-size: 18px;">
                                            <?php echo $row["book_name"];?>
                                        </td>
                                        <td style="font-size: 18px;">
                                            <?php echo substr($row["borrowed_date"],0,10);?>
                                        </td>
                                        <td style="font-size: 18px;">
                                            <?php echo substr($row["returned_date"],0,10);?>
                                        </td>
                                        <td style="font-size: 18px;">
                                            <?php echo $row["borrow_id"];?>
                                        </td>
                                    </tr>
                                    <?php
                                    $sno++;
                                    }
                                    mysqli_stmt_close($sql);
                                    mysqli_close($conn);
                                }
                                else{
                                    echo mysqli_error($conn);
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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>

</body>

</html>