<?php
include('../config.php');
session_start();

if (isset($_POST["student_id"])){
    $stmt="SELECT issued.fine, books.quantity FROM `books` WHERE user_id=(?)";
    $sql=mysqli_prepare($conn, $stmt);
    mysqli_stmt_bind_param($sql,"s",$_POST["book_id"]);
    $result=mysqli_stmt_execute($sql);
    if($result)
    {
        // $data= mysqli_stmt_store_result($sql);
        $data1=mysqli_stmt_get_result($sql);
        $row = mysqli_fetch_array($data1);
        // echo $row['book_id'];
        // $o_quantity = $row['quantity'];
        // $no_of_row = mysqli_stmt_num_rows($sql);
        $no_of_row=0;
    }
    else
    {
        echo "Technical error; <script> window.location.href='../../frontend/admin/manage_fine.php';</script>";
    }
    if ($data1->num_rows<=0){
        // echo $o_quantity;
        //   echo $no_of_row;
        echo '<script>
        alert("User ID does not exist.");
        window.location.href="../../frontend/admin/manage_fine.php";
        </script>';
        mysqli_stmt_close($sql);
        // echo "<script>alert('Book ID doesn't exist.');
        // window.location.href='../../frontend/admin/maintain_stocks.php';
        // </script>";
    }
    else{
        mysqli_stmt_close($sql);
        // $o_quantity=$o_quantity+$_POST['books_num_inc'];
        $stmt="UPDATE `issued` SET fine=0 WHERE user_id=(?)";
        $sql=mysqli_prepare($conn, $stmt);
        //binding the parameters to prepard statement
        mysqli_stmt_bind_param($sql,"is",$o_quantity,$_POST['student_id']);
        $result=mysqli_stmt_execute($sql);
        if($result)
        {
            mysqli_stmt_close($sql);
            ?>
            <script>
                alert("Fine has been increased successfully.");
                window.location.href='../../frontend/admin/manage_fine.php';
            </script>
            <?php
        }
        else{
            echo mysqli_error($conn);
        }
    }
}
else{
    echo '<script>
    alert("Technical Issue.");
    window.location.href="../../frontend/admin/manage_fine.php";
    </script>';   
}
?>