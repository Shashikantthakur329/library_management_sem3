<?php
include('../config.php');
session_start();

if (isset($_POST["book_id"]) && isset($_POST['books_num_inc'])){
    $stmt="SELECT books.book_id, books.quantity FROM `books` WHERE book_id=(?)";
    $sql=mysqli_prepare($conn, $stmt);
    mysqli_stmt_bind_param($sql,"s",$_POST["book_id"]);
    $result=mysqli_stmt_execute($sql);
    if($result)
    {
        $data1=mysqli_stmt_get_result($sql);
        $row = mysqli_fetch_array($data1);
        $o_quantity = $row['quantity'];
        $no_of_row=0;
    }
    else
    {
        echo "Hello";
    }
    if ($data1->num_rows<=0){
        mysqli_stmt_close($sql);
    }
    else{
        mysqli_stmt_close($sql);
        $o_quantity=$o_quantity+$_POST['books_num_inc'];
        $stmt="UPDATE `books` SET quantity=(?) WHERE book_id=(?)";
        $sql=mysqli_prepare($conn, $stmt);
        mysqli_stmt_bind_param($sql,"is",$o_quantity,$_POST['book_id']);
        $result=mysqli_stmt_execute($sql);
        if($result)
        {
            mysqli_stmt_close($sql);
            ?>
            <script>
                alert("Book stock has been increased successfully.");
                window.location.href='../../frontend/admin/maintain_stocks.php';
            </script>
            <?php
        }
        else{
            echo '<script>
                alert("Some technical issue. Please try again later.");
                window.location.href="../../frontend/admin/maintain_stocks.php";
                </script>';
        }
    }
}
else{
    echo '<script>
    alert("Technical Issue.");
    window.location.href="../../frontend/admin/maintain_stocks.php";
    </script>';   
}
?>