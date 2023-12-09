<?php
include('../backend/config.php');
session_start();
// $_SESSION["student_id"];
// echo "borrow id: ". $_POST['borrow_id'];
if (isset($_POST["borrow_id"])) {
    
    // $s_id= $_SESSION["student_id"];
    $stmt="SELECT issued.book_id,issued.issued_date,books.total_issued FROM `issued` JOIN `books` ON (issued.book_id=books.book_id) WHERE borrow_id=(?)";
    // $stmt="SELECT books.book_id AS b_id FROM books WHERE quantity>total_issued";
    // echo $b_id;

    $sql=mysqli_prepare($conn, $stmt);
    // echo $_POST['book_id'];
    //binding the parameters to prepard statement   AND quantity>total_issued

    mysqli_stmt_bind_param($sql,"s",$_POST["borrow_id"]);
    $result=mysqli_stmt_execute($sql);
    $data1=mysqli_stmt_get_result($sql);
    $row = mysqli_fetch_array($data1);
    // $no_of_row=mysqli_stmt_num_rows($sql);
    $t_issued=$row['total_issued'];
    $bk_id=$row['book_id'];
    if ($data1->num_rows<=0){
        // echo mysqli_error($conn);
        echo "<script>alert('Sorry book can't be taken back this time. Kindly Contact Library Incharge.') ;
        window.location.href='./return.php';
        </script>";

         mysqli_stmt_close($sql);
    }      
    // else if($_POST['fine'])
    // {
    //     echo "<script>alert('Kindly Clear all the fine by visiting the Library Incharge.') ;
    //     window.location.href='./return.php';
    //     </script>";

    //      mysqli_stmt_close($sql);
    // }
    else{
        mysqli_stmt_close($sql);
        $b_id=$_POST['borrow_id'];
        // $stmt="INSERT INTO `issued` (book_id,user_id) VALUES ('s19',125)";
        // $stmt="INSERT INTO `issued` (book_id,user_id) VALUES (?,?)";
        $stmt="UPDATE `transactions`
        SET returned_date = CURRENT_TIMESTAMP 
        WHERE borrow_id = '$b_id'";
        $sql=mysqli_prepare($conn, $stmt);
        //binding the parameters to prepard statement
        // mysqli_stmt_bind_param($sql,"sss",$_POST['book_id'],$_SESSION["student_id"],);
        $result1 =mysqli_stmt_execute($sql);

        
        $stmt= "DELETE FROM `issued` WHERE borrow_id='$b_id'";
        $sql=mysqli_prepare($conn, $stmt);
        $result=mysqli_stmt_execute($sql);

        $t_issued=$t_issued-1;
        $stmt="UPDATE `books` SET total_issued = $t_issued where book_id=(?)";
        $sql=mysqli_prepare($conn, $stmt);
        mysqli_stmt_bind_param($sql,"s",$bk_id);
        $result2=mysqli_stmt_execute($sql);

        if($result1 && $result && $result2)
        {
            $date = new DateTime($postedDate);
            $date->modify('+15 day');
            $date15= $date->format('Y-m-d');
            mysqli_stmt_close($sql);
            echo "<script>alert('Thank you for returning the book.');
            window.location.href='./return.php';
            </script>";
        }
        else{
            echo mysqli_error($conn);
        }
    }

}
else{
    echo '<script>
    alert("Technical Issue.");
    window.location.href="./issue.php";
    </script>';   
}

?>