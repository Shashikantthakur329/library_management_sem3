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
    
    <link rel="stylesheet" href="./css/dashboard.css">
    <title>Dashboard</title>
    <style>
        body {
  /* font: 12px/1.5 'PT Sans', serif; */
  /* margin: 25px; */
}

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
.overflow_style{
    max-width: 100px !important;
overflow-x: auto;
-ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}

.overflow_style::-webkit-scrollbar {
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
  background-color: #FF3366;
  color: white;
}

.tag:hover::after {
   border-left-color: #FF3366; 
}
.card-body{
    padding: 0.5rem 1.5rem !important;
}
    </style>
</head>

<body>
    <!-- Banner -->
    <!-- <a href="https://webpixels.io/components?ref=codepen" class="btn w-full btn-primary text-truncate rounded-0 py-2 border-0 position-relative" style="z-index: 1000;">
    <strong>Crafted with Webpixels CSS:</strong> The design system for Bootstrap 5. Browse all components →
</a> -->

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
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">Dashboard</h1>
                            </div>
                            <!-- Actions -->
                            <!-- <div class="col-sm-6 col-12 text-sm-end">
                            <div class="mx-n1">
                                <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-pencil"></i>
                                    </span>
                                    <span>Edit</span>
                                </a>
                                <a href="#" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                    <span class=" pe-2">
                                        <i class="bi bi-plus"></i>
                                    </span>
                                    <span>Create</span>
                                </a>
                            </div>
                        </div> -->
                        </div>
                        <!-- Nav -->
                        <ul class="nav nav-tabs mt-4 overflow-x border-0">
                            <li class="nav-item ">
                                <a href="return.php" class="nav-link active">Books To Return</a>
                            </li>
                            <li class="nav-item">
                                <a href="./borrowed.php" class="nav-link font-regular">Borrowed By You</a>
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
                    <div class="row g-6 mb-6">
                        <div class="col-xl-3 col-sm-6 col-12">
                            <form action="./return.php" id="activity_form23" method="get">
                                       
                                <a  onclick="document.getElementById('activity_form23').submit();">
                                    <div class="card shadow border-0 overflow_style" style="height: 130px; cursor:pointer; max-width: 250px !important;">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Books Issued</span>
                                                    <?php
                            
                                                        $stmt="SELECT count(book_id) FROM `issued` WHERE user_id=(?)";
                                                        $sql=mysqli_prepare($conn, $stmt);
    
                                                        $is_admin=0;
                                                        mysqli_stmt_bind_param($sql,'i',$_SESSION['student_id']);
                                            
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
                                                        <i class="bi bi-people"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </form>
                            </div>
                            <!-- <div class="col-xl-3 col-sm-6 col-12">
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
                                </div> -->
                            
    
                    </div>

                      <div class="card shadow border-0 mb-7">
                        <div class="card-header">
                            <h5 class="mb-0">Borrowed Books</h5>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $s_id=$_SESSION['student_id'];
                                        $stmt="SELECT issued.book_id as book_id,issued.user_id,issued.issued_date,book_name.book_name,issued.borrow_id FROM issued
                                        JOIN book_name ON (issued.book_id=book_name.book_id) WHERE issued.user_id=$s_id AND issued.returned_date IS NULL";
                                        $sql=mysqli_prepare($conn, $stmt);
                            
                                        $result=mysqli_stmt_execute($sql);
                                        if ($result){
                                                $data= mysqli_stmt_get_result($sql);
                                                $sno=1;
                                                while ($row = mysqli_fetch_array($data)){
                                                    $b_id= $row['borrow_id'];
                                    ?>
                                    <tr>
                                        
                                        <td style="font-size: 18px;">
                                            <?php echo $sno;?>
                                        </td>

                                        <td style="font-size: 18px;">
                                            <?php echo $row["book_id"];?>
                                        </td>
                                        <td style="font-size: 18px;">
                                            <?php echo $row["book_name"]?>
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
                                    </tr>

                                    <?php                                    
                                            
                                            $sno++;
                                            }
                                            mysqli_stmt_close($sql);
                                            mysqli_close($conn);
                                        }
                                        
                                    ?>
                                   

                                    <!-- <tr>
                                    <td>
                                        <img alt="..." src="https://images.unsplash.com/photo-1608976328267-e673d3ec06ce?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2">
                                        <a class="text-heading font-semibold" href="#">
                                            Cody Fisher
                                        </a>
                                    </td>
                                    <td>
                                        Apr 10, 2021
                                    </td>
                                    <td>
                                        <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-5.png" class="avatar avatar-xs rounded-circle me-2">
                                        <a class="text-heading font-semibold" href="#">
                                            Webpixels
                                        </a>
                                    </td>
                                    <td>
                                        $1.500
                                    </td>
                                    <td>
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bg-danger"></i>Canceled
                                        </span>
                                    </td>
                                    <td class="text-end">
                                        <a href="#" class="btn btn-sm btn-neutral">View</a>
                                        <button type="button" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr> -->
                                </tbody>
                            </table>
                        </div>

                        <!-- <div class="card-footer border-0 py-5">
                            <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
                            </div> -->
                    </div>
                </div>
            </main>
        </div>
    </div>

   <?php include("./components/scripts.php"); ?>

   <script>
    $(window).load(function() {
      $('#loading').hide();
    });
  </script>

</body>

</html>