<?php

include('../config.php');

if (isset($_POST["book_id"]) && isset($_POST["book_name"]) && isset($_POST["type"])) {
    $stmt="SELECT book_id FROM `books` WHERE book_id=(?)";
    $sql=mysqli_prepare($conn, $stmt);

    //binding the parameters to prepard statement

    mysqli_stmt_bind_param($sql,"s",$_POST["book_id"]);
    $result=mysqli_stmt_execute($sql);
    $data= mysqli_stmt_store_result($sql);
    $no_of_row=mysqli_stmt_num_rows($sql);

    if ($no_of_row>0){
        //   echo $no_of_row;
        mysqli_stmt_close($sql);
        echo "<script>alert('Sorry book already exists.');
        window.location.href='../../frontend/admin/new_book.php';
        </script>";
    }
    else{
        mysqli_stmt_close($sql);
        $stmt="INSERT INTO `books` (book_id,quantity,publishing_year) VALUES (?,?,?)";
        $sql=mysqli_prepare($conn, $stmt);
        //binding the parameters to prepard statement
        mysqli_stmt_bind_param($sql,"ssi",$_POST['book_id'],$_POST['books_num'],$_POST['year']);
        $result=mysqli_stmt_execute($sql);
        if($result)
        {
            mysqli_stmt_close($sql);
        }
        else{
            echo mysqli_error($conn);
        }
        // mysqli_stmt_close($sql);

        $stmt="INSERT INTO `book_name` (book_id,book_name) VALUES (?,?)";
        $sql=mysqli_prepare($conn, $stmt);
        //binding the parameters to prepard statement
        mysqli_stmt_bind_param($sql,"ss",$_POST['book_id'],$_POST['book_name']);
        $result=mysqli_stmt_execute($sql);
        if ($result) {
            mysqli_stmt_close($sql);
            $stmt="INSERT INTO `book_type` (book_id,type) VALUES (?,?)";
            $sql=mysqli_prepare($conn, $stmt);
            //binding the parameters to prepard statement
            mysqli_stmt_bind_param($sql,"ss",$_POST['book_id'],$_POST['type']);
            $result=mysqli_stmt_execute($sql);
            if ($result) {
                mysqli_stmt_close($sql);
                    ?>
                    <script>
                        alert("Book Added Successfully.");
                        window.location.href='../../frontend/admin/see_books.php';
                    </script>
            <?php
            }
            else {
                echo mysqli_error($conn);
                echo '<script>
                alert("Something went wrong. We are facing some technical issue. It will be resolved soon. "'.mysqli_error($conn).')
                window.location.href="../../frontend/aadmin/new_book.php"
                <script>';
            }
    
        } 
        
        else {
        echo mysqli_error($conn);
            echo '<script>
            alert("Something went wrong. We are facing some technical issue. It will be resolved soon. "'.mysqli_error($conn).')
            window.location.href="../../frontend/admin/new_book.php"
            <script>';
        }
    }

      
    
}
else{
    echo '<script>
    alert("Technical Issue.");
    window.location.href="../../frontend/admin/new_book.php";
    </script>';   
}

?>