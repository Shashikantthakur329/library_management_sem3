
<?php 
    include("../../backend/config.php");
    session_start();
    if (!isset($_SESSION["is_admin"])) {
        header("location: ./login.php");
    }
    else{
        $stmt="SELECT * FROM users WHERE id=(?) AND is_admin=(?) LIMIT 1";
        $sql=mysqli_prepare($conn, $stmt);

        //binding the parameters to prepard statement

        $is_admin=1;
        
        mysqli_stmt_bind_param($sql,"ii",$_SESSION["admin_id"],$is_admin);
        $result=mysqli_stmt_execute($sql);

        if (!empty($result) && isset($result)){
            $data= mysqli_stmt_get_result($sql);
            $row=mysqli_fetch_array($data);
            if (empty($row)) {
                # code...
                session_destroy();
                ?>
                <script>
                    alert("Sorry something went wrong. Please login again.");
                    window.location.href="./login.php";
                </script>
                <?php
               
            }
        }
        else{

            ?>
            <script>
                alert("Sorry something went wrong. Please login again.");
            </script>
            <?php
            session_destroy();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php require('./admin_components/header_links.php'); ?>
    <title>Profile</title>
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
                            <div class="col-sm-6 col-8 mb-4 mb-sm-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight mb-3">Profile</h1>
                            </div>
                            <!-- Actions -->
                            <div class="col-sm-6 col-4 text-sm-end">
                                <div class="mx-n1">
                                    <!-- <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1 mb-3">
                                        <span class=" pe-2">
                                            <i class="bi bi-pencil"></i>
                                        </span>
                                        <span>Edit</span>
                                    </a> -->
                                    <!-- <a href="./new_document.php" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                        <span class=" pe-2">
                                            <i class="bi bi-plus"></i>
                                        </span>
                                        <span>Create</span>
                                    </a> -->
                                </div>
                            </div>
                        </div>
                        <!-- Nav -->
                    </div>
                </div>
            </header>
            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <!-- Card stats -->
                 

                    <div class="card shadow border-0 mb-7">
                        <div class="card-header">
                        <div class="container-fluid p-sm-5 my-5" style="font-size: 22px;">
                            <form action="../../backend/admin/updated_details.php" method="post">
                                <div class="row mb-3">
                                    <div class="col-auto text-center">
                                        Name:
                                    </div>
                                    <div class="col-auto">
                                       <input type="text" id="username" readonly style="background-color: transparent; outline: none;" 
                                       name="name" value=" <?php echo $row["name"];?>">
                                    </div>
                                </div>
                                <div class="row mb-3" style="background-color: #EEEEEE; padding: 10px;">
                                    <div class="col-auto text-center">
                                        Email:
                                    </div>
                                    <div class="col-auto" style="min-width: fit-content;">
                                        <input type="email" style="background-color: transparent; outline: none;" name="email" readonly value="<?php echo $row["email"];?>">
                                    </div>
                                </div>
                                <div class="row mb-v">
                                    <div class="col-auto text-center">
                                        Phone:
                                    </div>
                                    <div class="col-auto">
                                        <input type="tel" id="userphone" readonly minlength="10" style="background-color: transparent; outline: none;" name="phone" value="<?php echo $row['phone'];?>">
                                    </div>
                                </div>
                                <div class="row mb-3" style="background-color: #EEEEEE; padding: 10px;">
                                    <div class="col-auto text-center">
                                        Account verified:
                                    </div>
                                    <div class="col-auto">
                                        <?php echo $row['verified']==1?"Yes":"No";?>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                <button class="btn btn-neutral col-auto" onclick="make_editable()" type="button" id="editbtn">Edit</button>
                                    <button class="btn btn-neutral col-auto" type="submit" id="updatebtn" style="margin-right: 10px;" hidden>Update</button>
                                    <button class="btn btn-neutral col-auto" onclick="make_uneditable()" type="button" id="cancelbtn" hidden>Cancel</button>
                                
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
        function make_editable(){
            document.getElementById('editbtn').setAttribute('hidden','hidden');
            document.getElementById('updatebtn').removeAttribute('hidden');
            document.getElementById('cancelbtn').removeAttribute('hidden');
            document.getElementById('username').removeAttribute('readonly');

            document.getElementById('userphone').removeAttribute('readonly');
            document.getElementById('username').style.border="1px solid black";
            document.getElementById('username').style.borderRadius="3px";
            document.getElementById('username').style.width="auto";
            document.getElementById('userphone').style.border="1px solid black";
            document.getElementById('userphone').style.borderRadius="3px";
            document.getElementById('userphone').style.width="auto";
        }
        function make_uneditable(){
           
            document.getElementById('updatebtn').setAttribute('hidden','hidden');
            document.getElementById('cancelbtn').setAttribute('hidden','hidden');
            document.getElementById('editbtn').removeAttribute('hidden');
            document.getElementById('username').setAttribute('readonly','readonly');
            document.getElementById('username').style.border="0px dashed black";
            document.getElementById('username').style.width="100%";
            document.getElementById('userphone').style.border="0px dashed black";
            document.getElementById('userphone').style.width="100%";
            document.getElementById('userphone').setAttribute('readonly','readonly');
            window.location.reload();

            // document.getElementById('cancelbtn').setAttribute('hidden','hidden');
        }




    </script>

     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
 integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
 crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
 integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
 crossorigin="anonymous"></script>
<!-- bootstrap js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

<script>
 $(document).ready(function () {
     $('#myTable').DataTable();
 });
</script>

</body>

</html>