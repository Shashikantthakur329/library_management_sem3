<?php
session_start();
if (!isset($_SESSION["is_admin"])) {
  header("location: ./login.php");
}
include("../../backend/config.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
<?php require('./admin_components/header_links.php'); ?>
    <title>Dashboard</title>

    <style>
        
.tags {
  list-style: none;
  margin: 0;
  overflow: hidden; 
  padding: 0;
}

.tags li {
  float: left; 
}

.tag {
  background: #eee;
  border-radius: 3px 0 0 3px;
  color: #999;
  display: inline-block;
  height: 26px;
  line-height: 26px;
  padding: 0 20px 0 23px;
  position: relative;
  margin: 0 10px 10px 0;
  text-decoration: none;
  -webkit-transition: color 0.2s;
  
-ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
.overflow_style2{
    max-width: 100px !important;
overflow-x: auto;
-ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}

.overflow_style2::-webkit-scrollbar {
  display: none;
}
.tag::before {
  background: #fff;
  border-radius: 10px;
  box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
  content: '';
  height: 6px;
  left: 10px;
  position: absolute;
  width: 6px;
  top: 10px;
}

.tag::after {
  background: #fff;
  border-bottom: 13px solid transparent;
  border-left: 10px solid #eee;
  border-top: 13px solid transparent;
  content: '';
  position: absolute;
  right: 0;
  top: 0;
}

.tag:hover {
  background-color: blue;
  color: white;
}

.tag:hover::after {
   border-left-color: blue; 
}
    </style>
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
                                <h1 class="h2 mb-0 ls-tight">Dashboard</h1>
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
                                        <span>Add Book</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- Nav -->
                        <ul class="nav nav-tabs mt-4 overflow-x border-0">
                            <li class="nav-item ">
                                <a href="#" class="nav-link active">Stats</a>
                            </li>
                            <li class="nav-item">
                                <a href="./see_books.php" class="nav-link font-regular">Book List</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="#" class="nav-link font-regular">File requests</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </header>
            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <!-- Card stats -->
                    <div class="row g-6 mb-6">

                        <div class="col-xl-3 col-sm-6 col-12">
                        <form action="./all_students.php" id="activity_form23" method="get">
                                   
                            <a  onclick="document.getElementById('activity_form23').submit();">
                                <div class="card shadow border-0 overflow_style" style="height: 130px; cursor:pointer;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Student</span>
                                                <?php
                        
                                                    $stmt="SELECT count(id) FROM `users` WHERE is_admin=(?)";
                                                    $sql=mysqli_prepare($conn, $stmt);

                                                    $is_admin=0;
                                                    mysqli_stmt_bind_param($sql,'i',$is_admin);
                                        
                                                    $result=mysqli_stmt_execute($sql);
                                                        if ($result){
                                                            $data= mysqli_stmt_get_result($sql);
                                                            $sno=1;
                                                            while ($row = mysqli_fetch_array($data)){
                                                        ?>
                                                            <span class="h3 font-bold mb-0"><?php echo $row[0]; ?></span>
                                                        <?php }
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
                            </a>
                        </form>
                        </div>

                        <div class="col-xl-3 col-sm-6 col-12">
                                <div class="card shadow border-0 overflow_style" style="height: 130px; cursor:pointer;">
                                <form action="./see_books.php" id="activity_form22" method="get">
                                   
                                    <a  onclick="document.getElementById('activity_form22').submit();">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Books</span>
                                                    <?php
                            
                                                        $stmt="SELECT count(book_id) FROM `books` ";
                                                        $sql=mysqli_prepare($conn, $stmt);

                                                        $activity_type=1; //download
                                            
                                                        $result=mysqli_stmt_execute($sql);
                                                            if ($result){
                                                                $data= mysqli_stmt_get_result($sql);
                                                                $sno=1;
                                                                while ($row = mysqli_fetch_array($data)){
                                                            ?>
                                                                <span class="font-bold mb-0">Total Books: <?php echo $row[0]; ?></span>
                                                                <br>
                                                            <?php }
                                                        }
                                                    ?>
                                                </div>
                                                <div class="col-auto">
                                                    <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                                        <i class="bi bi-file"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </form>
                                </div>
                        </div>
                        
                        <?php
                        $stmt="SELECT id,name FROM `documents` 
                        WHERE documents.deleted_at IS NULL";
                        $sql=mysqli_prepare($conn, $stmt);
            
                        $result=mysqli_stmt_execute($sql);
                            if ($result){
                                $data= mysqli_stmt_get_result($sql);
                                $sno=1;
                                while ($row = mysqli_fetch_array($data)){

                                    $stmt2="SELECT id FROM `activity` WHERE document_id=(?) AND activity_type=(?)";
                                    $sql2=mysqli_prepare($conn, $stmt2);
                                    $activity_type=2; //upload activity
                                    mysqli_stmt_bind_param($sql2,"ii",$row["id"],$activity_type);
                                    $result2=mysqli_stmt_execute($sql2);
                                    if ($result2){
                                            
                                            mysqli_stmt_store_result($sql2);
                                            $nubmer_of_rows=mysqli_stmt_num_rows($sql2);
                                            mysqli_stmt_close($sql2);
                                    }
                                    else{
                                        mysqli_stmt_close($sql2);
                                    }

                                    $stmt2="SELECT id FROM `activity` WHERE document_id=(?) AND activity_type=(?)";
                                    $sql2=mysqli_prepare($conn, $stmt2);
                                    $activity_type=1; //download activity
                                    mysqli_stmt_bind_param($sql2,"ii",$row["id"],$activity_type);
                                    $result2=mysqli_stmt_execute($sql2);
                                    if ($result2){
                                            
                                            mysqli_stmt_store_result($sql2);
                                            $nubmer_of_downloads=mysqli_stmt_num_rows($sql2);
                                            mysqli_stmt_close($sql2);
                                    }
                                    else{
                                        mysqli_stmt_close($sql2);
                                    }
                                    
                        ?>
                        <div class="col-xl-3 col-sm-6 col-12 mb-3">
                            <div class="card shadow border-0 overflow_style" style="height: 130px; cursor:pointer;">
                                <form action="./document_activity.php" id="activity_form<?php echo $row['id']; ?>" method="get">
                                    <input type="number" hidden  name="document_id12" value="<?php echo $row['id']; ?>">
                                    <a  onclick="<?php echo 'activity_form'.$row['id']; ?>.submit();">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col mr-auto">
                                                    <span class="h6 font-semibold 
                                                    text-muted text-sm d-block mb-2"><?php echo $row["name"]; ?></span>
                                                    <span class="h6 font-bold mb-0">Uploads: <?php echo $nubmer_of_rows; ?></span>
                                                    <br>
                                                    <span class="h6 font-bold mb-0">Downloads: <?php echo $nubmer_of_downloads; ?></span>
                                                </div>
                                                <div class="col-auto  ml-auto text-center">
                                                    <div class="icon icon-shape bg-tertiary 
                                                    text-white text-lg rounded-circle text-center">
                                                        <i class="bi bi-files"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </form>
                            </div>
                        </div>
                        <?php }
                         mysqli_stmt_close($sql);
                        
                        }?>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        function confirm_delete(){
            var confirm_del=confirm("Are you sure ?");
            if (confirm_del==true) {
                return true;
            } else {
                return false;
            }
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