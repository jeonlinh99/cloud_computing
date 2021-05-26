<?php
include('inc/conn.php');
session_start();

if(isset($_POST['delete_btn']))
{
    $songID = $_POST['delete_id'];

    $query = "DELETE FROM song WHERE songID='$songID' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "The song is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: cart.php'); 
    }
    else
    {
        $_SESSION['status'] = "The song is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: cart.php'); 
    }    
}
?>