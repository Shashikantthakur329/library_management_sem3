<?php
include('../backend/config.php');
session_start();
// $_SESSION["student_id"];
if (isset($_POST["book_id"])) {
    // echo $_SESSION["student_id"];
    $stmt="SELECT book_id,total_issued FROM `books` WHERE book_id=(?) AND quantity>total_issued";
    // $stmt="SELECT books.book_id AS b_id FROM books WHERE quantity>total_issued";
    $sql=mysqli_prepare($conn, $stmt);
    mysqli_stmt_bind_param($sql,"s",$_POST["book_id"]);
    $result=mysqli_stmt_execute($sql);
    $data1=mysqli_stmt_get_result($sql);
    $row = mysqli_fetch_array($data1);
    // $no_of_row=mysqli_stmt_num_rows($sql);
    // echo $_SESSION["student_id"];
    $t_issued=$row['total_issued'];
    if ($data1->num_rows<=0){
        //   echo $no_of_row;
        // echo "Sjasjoalmt";
        echo mysqli_error($conn);
        echo "<script>alert('Sorry book is not available for borrowing at this moment.') ;
                window.location.href='./issue.php';
        </script>";       
         mysqli_stmt_close($sql);
    }      
    //  window.location.href='./issue.php';
    else{
        // $user_id=$_SESSION[""]
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        mysqli_stmt_close($sql);
        // $stmt="INSERT INTO `issued` (book_id,user_id) VALUES ('s19',125)";
        $stmt="INSERT INTO `issued` (borrow_id,book_id,user_id,issued_date) VALUES (?,?,?,CURRENT_TIMESTAMP)";
        $sql=mysqli_prepare($conn, $stmt);
        mysqli_stmt_bind_param($sql,"sss",$randomString,$_POST['book_id'],$_SESSION["student_id"]);
        $result1=mysqli_stmt_execute($sql);
        mysqli_stmt_close($sql);


        $stmt="INSERT INTO `transactions` (borrow_id,book_id,user_id,borrowed_date) VALUES (?,?,?,CURRENT_TIMESTAMP)";
        $sql=mysqli_prepare($conn, $stmt);
        //binding the parameters to prepard statement
        mysqli_stmt_bind_param($sql,"sss",$randomString,$_POST['book_id'],$_SESSION["student_id"]);
        $result=mysqli_stmt_execute($sql);

        $t_issued=$t_issued+1;
        $stmt="UPDATE `books` SET total_issued = $t_issued where book_id=(?)";
        $sql=mysqli_prepare($conn, $stmt);
        //binding the parameters to prepard statement
        mysqli_stmt_bind_param($sql,"s",$_POST['book_id']);
        $result2=mysqli_stmt_execute($sql);
        if($result && $result1 && $result2)
        {
            $date = new DateTime($postedDate);
            $date->modify('+15 day');
            $date15= $date->format('Y-m-d');
            mysqli_stmt_close($sql);
            echo "<script>alert('This book is issued. You have to return it by $date15.');
            window.location.href='./dashboard.php';
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